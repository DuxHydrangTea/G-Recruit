<?php

namespace App\Http\Controllers\User;
use App\Models\Rank;
use App\Http\Controllers\Controller;
use App\Models\Esport;
use App\Models\Position;
use App\Ultilities\DeleteWithImage;
use App\Ultilities\UploadUltility;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Apply;
class ProfileController extends Controller
{
    //


    public function myProfileV2($user_id)
    {
        $user = User::find($user_id);
        $timelines = $user->timelines->sortBy('start_time');
        // dd($timelines);
        return view('client.profile.profile', compact('user', 'timelines'));
    }

    public function myProfileChange()
    {
        $user = Auth::user();
        $positions = Position::all();
        $esports = Esport::all();
        $ranks = Rank::all();
        $timelines = $user->timelines->sortBy('start_time');
        // dd($timelines);
        return view('client.profile.my-profile-change', compact('user', 'ranks', 'esports', 'positions', 'timelines'));
    }


    public function changeProfile(Request $request)
    {

        $user = Auth::user();
        $user->update($request->all());
        notify()->success('Thông báo từ hệ thống', 'Cập nhật thông tin thành công!');
        return redirect()->back();
    }

    public function changeAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $oldAvatar = auth()->user()->avatar;
            $newAvatar = UploadUltility::uploadImage($request->avatar);
            auth()->user()->update(['avatar' => $newAvatar]);
            DeleteWithImage::deleteFile($oldAvatar);
            notify()->success('Thông báo từ hệ thống', 'Cập nhật ảnh đại diện thành công');
            return redirect()->back();

        }
        notify()->error('Thông báo từ hệ thống', 'Cập nhật ảnh đại diện thất bại');
        return redirect()->back();
    }

    public function otherProfile($id)
    {
        $user = User::find($id);
        $positions = Position::all();
        $esports = Esport::all();
        $ranks = Rank::all();
        $timelines = $user->timelines->sortBy('start_time');
        return view('client.profile.other-profile', compact('user', 'ranks', 'esports', 'positions', 'timelines'));
    }

    public function changePassword(Request $request)
    {
        if ($request->new_password != $request->repeat_password) {
            notify()->error('Thông báo từ hệ thống', 'Mật khẩu không khớp!');
            return redirect()->back();
        }
        $user = User::find(Auth::user()->id);
        // dd(Hash::check($request->old_password, $user->password));
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->save();
            notify()->success('Thông báo từ hệ thống', 'Đổi mật khẩu thành công!');
            return redirect()->back();

        } else {
            notify()->error('Thông báo từ hệ thống', 'Mật khẩu hiện tại không đúng!');
            return redirect()->back();
        }
    }
}