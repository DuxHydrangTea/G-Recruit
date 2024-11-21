<?php

namespace App\Http\Controllers\User;

use App\Models\Apply;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Position;
class UsersController extends Controller
{
    //
    public function index(Request $request)
    {
        $esport_id = $request->esport;
        $users = User::notAdmins()->when($esport_id, function ($query, $esport_id) {
            return $query->where('esport_id', $esport_id);
        })->get();
        $team = Auth::user()->esportTeam;
        $positions = Position::positionsOf($team->esport_id);
        return view('client.users.index', compact('users', 'positions'));
    }

    public function recruit($id)
    {
        $user = User::find($id);
        $team = Auth::user()->esportTeam;
        $apply = Apply::isRecuited($team->id, $id)->first();
        if ($apply) {
            $apply->delete();
            notify()->success('Thông báo từ hệ thống', 'Cập nhật thông tin thành công!');
            return redirect()->back();
        } else {
            Apply::create([
                'esport_team_id' => $team->id,
                'user_id' => $id,
                'position_id' => $user->position_id,
                'apply_type_id' => 2,
                'message' => 'Đội tuyển ' . $team->name . ' gửi lời mời chiêu mộ bạn!',
            ]);

            notify()->success('Thông báo từ hệ thống', 'Cập nhật thông tin thành công!');
            return redirect()->back();
        }
    }



    public function recruitWithMessage(Request $request, $id)
    {
        $user = User::find($id);
        $team = Auth::user()->esportTeam;
        $apply = Apply::isRecuited($team->id, $id)->first();
        if ($apply) {

            notify()->success('Thông báo từ hệ thống', 'Đã gửi yêu cầu chiêu mộ trước đó!');
            return redirect()->back();
        } else {
            Apply::create([
                'esport_team_id' => $team->id,
                'user_id' => $id,
                'position_id' => $request->position_id,
                'apply_type_id' => 2,
                'message' => $request->message,
            ]);

            notify()->success('Thông báo từ hệ thống', 'Chiêu mộ thành công!');
            return redirect()->back();
        }
    }
}