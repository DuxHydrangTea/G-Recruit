<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Esport;
use App\Models\Position;
use App\Models\Topic;
use App\Ultilities\UploadUltility;
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
        return view('client.posts.show-2', compact('p'));
    }



    public function edit($slug)
    {
        $p = $this->postRepositoryInterface->findBySlug($slug);

        $esport = Esport::find($p->esport_id);
        $topics = Topic::where('esport_id', $esport->id)->get();
        $positions = Position::where('esport_id', $esport->id)->get();

        // dd($p);
        return view('client.posts.edit', compact('p', 'topics', 'positions'));
    }
    public function update(Request $request, $slug)
    {
        try {
            $data = $request->all();
            $p = $this->postRepositoryInterface->findBySlug($slug);
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = UploadUltility::uploadImage($request->thumbnail);
            }
            $p->update($data);
            notify()->success('Cập nhật bài viết thành công!', 'Thông báo từ hệ thống');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->success('Cập nhật bài viết thất bại!', 'Thông báo từ hệ thống');
            return redirect()->back();
        }
    }
}