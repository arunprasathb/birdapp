<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\books;
use App\species;
use App\voices;
use App\Models\User;
use DB;
class AdminController extends Controller
{
   
    public function dashboard(){
        $user = auth()->guard('admin')->user();
        $books = books::select()->get();
        $users = User::select()->get();
        // $new_users = DB::table('users')->whereDate('created_at', DB::raw('CURDATE()'));
        // dd($new_users->toSql(), $new_users->getBindings());
        $dashboard_details['users_count'] =  count($users);
        $dashboard_details['books_count'] =  count($books);
        return view('admin.dashboard',array('dashboard_details' => $dashboard_details));
    }
        
}  