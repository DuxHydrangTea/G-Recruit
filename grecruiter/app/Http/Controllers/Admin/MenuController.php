<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use Illuminate\Http\Request;
use App\Repositories\MenuRepositoryInterface;
class MenuController extends Controller
{
    //
    protected $menuRepositoryInterface;
    public function __construct(MenuRepositoryInterface $menuRepositoryInterface)
    {
        $this->menuRepositoryInterface = $menuRepositoryInterface;
    }
    public function index()
    {
        $datas = $this->menuRepositoryInterface->all();
        return view('admin.menu.index')->with(compact('datas'));
    }
    public function create()
    {
        return view('admin.menu.create');
    }
    public function store(StoreMenuRequest $request)
    {
        try {
            $this->menuRepositoryInterface->create($request->all());
            return redirect()->route('menu.index')->with('add_message', 'Create a new menu successful');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function edit($id)
    {
        $data = $this->menuRepositoryInterface->find($id);
        return view('admin.menu.edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        try {
            $this->menuRepositoryInterface->update($id, $request->all());
            return redirect()->route('menu.index')->with('add_message', 'Update menu successful');

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy($id)
    {
        try {
            $this->menuRepositoryInterface->soft_delete($id);
            return redirect()->route('menu.index')->with('add_message', 'Delete menu successful');

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}