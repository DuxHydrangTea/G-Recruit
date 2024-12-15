<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    //
    public function comment(Request $request, $post_id)
    {
        // dd('ll');
        try {
            $request->validate([
                'comment_text' => 'required',
            ]);
            Comment::create([
                ...$request->all(),
                'post_id' => $post_id,
                'user_id' => auth()->id(),
            ]);
            return back();
        } catch (\Throwable $th) {
            notify()->error('Có lỗi xảy ra. Bình luận thất bại!');
            return redirect()->back();
        }

    }

    public function like($post_id)
    {
        try {
            $like = Like::where('post_id', $post_id)->where(
                'user_id',
                auth()->id()
            )->first();
            if ($like) {
                $like->delete();

                return redirect()->back();
            } else {
                Like::create([
                    'post_id' => $post_id,
                    'user_id' => auth()->id(),

                ]);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}