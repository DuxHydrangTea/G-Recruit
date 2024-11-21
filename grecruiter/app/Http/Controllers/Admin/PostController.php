<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Esport;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    protected $postRepositoryInterface;
    public function __construct(PostRepositoryInterface $postRepositoryInterface)
    {
        $this->postRepositoryInterface = $postRepositoryInterface;
    }

    public function index()
    {
        $esports = Esport::all();
        $posts = $this->postRepositoryInterface->all();
        return view('admin.post.index', compact('posts', 'esports'));
    }
    public function show($slug)
    {
        $data = $this->postRepositoryInterface->findBySlug($slug);
        return view('admin.post.show', compact('data'));

    }
    public function setPrivate($slug)
    {
        // dd($slug);
        $post = $this->postRepositoryInterface->findBySlug($slug);

        $newStatus = !$post->is_privated;
        $this->postRepositoryInterface->update($post->id, [
            'is_privated' => $newStatus,
        ]);
        return redirect()->back();
    }
    public function forceDelete($slug)
    {
    }
}