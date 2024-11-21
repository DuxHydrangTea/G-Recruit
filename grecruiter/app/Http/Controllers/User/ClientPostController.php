<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Esport;
use Illuminate\Http\Request;
use App\Repositories\PostRepositoryInterface;
use App\Models\Post;
class ClientPostController extends Controller
{
    protected $postRepositoryInterface;
    protected $categoryRepositoryInterface;
    protected $topicRepositoryInterface;
    public function __construct(PostRepositoryInterface $postRepositoryInterface)
    {
        $this->postRepositoryInterface = $postRepositoryInterface;
    }

    public function index(Request $request)
    {
        $esportSearch = $request->esport;
        $typeSearch = $request->type;
        $esports = Esport::all();
        $posts = Post::public()->when($esportSearch, function ($query, $esportSearch) {
            return $query->where('esport_id', $esportSearch);
        })->when($typeSearch, function ($query, $typeSearch) {
            return $query->where('apply_type_id', $typeSearch);
        })->get();
        return view('client.posts.index', compact('posts', 'esports'));
    }
    public function show($slug)
    {
        $p = $this->postRepositoryInterface->findBySlug($slug);
        $p->update(['views' => $p->views++]);
        return view('client.posts.show', compact('p'));
    }
}