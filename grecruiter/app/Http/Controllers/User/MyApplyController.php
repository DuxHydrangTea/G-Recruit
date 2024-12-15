<?php

namespace App\Http\Controllers\User;
use App\Models\Apply;
use App\Models\Member;
use App\Ultilities\UploadUltility;
use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
class MyApplyController extends Controller
{
    //
    public function myApplies()
    {
        $user = Auth::user();
        $applies = Apply::apply()->where('user_id', $user->id)->orderByDesc('id')->get();

        return view('client.applies.my-applies', compact('applies'));
    }

    public function handleMyUpdateApply(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('pdf_cv')) {
            $data['pdf_cv'] = UploadUltility::uploadPdf($request->pdf_cv);
        }
        $apply = Apply::find($id);
        $apply->update($data);
        notify()->success('Cập nhật yêu cầu đăng ký thành công!');
        return redirect()->route('client.my_applies.list');
    }

    public function removeMyUpdateApply(Request $request, $id)
    {
        $apply = Apply::find($id);
        $apply->delete();
        notify()->success('Xóa yêu cầu đăng ký thành công!');
        return redirect()->route('client.my_applies.list');
    }
    public function myInvites()
    {
        $user = Auth::user();
        $recruits = Apply::recuit()->where('user_id', $user->id)->orderByDesc('id')->get();

        return view('client.applies.my-invites', compact('recruits'));
    }

    public function acceptInvite($id)
    {
        $apply = Apply::find($id);
        dd($apply);
        try {
            $apply->update(['status' => 'Accept']);

            Member::create([
                'user_id' => $apply->user_id,
                'esport_team_id' => $apply->team_id,
                'position_id' => $apply->position_id,

            ]);
            notify()->success('Chấp nhận thành công! Bạn đã gia nhập đội tuyển ' . $apply->esportTeam->name . " !");
            return redirect()->route('client.my_invites.list');
        } catch (\Throwable $th) {
            $apply->update(['status' => 'Waiting']);
            notify()->error('Chấp nhận thất bại! Hãy rời đội tuyển hiện tại trước khi gia nhập');
            return redirect()->route('client.my_invites.list');
        }
    }

    public function denyInvite(Request $request, $id)
    {
        $recruit = Apply::find($id);
        $data = [
            ...$request->all(),
            'status' => 'Deny',
        ];
        $recruit->update($data);
        notify()->success('Từ chối yêu cầu thành công!');
        return redirect()->route('client.my_invites.list');
    }
}