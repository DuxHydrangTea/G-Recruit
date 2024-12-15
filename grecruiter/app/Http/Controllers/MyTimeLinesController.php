<?php

namespace App\Http\Controllers;

use App\Models\TimeLine;
use Illuminate\Http\Request;

class MyTimeLinesController extends Controller
{
    //
    public function addATimeline(Request $request)
    {
        try {
            $data = [
                ...$request->all(),
                'user_id' => auth()->user()->id,
            ];
            TimeLine::create($data);
            notify()->success('Thêm dòng thời gian mới thành công!');
            return redirect()->back();
        } catch (\Throwable $th) {

            notify()->error('Thêm dòng thời gian mới thất bại!');
            return redirect()->back();
        }


    }
    public function updateATimeline(Request $request, $id)
    {
        try {
            $timeline = TimeLine::find($id);
            $timeline->update($request->all());
            notify()->success('Cập nhật dòng thời gian thành công!');
            return redirect()->back();
        } catch (\Throwable $th) {

            notify()->error('Cập nhật dòng thời gian thất bại!');
            return redirect()->back();
        }
    }
    public function deleteATimeline(Request $request, $id)
    {
        try {
            $timeline = TimeLine::find($id);
            $timeline->delete();
            notify()->success('Xoá dòng thời gian thành công!');
            return redirect()->back();
        } catch (\Throwable $th) {

            notify()->error('Xoá dòng thời gian thất bại!');
            return redirect()->back();
        }
    }

}