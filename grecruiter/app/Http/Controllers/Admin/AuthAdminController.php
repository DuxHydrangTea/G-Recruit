<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminUserRequest;
use App\Repositories\UserRepositoryInterface;
use Auth;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    protected $userRepositoryInterface;
    //
    function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }
    public function register()
    {
        return view('admin.auth.register');
    }
    public function handleRegister(RegisterAdminUserRequest $request)
    {
        $this->userRepositoryInterface->registerAdminUser($request->all());
        return dd("Add successfully");
    }

    public function login()
    {
        return view('admin.auth.login');
    }
    public function handleLogin(Request $request)
    {
        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 1,
        ]);
        if ($user) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.auth.login')->with('add_message', 'Login failed');
        }
    }
}