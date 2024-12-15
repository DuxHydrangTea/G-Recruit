<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Auth;
use Illuminate\Http\Request;

class ClientTopicController extends Controller
{
    //
    public function addTopic(Request $request)
    {
        try {

            $topic = Topic::create([
                ...$request->all(),
                'user_id' => Auth::id(),
            ]);
            notify()->success('Thêm đề tài mới thành công!');
            return redirect()->back();
        } catch (\Throwable $th) {

            notify()->error('Thêm đề tài mới thất bại!');
            return redirect()->back();
        }



    }
}