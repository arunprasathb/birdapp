<?php

namespace App\Providers;

use App\Helpers\AppUtility;
use App\Models\AccessToken;
use App\Models\User;
use Image;

/**
 * UserServiceProvider class contains methods for user management
 */
class UserServiceProvider extends BaseServiceProvider {

    protected $userModelObj;
    protected $accessTokenObj;
    public function __construct()
    {
        $this->userModelObj = new User();
        $this->accessTokenObj = new AccessToken();
    }

    /**
     * Register a user
     * @param type $request
     * @return type
     */
    public function registerUser($request) {
        try {
            $utilObj = new AppUtility();
            $password = $utilObj->generatePassword($request['password']);
                $userId = $this->userModelObj->create($request,$password);
                $accessToken = md5(uniqid(mt_rand(), true));
                $isAccessTokenCreated = $this->accessTokenObj->create($request, $accessToken, $userId);
                if ($userId && $isAccessTokenCreated) {
                    UserServiceProvider::$data['status'] = 200;
                    $userdata = $request->all();
                    $user_result['name'] = $userdata['name'];
                    $user_result['email'] = $userdata['email']; 
                    if(isset($userdata['mobile'])){
                        $user_result['mobile'] = $userdata['mobile']; 
                    }else{
                        $user_result['mobile'] = null; 
                    }
                    $user_result['deviceType'] = $userdata['deviceType']; 
                    UserServiceProvider::$data['data'] = array_merge($user_result, ['accessToken' => $accessToken], ['id' => $userId]);
                    UserServiceProvider::$data['message'] = trans('messages.user_registered');
                    }
        } catch (\Exception $e) {
                $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * Profile update for app user
     * @param type $request
     * @return type
     */
    /*public function profileupdate($request, $id) {
        try {
            $user = User::where('id', $id)->firstOrFail();
            $user->name = $request['name'];
            if(isset($request['mobile'])){
                $user->mobile = $request['mobile'];    
            }
            if(isset($request['password'])){
                $user->password = $request['password'];
            }
            if($request->hasFile('profileImage')){
                $file = $request->file('profileImage');
                $this->validate($request, ['profileImage' => 'required|image|mimes:jpeg,png,jpg|max:1024']);
                $thumbnail_path = public_path('/images/profile/thumbnail/');
                $original_path = public_path('/images/profile/original/');
                $file_name = 'user_'. $user->id .'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
                Image::make($file)
                      ->resize(261,null,function ($constraint) {
                        $constraint->aspectRatio();
                         })
                      ->save($original_path . $file_name)
                      ->resize(90, 90)
                      ->save($thumbnail_path . $file_name); 
                // $file->move($thumbnail_path, $file_name);
                $user->profileImage = $file_name;
            }
            $user->save();
            if($user){
                UserServiceProvider::$data['status'] = 200;
                UserServiceProvider::$data['message'] = trans('messages.user_updated');
                UserServiceProvider::$data['data'] = $user;
            }
            
        } catch (\Exception $e) {
                $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }*/


    /**
     * Login User
     *
     * @param type $data
     * @return type
     */
    public function login($data) {
        try {
            UserServiceProvider::$data['message'] = trans('auth.failed');
            $user = User::where('email', $data['email'])->first();
            if(!empty($user)) {
                $utilObj = new AppUtility();
                $isPasswordMatched = $utilObj->matchPassword($data['password'], $user->password);
                if ($isPasswordMatched) {
                    $accessToken = md5(uniqid(mt_rand(), true));
                   $accessTokenData =  AccessToken::select('accessToken')->where('userId',$user->id)->where('deviceId',$data->deviceId)->where('deviceType',$data->deviceType)->first();
                    if(empty($accessTokenData)) {
                        $isAccessTokenCreated = $this->accessTokenObj->create($data, $accessToken, $user->id);
                        if ($user->id && $isAccessTokenCreated) {
                            UserServiceProvider::$data['status'] = 200;
                            UserServiceProvider::$data['data'] = array_merge(['accessToken' => $accessToken], ['id' => $user->id], ['name' => $user->name], ['email' => $user->email], ['mobile' => $user->mobile]);
                            UserServiceProvider::$data['message'] = trans('messages.login_success');
                        }
                    }else {
                        UserServiceProvider::$data['status'] = 200;
                        UserServiceProvider::$data['data'] = array_merge(['accessToken' => $accessTokenData->accessToken], ['id' => $user->id], ['name' => $user->name], ['email' => $user->email], ['mobile' => $user->mobile]);
                        UserServiceProvider::$data['message'] = trans('messages.already_login');
                    }
                }
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    public function logout($data){
        try {
                    $isAccessTokenDeleted =  AccessToken::where('accessToken',$data->header('accessToken'))->delete();
                    if($isAccessTokenDeleted) {
                            UserServiceProvider::$data['status'] = 200;
                            UserServiceProvider::$data['message'] = trans('messages.logout_success');
 
                    }
 
        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }



}