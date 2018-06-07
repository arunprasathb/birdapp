<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Providers\UserServiceProvider;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    public $userServiceProvider;
    public function __construct()
    {
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
}
