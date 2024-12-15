<?php

namespace App\Http\Controllers\User;
use App\Models\Apply;
use App\Models\Esport;
use App\Models\Member;
use App\Models\Topic;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Auth;
use App\Ultilities\UploadUltility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Facades\App\Ultilities\StatusApply;
class MyTeamController extends Controller
{

    public function showInfoMyTeam()
    {
        $team = Auth::user()->esportTeam;
        $esports = Esport::all();
        $members = $team->members;
        $topics = Topic::topicsOf($team->id);
        $positions = Position::positionsOf($team->id);
        return view('client.esport-teams.my-team', compact('team', 'esports', 'members', 'topics', 'positions'));
    }
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
            return redirect()->back();
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



    public function acceptApply(Request $request, $id)
    {
        $applyUser = Apply::find($id);

        // dd($applyUser);
        // $team = Auth::user()->esportTeam;
        try {
            $applyUser->update([
                'status' => StatusApply::getAccept(),
                'message_reply' => $request->message
            ]);
            Member::create([
                'user_id' => $applyUser->user_id,
                'esport_team_id' => $applyUser->esport_team_id,
                'position_id' => $applyUser->position_id,
            ]);
            notify()->success('Đã duyệt người dùng ' . $applyUser->user->name . ' thành công!');
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            notify()->error('Người dùng có thể đã gia nhập đội ngũ khác!');
            return redirect()->back();
        }
    }

    public function denyApply(Request $request, Apply $applyUser)
    {
        // $team = Auth::user()->esportTeam;
        $applyUser->update([
            'status' => StatusApply::getDeny(),
            'message_reply' => $request->message
        ]);
        notify()->success('Đã từ chối người dùng ' . $applyUser->user->name . '!');
        return redirect()->back();
    }
    public function considerApply(Apply $applyUser)
    {
        // $team = Auth::user()->esportTeam;
        $applyUser->update([
            'status' => StatusApply::getConsider(),
        ]);
        notify()->success('Đã đưa người dùng ' . $applyUser->user->name . ' vào danh sách xem sau!');
        return redirect()->back();
    }


    public function unInvite($apply)
    {
        $myApply = Apply::find($apply);
        try {
            $myApply->delete();
            notify()->success('Đã xóa người dùng khỏi danh sách được mời!');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->error('Người dùng này không được mời!');
            return redirect()->back();
        }
    }
    public function changeMessageInvite(Request $request, $apply)
    {
        try {
            $myApply = Apply::find($apply);
            $myApply->update([
                'message' => $request->message,
                'position_id' => $request->position_id,
            ]);
            notify()->success('Cập nhật lại lời mời thành công!');
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            notify()->error('Cập nhật lại lời mời thất bại!');
            return redirect()->back();
        }

    }

    public function updateStatusRecruiting(Request $request)
    {
        // dd($request->recruiting_status);
        try {
            $team = Auth::user()->esportTeam;
            $team->update([
                'recruiting_status' => $request->recruiting_status,
            ]);

            notify()->success('Cập nhật trạng thái tuyển dụng thành công!');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->error('Cập nhật trạng thái tuyển dụng thất bại!');
            return redirect()->back();
        }
    }
}