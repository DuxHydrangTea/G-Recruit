<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StorePositionRequest;
use App\Repositories\EsportRepositoryInterface;
use App\Repositories\PositionRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PositionRepository;
use App\Models\Position;
use Schema;
class PositionController extends Controller
{
    //

    protected $position_repository;
    protected $esportRepositoryInterface;
    public function __construct(PositionRepositoryInterface $positionRepository, EsportRepositoryInterface $esportRepositoryInterface)
    {
        $this->esportRepositoryInterface = $esportRepositoryInterface;
        $this->position_repository = $positionRepository;
    }

    public function index()
    {
        $positions = $this->position_repository->all();
        return view('admin.position.index', compact('positions'));
    }
    public function create()
    {
        $esports = $this->esportRepositoryInterface->all();
        return view('admin.position.create', compact('esports'));
    }
    public function store(StorePositionRequest $request)
    {
        try {
            $check = $this->position_repository->create($request->all());
            if ($check)
                return redirect()->route('position.index')->with('add_message', 'Added new record successfully');
            return redirect()->route('position.index')->with('add_message', 'Add failed record');
        } catch (\Throwable $th) {
            dd($th);
        }

    }
    public function edit($model)
    {
        $esports = $this->esportRepositoryInterface->all();
        $position = $this->position_repository->find($model);
        return view('admin.position.edit', compact('position', 'esports'));
    }
    public function update(Request $request, $id)
    {
        $position = $this->position_repository->update($id, $request->all());
        if ($position)
            return redirect()->route('position.edit', $id)->with('add_message', 'Updated record successfully');
        else
            return redirect()->route('position.edit', $id)->with('add_message', 'Update record failed');
    }
    public function destroy($id)
    {
        $position = $this->position_repository->soft_delete($id);
        if ($position)
            return redirect()->route('position.index')->with('add_message', 'Deleted record successfully');
        else
            return redirect()->route('position.index')->with('add_message', 'Delete record failed');
    }

    public function trashCan()
    {
        $positions = $this->position_repository->onlyTrashed();
        return view('admin.position.trash', compact('positions'));
    }
    public function restore($id)
    {
        $restore = $this->position_repository->restore($id);
        if ($restore)
            return redirect()->route('position-trash.index')->with('add_message', 'Restored record successfully');
        else
            return redirect()->route('position-trash.index')->with('add_message', 'Restore record failed');

    }
    public function forceDelete($id)
    {
        $restore = $this->position_repository->force_delete($id);
        if ($restore)
            return redirect()->route('position-trash.index')->with('add_message', 'Deleted record forever');
        else
            return redirect()->route('position-trash.index')->with('add_message', 'Delete record failed');
    }
}