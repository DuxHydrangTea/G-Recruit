<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRankRequest;
use App\Models\Esport;
use App\Models\Rank;
use App\Repositories\Eloquent\EsportRepository;
use App\Repositories\EsportRepositoryInterface;
use App\Repositories\RankRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\RankRepository;
class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     * Repository Design pattern
     */
    protected $rankRepository;
    protected $esportRepository;
    public function __construct(RankRepositoryInterface $rankRepository, EsportRepositoryInterface $esportRepository)
    {
        $this->rankRepository = $rankRepository;
        $this->esportRepository = $esportRepository;
    }
    public function index()
    {
        //
        $ranks = $this->rankRepository->all();
        return view('admin.rank.index', compact('ranks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $esports = $this->esportRepository->all();
        return view('admin.rank.create', compact('esports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRankRequest $request)
    {
        //
        $re = new StoreRankRequest($request->all());
        try {
            $nameFile = $this->rankRepository->upload_as($re->icon);
            $re->merge(['icon' => $nameFile]);
            $this->rankRepository->create($re->all());
            return redirect()->route('rank.index')->with("add_message", "Add successfully!");
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('rank.index')->with("add_message", "Add failed!");
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
    public function edit(Rank $rank)
    {
        //
        $esports = $this->esportRepository->all();
        return view('admin.rank.edit', compact('rank', 'esports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rank $rank)
    {
        //
        $re = new Request($request->all());
        // dd($re);
        try {
            if (isset($re->icon)) {
                $nameFile = $this->rankRepository->upload_as($re->icon);
                $re->merge(['icon' => $nameFile]);
                $this->rankRepository->update($rank->id, $re->all());
                return redirect()->route('rank.index')->with("add_message", 'Updated successfuly!');
            }

            $this->rankRepository->update($rank->id, $request->all());
            return redirect()->route('rank.index')->with("add_message", 'Updated successfuly!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('rank.edit', $rank)->with("add_message", 'Updated fail!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rank $rank)
    {
        //
        try {
            $rank->delete();
            return redirect()->route('rank.index')->with("add_message", 'Delete successfuly!');
        } catch (\Throwable $th) {
            return redirect()->route('rank.index')->with("add_message", 'Delete fail!');
        }
    }
    public function trashCan()
    {
        $ranks = $this->rankRepository->onlyTrashed();
        // $ranks = [];
        return view('admin.rank.trash', compact('ranks'));
    }
    public function forceDelete($id)
    {
        $this->rankRepository->force_delete($id);
        return redirect()->route('rank-trash.index')->with("add_message", 'Force Delete !');
    }
    public function restore($id)
    {
        $this->rankRepository->restore($id);
        return redirect()->route('rank-trash.index')->with("add_message", 'Restore !');
    }
}