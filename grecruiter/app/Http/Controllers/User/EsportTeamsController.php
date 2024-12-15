<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\EsportTeam;
use App\Models\Esport;
use App\Models\Post;
use App\Ultilities\UploadUltility;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class EsportTeamsController extends Controller
{
    //
    public function index(Request $request)
    {
        $esport = $request->esport;

        $teams = EsportTeam::approved()->when($esport, function ($query, $esport) {
            return $query->where('esport_id', $esport);
        })->get();
        return view('client.esport-teams.index', compact('teams'));
    }

    public function registerEsportTeam()
    {
        $esports = Esport::all();
        return view('client.esport-teams.register', compact('esports'));
    }

    public function handleRegisterEsportTeam(Request $request)
    {
        if ($request->hasFile('icon') && $request->hasFile('avatar')) {
            $icon = UploadUltility::uploadImage($request->icon);
            $avatar = UploadUltility::uploadImage($request->avatar);
            $newRequest = new Request($request->all());
            $newRequest->merge(['icon' => $icon, 'avatar' => $avatar]);
            $team = EsportTeam::create($newRequest->all());

            if ($team) {

                $user = User::find(Auth::user()->id)->update(['esport_team_id' => $team->id]);

                notify()->success('Gửi thông tin đăng ký thành công! Vui lòng chờ duyệt', 'Thông báo từ hệ thống');
                return back();
            } else {
                notify()->error('Gửi thông tin đăng ký thất bại! Vui lòng thử lại', 'Thông báo từ hệ thống');
                return back();
            }
        }
        notify()->error('Yêu cầu có cả ảnh biểu tượng và ảnh đại diện', 'Thông báo từ hệ thống');
        return back();
    }

    public function apply(Request $request, $id_team)
    {
        $member = Apply::where('user_id', Auth::user()->id)->where('esport_team_id', $id_team)->first();
        if ($member) {
            $member->delete();
            notify()->success('Đã hủy yêu cầu ứng tuyển', 'Thông báo từ hệ thống');
            return back();
        } else {
            $pdf_cv = "";
            if ($request->hasFile('pdf_cv')) {
                $pdf_cv = UploadUltility::uploadPdf($request->pdf_cv);
            }

            Apply::create([
                'apply_type_id' => 1,
                'user_id' => \Auth::user()->id,
                'esport_team_id' => $id_team,
                ...$request->all(),
                'pdf_cv' => $pdf_cv,
            ]);
            notify()->success('Đã yêu cầu ứng tuyển', 'Thông báo từ hệ thống');
            return back();
        }

    }

    public function info($id)
    {
        $team = EsportTeam::find($id);

        $applies = Apply::where('esport_team_id', $id)->get();
        $members = $team->members;
        $posts = $team->posts;
        return view('client.esport-teams.info', compact('team', 'applies', 'members', 'posts'));
    }
}