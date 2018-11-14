<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\books;
use App\species;
use App\voices;
use App\Models\User;
use App\app_settings;
use DB;
use Validator;
use Image;
class AdminController extends Controller
{

    public function __construct()
    {

    }
   
    public function dashboard(){
        $admin = auth()->guard('admin')->user();
        $books = books::select()->get();
        $users = User::select()->get();
        // $new_users = DB::table('users')->whereDate('created_at', DB::raw('CURDATE()'));
        // dd($new_users->toSql(), $new_users->getBindings());
        $dashboard_details['users_count'] =  count($users);
        $dashboard_details['books_count'] =  count($books);
        return view('admin.dashboard',array('dashboard_details' => $dashboard_details, 'admin'=>$admin));
    }
    public function settings(){
        $admin = auth()->guard('admin')->user();
        $app_settings = app_settings::select()->where('id', 1)->get();

        return view('admin.settings', array('app_settings' => $app_settings[0], 'id'=>1, 'admin'=>$admin));
    }
    public function settingsUpdate(Request $request){
        $this->validate($request, [
            'booklist_bg_option' => 'required',
            'specieslist_bg_option' => 'required',
            'voicelist_bg_option' => 'required',
            'species_detail_bg_option' => 'required',
            'part_screen_bg_option' => 'required'
        ]);
        $settings = app_settings::find(1);
        $settings->booklist_bg_option = $request->input('booklist_bg_option');
        $settings->booklist_bg_color = $request->input('booklist_bg_color');
        if($request->hasFile('booklist_bg_image')){
            $file = $request->file('booklist_bg_image');
            
            $thumbnail_path = public_path('/images/');
            
            $file_name = 'booklist_bg'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->save($thumbnail_path . $file_name);
            $settings->booklist_bg_image = url('/').'/images/'.$file_name;
        }
        $settings->specieslist_bg_option = $request->input('specieslist_bg_option');
        $settings->specieslist_bg_color = $request->input('specieslist_bg_color');
        if($request->hasFile('specieslist_bg_image')){
            $file = $request->file('specieslist_bg_image');
            
            $thumbnail_path = public_path('/images/');
            
            $file_name = 'specieslist_bg'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->save($thumbnail_path . $file_name);
            $settings->specieslist_bg_image = url('/').'/images/'.$file_name;
        }
        $settings->voicelist_bg_option = $request->input('voicelist_bg_option');
        $settings->voicelist_bg_color = $request->input('voicelist_bg_color');
        if($request->hasFile('voicelist_bg_image')){
            $file = $request->file('voicelist_bg_image');
            
            $thumbnail_path = public_path('/images/');
            
            $file_name = 'voicelist_bg'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->save($thumbnail_path . $file_name);
            $settings->voicelist_bg_image = url('/').'/images/'.$file_name;
        }
        $settings->species_detail_bg_option = $request->input('species_detail_bg_option');
        $settings->species_detail_bg_color = $request->input('species_detail_bg_color');
        if($request->hasFile('species_detail_bg_image')){
            $file = $request->file('species_detail_bg_image');
            
            $thumbnail_path = public_path('/images/');
            
            $file_name = 'species_detail_bg'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->save($thumbnail_path . $file_name);
            $settings->species_detail_bg_image = url('/').'/images/'.$file_name;
        }
        $settings->part_screen_bg_option = $request->input('part_screen_bg_option');
        $settings->part_screen_bg_color = $request->input('part_screen_bg_color');
        if($request->hasFile('part_screen_bg_image')){
            $file = $request->file('part_screen_bg_image');
            
            $thumbnail_path = public_path('/images/');
            
            $file_name = 'part_screen_bg'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->save($thumbnail_path . $file_name);
            $settings->part_screen_bg_image = url('/').'/images/'.$file_name;
        }

        $settings->save();
        flash('App Setting has been updated!!.')->success();
        return redirect('/admin/settings');
    }
    public function appSettings(){
       try {
            $settings = app_settings::select()->get();
            $app_settings = app_settings::select()->where('id', 1)->get();
            $data['status'] = 200;
            $data['data'] = ['settings' => $settings[0]];
            $data['message'] = trans('messages.app_settings_details');
        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return $data;
    }
        
}  