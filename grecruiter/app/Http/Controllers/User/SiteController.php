<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\TopicRepositoryInterface;
use Auth;
use Str;
use Illuminate\Http\Request;
use App\Models\Topic;
class SiteController extends Controller
{
    //
    protected $topicRepositoryInterface;
    protected $postRepositoryInterface;
    public function __construct(TopicRepositoryInterface $topicRepositoryInterface, PostRepositoryInterface $postRepositoryInterface)
    {
        $this->postRepositoryInterface = $postRepositoryInterface;
        $this->topicRepositoryInterface = $topicRepositoryInterface;
    }
    public function index()
    {
        return view('client.sites.index');
    }
    public function write()
    {
        $topics = $this->topicRepositoryInterface->all();

        return view('client.sites.write', compact('topics'));
    }
    public function handleWrite(Request $request)
    {
        $newRequest = new Request($request->all());
        $fileName = $this->postRepositoryInterface->upload_as($request->thumbnail);
        $newRequest->merge(['thumbnail' => $fileName]);
        $data = [
            ...$newRequest->all(),
            'user_id' => Auth::user()->id,
            'is_privated' => 0,
            'slug' => Str::slug($newRequest->title),
        ];
        $this->postRepositoryInterface->create($data);
        return redirect()->route('client.index');
    }




    public function writeByEsport($esport_id)
    {
        if (isset($esport_id) || $esport_id == null) {
            return redirect()->to('client.index');
        }
        $positions = Position::positionsOf($esport_id);
        $topics = Topic::applyTopicsOf($esport_id);

        return view('client.sites.write', compact('topics', 'positions', 'esport_id'));
    }

    public function handleWriteByEsport(Request $request, $esport_id)
    {
        $newRequest = new Request($request->all());
        $fileName = $this->postRepositoryInterface->upload_as($request->thumbnail);
        $newRequest->merge(['thumbnail' => $fileName]);
        $data = [
            ...$newRequest->all(),
            'user_id' => Auth::user()->id,
            'is_privated' => 0,
            'slug' => Str::slug($newRequest->title),
            'apply_type_id' => 2,
            'esport_id' => $esport_id,
        ];
        $this->postRepositoryInterface->create($data);
        return redirect()->route('client.index');
    }
}