<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\EsportRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\TopicRepositoryInterface;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $topicRepositoryInterface;
    protected $esportRepositoryInterface;
    public function __construct(TopicRepositoryInterface $topicRepositoryInterface, EsportRepositoryInterface $esportRepositoryInterface)
    {
        $this->esportRepositoryInterface = $esportRepositoryInterface;
        $this->topicRepositoryInterface = $topicRepositoryInterface;
    }
    public function index()
    {
        //
        $datas = $this->topicRepositoryInterface->all();
        return view('admin.topic.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $esports = $this->esportRepositoryInterface->all();
        return view('admin.topic.create', compact('esports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $this->topicRepositoryInterface->create($request->all());
            return redirect()->route('topic.index')->with('add_message', 'Add a new topic successful');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->topicRepositoryInterface->find($id);
        $esports = $this->esportRepositoryInterface->all();
        return view('admin.topic.edit', compact('data', 'esports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $this->topicRepositoryInterface->update($id, $request->all());
            return redirect()->route('topic.index')->with('add_message', 'Updated topic successful');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $this->topicRepositoryInterface->soft_delete($id);
            return redirect()->route('topic.index')->with('add_message', 'Deleted topic successful');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}