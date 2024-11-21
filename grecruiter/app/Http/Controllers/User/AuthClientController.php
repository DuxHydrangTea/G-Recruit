<?php

namespace App\Http\Controllers\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthClientController extends Controller
{
    //
    public function __construct()
    {

    }
    public function login()
    {
        return view('client.auth.login');
    }
    public function handleLogin(Request $request)
    {

        try {
            $check = Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                    'is_admin' => 0,
                ],
                $request->remember
            );
            if ($check) {
                return redirect()->route('client.index');
            } else {
                return redirect()->back()->with('errors', 'Wrong email or password!');
            }
        } catch (\Throwable $th) {
            dd($th);
        }

    }
    public function register()
    {
        return view('client.auth.register');
    }
    public function handleRegister(Request $request)
    {
    }
    // đọc thêm sửa xoá
}