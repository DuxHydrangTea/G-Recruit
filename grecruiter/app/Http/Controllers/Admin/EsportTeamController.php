<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEsportTeamRequest;
use App\Repositories\EsportTeamRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\EsportRepositoryInterface;
class EsportTeamController extends Controller
{

    protected $esport_team_repository;
    protected $esport_repository;
    public function __construct(EsportTeamRepositoryInterface $esportTeamRepositoryInterface, EsportRepositoryInterface $esportRepositoryInterface)
    {
        $this->esport_team_repository = $esportTeamRepositoryInterface;
        $this->esport_repository = $esportRepositoryInterface;
    }
    public function index()
    {
        $data = $this->esport_team_repository->all();
        return view('admin.esport-team.index', compact('data'));
    }
    public function create()
    {
        $esports = $this->esport_repository->all();
        return view('admin.esport-team.create', compact('esports'));
    }
    public function store(StoreEsportTeamRequest $request)
    {
        $re = new StoreEsportTeamRequest($request->all());
        try {
            $nameFile = $this->esport_team_repository->upload_as($re->avatar);
            $re->merge(['avatar' => $nameFile]);
            $this->esport_team_repository->create($re->all());
            return redirect()->route('esport-team.index')->with("add_message", "Add successfully!");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function edit($id)
    {
        $esports = $this->esport_repository->all();
        $data = $this->esport_team_repository->find($id);
        return view('admin.esport-team.edit', compact('data', 'esports'));
    }

    public function update(Request $request, $id)
    {
        $re = new Request($request->all());
        try {
            if (isset($request->avatar)) {
                $nameFile = $this->esport_team_repository->upload_as($re->avatar);
                $re->merge(['avatar' => $nameFile]);
                $this->esport_team_repository->update($id, $re->all());
                return redirect()->route('esport-team.index')->with("add_message", "Updated successfully!");
            } else {
                $this->esport_team_repository->update($id, $re->all());
                return redirect()->route('esport-team.index')->with("add_message", "Updated successfully!");
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }



    public function destroy($id)
    {
        try {
            $this->esport_team_repository->soft_delete($id);
            return redirect()->route('esport-team.index')->with("add_message", "Deleted successfully!");

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function trashCan()
    {
        $data = $this->esport_team_repository->onlyTrashed();
        return view('admin.esport-team.trash', compact('data'));
    }
    public function restore($id)
    {
        $this->esport_team_repository->restore($id);
        return redirect()->route('esport-team-trash.index')->with("add_message", "Restored successfully!");
    }
    public function forceDelete($id)
    {
        $this->esport_team_repository->force_delete($id);
        return redirect()->route('esport-team-trash.index')->with("add_message", "Deleted forever successfully!");
    }
}