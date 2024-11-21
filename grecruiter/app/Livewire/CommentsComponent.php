<?php

namespace App\Livewire;

use App\Models\Like;
use Auth;
use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
class CommentsComponent extends Component
{
    public $post_id;
    public $posts;
    public $comments = [];
    public $is_liked = false;
    public $comment_text = "";
    public $countLike = 0;
    public function submit_comment()
    {
        $data = [
            "post_id" => $this->post_id,
            "user_id" => Auth::user()->id,
            "comment_text" => $this->comment_text,
        ];
        Comment::create($data);
        $this->renderComments();
    }
    public function renderComments()
    {

        $post = Post::find($this->post_id);

        // dd($post->comments);
        $this->comments = $post->comments->sortByDesc('created_at');
        $this->comment_text = "";

    }
    public function likeAction()
    {
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $this->post_id,
        ];
        $like = Like::firstWhere(
            $data
        );
        if ($like) {
            $like->delete();
            $this->renderLikes();
            $this->is_liked = false;
        } else {
            Like::create($data);
            $this->renderLikes();
            $this->is_liked = true;
        }
    }
    public function renderLikes()
    {
        $this->countLike = count(Post::find($this->post_id)->likes);
    }
    public function mount()
    {

        $this->renderComments();
    }
    public function render()
    {
        return view('livewire.comments-component');
    }
}