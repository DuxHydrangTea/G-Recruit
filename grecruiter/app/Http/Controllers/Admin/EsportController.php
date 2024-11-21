<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEsportRequest;
use App\Models\Esport;
use App\Repositories\Eloquent\EsportRepository;
use App\Repositories\EsportRepositoryInterface;
use Illuminate\Http\Request;

class EsportController extends Controller
{

    protected $esportRepository;

    public function __construct(EsportRepositoryInterface $esportRepository)
    {
        $this->esportRepository = $esportRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $esports = $this->esportRepository->all();
        return view('admin.esport.index', compact('esports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.esport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEsportRequest $request)
    {
        $re = new StoreEsportRequest($request->all());
        try {
            $nameFile = $this->esportRepository->upload_as($re->icon);
            $re->merge(['icon' => $nameFile]);
            $esport = $this->esportRepository->create($re->all());
            return redirect()->route('esport.index')->with("add_message", "Add successfully!");
        } catch (\Throwable $th) {

        }
    }

    public function edit(Esport $esport)
    {
        return view('admin.esport.edit', compact('esport'));
    }
    //
    //
    //
    public function update(Request $request, Esport $esport)
    {
        $re = new Request($request->all());
        try {
            if (isset($re->icon)) {
                $nameFile = $this->esportRepository->upload_as($re->icon);
                $re->merge(['icon' => $nameFile]);
                $this->esportRepository->update($esport->id, $re->all());
                return redirect()->route('esport.index')->with("add_message", 'Updated successfuly!');
            } else {
                $this->esportRepository->update($esport->id, $re->all());
                return redirect()->route('esport.index')->with("add_message", 'Updated successfuly!');
            }
        } catch (\Throwable $th) {
            dd($th);
        }

    }
    public function destroy(Esport $esport)
    {
        //
        try {
            $esport->delete();
            return redirect()->route('esport.index')->with("add_message", 'Delete successfuly!');
        } catch (\Throwable $th) {
            return redirect()->route('esport.index')->with("add_message", 'Delete fail!');
        }

    }
    public function trashCan()
    {
        $esports = $this->esportRepository->onlyTrashed();
        return view('admin.esport.trash', compact('esports'));
    }
    public function restore($id)
    {
        $esport = $this->esportRepository->onlyTrashed()->find($id)->restore();
        return redirect()->route('esport.index')->with("add_message", 'Restore oke!');
    }

    public function forceDelete($id)
    {
        // $esport = Esport::onlyTrashed()->find($id)->forceDelete();
        $this->esportRepository->force_delete($id);
        return redirect()->route('esport.index')->with("add_message", 'Delete forever oke!');
    }
}