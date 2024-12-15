<?php

namespace App\Http\Controllers\User;

use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rank;
use App\Models\Esport;
use App\Models\Position;
class UsersController extends Controller
{
    //
    public function index(Request $request)
    {
        $esports = Esport::all();
        $ranks = Rank::all();

        $f_esport = $request->esport;
        $f_rank = $request->rank;
        $f_position = $request->position;
        $users = User::notAdmins()->notFounders()->when($f_esport, function ($query, $f_esport) {
            return $query->where('esport_id', $f_esport);
        })->when($f_rank, function ($query, $f_rank) {
            return $query->where('rank_id', $f_rank);
        })->when($f_position, function ($query, $f_position) {
            return $query->where('position_id', $f_position);
        })->get();
        $team = Auth::user()->esportTeam;
        if ($team)
            $positions = Position::positionsOf($team->esport_id);
        else
            $positions = Position::all();


        return view('client.users.index', compact('users', 'positions', 'esports', 'ranks'));
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