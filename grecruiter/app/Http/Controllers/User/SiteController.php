<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Esport;
use App\Models\Position;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\TopicRepositoryInterface;
use App\Ultilities\UploadUltility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        $fileName = UploadUltility::uploadImage($request->thumbnail);
        $newRequest->merge(['thumbnail' => $fileName]);
        $data = [
            ...$newRequest->all(),
            'user_id' => Auth::user()->id,
            'is_privated' => 0,
        ];
        $this->postRepositoryInterface->create($data);
        return redirect()->route('client.index');
    }




    public function writeByEsport($esport_id)
    {
        $esport = Esport::find($esport_id);
        if (!isset($esport_id) || !$esport) {
            return redirect()->route('client.index');
        }
        $positions = Position::positionsOf($esport_id);
        $topics = Topic::withMyTopics($esport_id)->orderByDesc('id')->get();

        return view('client.sites.write', compact('topics', 'positions', 'esport_id'));
    }

    public function handleWriteByEsport(Request $request, $esport_id)
    {
        try {
            $newRequest = new Request($request->all());
            $fileName = UploadUltility::uploadImage($request->thumbnail);
            $newRequest->merge(['thumbnail' => $fileName]);
            $data = [
                ...$newRequest->all(),
                'user_id' => Auth::user()->id,
                'is_privated' => 0,
                'apply_type_id' => $request->apply_type_id ?? 1,
                'esport_id' => $esport_id,
            ];
            $this->postRepositoryInterface->create($data);
            notify()->success('Đăng bài viết thành công');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->error('Đăng bài viết thất bại');
            return redirect()->back();
        }

    }
}