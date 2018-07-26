<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Controllers\Controller;
use App\Providers\UserServiceProvider;
use Illuminate\Http\Request;
use App\Models\AccessToken;
use App\Models\User;
use App\Helpers\AppUtility;
use Image;
use Log;
use Validator;
use App\Mail\forgot;
use Mail;


class UserController extends BaseApiController
{
    protected $userModelObj;
    public $userServiceProvider;
    public function __construct()
    {
        $this->userModelObj = new User();
        $this->userServiceProvider = new UserServiceProvider();
    }

    public function register(RegisterUserRequest $request) {
        $result = $this->userServiceProvider->registerUser($request);
        return $this->returnResponse($result);
    }

    public function login(LoginUserRequest $request) {
        $result = $this->userServiceProvider->login($request);
        return $this->returnResponse($result);
    }
    public function logout(Request $request){
        $result = $this->userServiceProvider->logout($request);
        return $this->returnResponse($result);
    }
    public function profileupdate(Request $request, $id){
        try {
            $user = User::where('id', $id)->firstOrFail();
            if(!empty($user)) {
                if(isset($request['name'])){
                    $user->name = $request['name'];
                }
                
                if(isset($request['mobile'])){
                    $user->mobile = $request['mobile'];    
                }
                if(isset($request['password']) && isset($request['old_password'])){
                    $utilObj = new AppUtility();
                    $isPasswordMatched = $utilObj->matchPassword($request['old_password'], $user->password);

                    if($isPasswordMatched) {
                        $user->password = $utilObj->generatePassword($request['password']);
                    }else{
                        return response(array('message' => 'Given old password not matched'), 400);
                    }
                }elseif(isset($request['password'])) {
                     return response(array('message' => 'Old Password required'), 400);
                }
                $user->save();
                if($user){
                    $data['status'] = 200;
                    $data['message'] = trans('messages.user_updated');
                    $data['data'] = $user;
                }
            }
        } catch (\Exception $e) {
                // $this->logError(__CLASS__,__METHOD__,$e->getMessage());
                // Log::info($e->getMessage());
                // Log::error('Model Not Found');
                    return response(array(
                        'error' => 'Data not found'
                    ), 400);
        }
        return response($data);
    }
    public function profileImageUpdate(Request $request, $id){
        try {
            $user = User::where('id', $id)->firstOrFail();
            if($request->hasFile('profileImage')){
                $file = $request->file('profileImage');
                 $validator = Validator::make($request->all(), [
                    'profileImage' => 'image|mimes:jpeg,png,jpg|max:1024',
                ]);
                if ($validator->fails()) {
                   return response(array(
                    'message' => 'parameters missing',
                    'missing_parameters' =>  $validator->errors()
                ), 400);
                }
                $thumbnail_path = public_path('/images/profile/thumbnail/');
                
                if(isset($user->profileImage)){
                    $image_path = $user->profileImage;
                    $image_path = str_replace(url('/'),"",$image_path);
                    $image_path = public_path().$image_path;
                    if(file_exists($image_path)) {
                        @unlink($image_path);
                    }
                }
                $file_name = 'user_'. $user->id .'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
                Image::make($file)
                      ->resize(150,150,function ($constraint) {
                        $constraint->aspectRatio();
                         })
                      ->save($thumbnail_path . $file_name);
                $user->profileImage = url('/').'/images/profile/thumbnail/'.$file_name;
            }
            $user->save();
            if($user){
                $data['status'] = 200;
                $data['message'] = trans('messages.user_updated');
                $data['data'] = $user;
            }
            
        } catch (\Exception $e) {
                // $this->logError(__CLASS__,__METHOD__,$e->getMessage());
                // Log::info($e->getMessage());
                // Log::error('Model Not Found');
                    return response(array(
                        'error' => 'Data not found'
                    ), 400);
        }
        return response($data);
    }
     public function forgetPassword(Request $request){
        try {
             $validator = Validator::make($request->all(), [
                    'email' => 'required|email|exists:users,email',
                ]);
                if ($validator->fails()) {
                   return response(array(
                    'message' => 'parameters missing',
                    'missing_parameters' =>  $validator->errors()
                ), 400);
                }
            $user = User::where('email', $request['email'])->firstOrFail();
            if($user){
                $generate_passwd = $this->_generatePassword();
                $utilObj = new AppUtility();
                $password = $utilObj->generatePassword($generate_passwd);
                
                // $password = md5(trim($generate_passwd));
                $user->password = $password;
                
                $user->save();
                if($user){
                    $data['status'] = 200;
                    $data['message'] = trans('messages.password_reset');
                    // $data['data'] = $user;
                }
                $email_mail['email'] =$request['email'];
                $email_mail['name'] = $user->name;
                $email_mail['password'] = $generate_passwd;

                $this->_sendForgetPassword($email_mail);
            }else{
                return response(array(
                        'error' => 'Email not found'
                    ), 404);
            }
        }catch (\Exception $e) {
                    return response(array(
                        'error' => 'Data not found'
                    ), 400);
        }
        return response($data);
    }
    /**
     * To send emails for forgot password
     * @param $email_mail
     * @return void
     */
    private function _sendForgetPassword($email_mail)
    {
        Log::info('In UserRegistrationController/_sendForgetPassword');
        $personInfo = array(
            'email'=> $email_mail['email'],
            'name' => $email_mail['name'],
            'site_name' => config('constants.site_name'),
            'password' => $email_mail['password'],
            'support_email' => config('constants.support_email'),
            'from_email' => config('constants.from_email'),
            'team_name' => config('constants.team_name')
        );
        $data = ['personInfo' => $personInfo];
         
        Mail::to($personInfo['email'])->send(new forgot($personInfo));
    }
       
    /**
     * To generate dynamic password while create the password
     * @return generated password
     */
    private function _generatePassword()
    {
        return substr(base64_encode(rand()), 0, 8);
    }
}
