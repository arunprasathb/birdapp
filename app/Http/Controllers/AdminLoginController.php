<?php
namespace App\Http\Controllers;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getAdminLogin()
    {
        
        if (auth()->guard('admin')->user()) return redirect()->route('admin.dashboard');
        return view('adminLogin');
    }
    public function adminAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('admin.dashboard');
        }else{
            dd('your username and password are wrong.');
        }
    }
    public function logout(Request $request) {
      auth()->guard("admin")->logout();
      return redirect('/admin/login');
    }
}