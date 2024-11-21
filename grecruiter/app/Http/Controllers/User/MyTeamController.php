<?php

namespace App\Http\Controllers\User;
use App\Models\Member;
use Auth;
use App\Ultilities\UploadUltility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MyTeamController extends Controller
{
    public function handleAvatar(Request $request)
    {
        $team = Auth::user()->esportTeam;
        if ($request->hasFile('avatar')) {
            $path = UploadUltility::uploadImage($request->avatar);
            $team->update([
                "avatar" => $path,
            ]);
            return redirect()->back();
        } else {
            notify('Cập nhật thất bại!', 'Tin nhắn từ hệ thống');
        }
    }


    public function updateEsportMyTeam(Request $request)
    {
        $team = Auth::user()->esportTeam;
        try {
            $team->update([
                "esport_id" => $request->esport_id
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function updateNameTeam(Request $request)
    {
        $team = Auth::user()->esportTeam;
        try {
            $team->update([
                'name' => $request->name,
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function kickMyMember($user_id)
    {
        $team = Auth::user()->esportTeam;
        $member = Member::where('esport_team_id', $team->id)->where('user_id', $user_id)->first();
        if ($member)
            $member->delete();
        return redirect()->back();
    }

    public function updateInformationTeam(Request $request)
    {
        $team = Auth::user()->esportTeam;
        try {
            $team->update([
                'description' => $request->description,
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}