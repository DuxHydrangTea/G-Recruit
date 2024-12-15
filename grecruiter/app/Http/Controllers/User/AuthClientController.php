<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\StoreClientUserRequest;
use App\Models\Esport;
use App\Models\User;
use App\Ultilities\UploadUltility;
use Auth;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
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
        $esports = Esport::all();
        return view('client.auth.register', compact('esports'));
    }
    public function handleRegister(StoreClientUserRequest $request)
    {
        try {
            if (User::where('email', $request->email)->first()) {
                return redirect()->back()->with('message', 'Đã tồn tại người dùng!');
            }
            $data = $request->all();
            if ($request->hasFile('avatar')) {
                $data['avatar'] = UploadUltility::uploadImage($request->avatar);
            }
            User::create($data);
            return redirect()->route('client.login')->with('message', 'Đăng ký thành công!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', 'Đăng ký thất bại!');
        }
    }
    // đọc thêm sửa xoá


    public function logout()
    {
        Auth::logout();
        return back();
    }
}