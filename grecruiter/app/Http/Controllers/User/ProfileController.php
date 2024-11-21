<?php

namespace App\Http\Controllers\User;
use App\Models\Rank;
use App\Http\Controllers\Controller;
use App\Models\Esport;
use App\Models\Position;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    //

    public function myProfile()
    {
        $user = Auth::user();
        $positions = Position::all();
        $esports = Esport::all();
        $ranks = Rank::all();
        return view('client.profile.my-profile', compact('user', 'ranks', 'esports', 'positions'));
    }

    public function changeProfile(Request $request)
    {

        $user = Auth::user();
        $user->update($request->all());
        notify()->success('Thông báo từ hệ thống', 'Cập nhật thông tin thành công!');
        return redirect()->back();
    }
    public function otherProfile($id)
    {
        $user = User::find($id);
        $positions = Position::all();
        $esports = Esport::all();
        $ranks = Rank::all();
        return view('client.profile.other-profile', compact('user', 'ranks', 'esports', 'positions'));
    }
}