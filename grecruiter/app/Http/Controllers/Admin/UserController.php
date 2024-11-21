<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Eloquent\PositionRepository;
use App\Repositories\Eloquent\RankRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\EsportRepository;
use App\Repositories\EsportRepositoryInterface;
use App\Repositories\PositionRepositoryInterface;
use App\Repositories\RankRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $esportRepository;
    protected $rankRepository;
    protected $positionRepository;
    public function __construct(UserRepositoryInterface $userRepository, EsportRepositoryInterface $esportRepository, RankRepositoryInterface $rankRepository, PositionRepositoryInterface $positionRepository)
    {
        $this->userRepository = $userRepository;
        $this->esportRepository = $esportRepository;
        $this->rankRepository = $rankRepository;
        $this->positionRepository = $positionRepository;
    }
    public function index()
    {
        $users = $this->userRepository->all();
        return view('admin.user.index', compact('users'));
    }
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return view('admin.user.show', compact('user'));
    }
    public function create()
    {
        $esports = $this->esportRepository->all();
        $ranks = $this->rankRepository->all();
        $positions = $this->positionRepository->all();
        return view('admin.user.create', compact('esports', 'ranks', 'positions'));
    }
    public function store(StoreUserRequest $request)
    {

        try {
            $re = new StoreUserRequest($request->all());
            $fileName = $this->userRepository->upload_as($request->avatar);
            $re->merge(['avatar' => $fileName]);
            $re->merge(['password' => md5($request->password)]);
            $user = $this->userRepository->create($re->all());
            if ($user)
                return redirect()->route('user.index')->with('add_message', 'Added user successfully!');
            else
                return redirect()->route('user.index')->with('add_message', 'Add user failed!');

        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('user.index')->with('add_message', 'Add user failed!');
        }
    }
    public function edit($id)
    {

        $user = $this->userRepository->find($id);
        $esports = $this->esportRepository->all();
        $ranks = $this->rankRepository->all();
        $positions = $this->positionRepository->all();
        return view('admin.user.edit', compact('user', 'esports', 'ranks', 'positions'));
    }
    public function update(UpdateUserRequest $request, $id)
    {

        $re = new UpdateUserRequest($request->all());
        try {
            if (isset($request->avatar)) {
                $fileName = $this->userRepository->upload_as($request->avatar);
                $re->merge(['avatar' => $fileName]);
                $re->merge(['password' => md5($request->password)]);
                $user = $this->userRepository->update($id, $re->all());
                return redirect()->route('user.index')->with('add_message', 'Added user successfully!');
            }
            $this->userRepository->update($id, $re->all());
            return redirect()->route('user.index')->with('add_message', 'Added user successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function destroy($id)
    {
        try {
            $this->userRepository->soft_delete($id);
            return redirect()->route('user.index')->with('add_message', 'Deleted user successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function trashCan()
    {
        $users = $this->userRepository->onlyTrashed();
        return view('admin.user.trash', compact('users'));
    }
    public function restore($id)
    {
        try {
            $this->userRepository->restore($id);
            return redirect()->route('user-trash.index')->with('add_message', 'Restore user successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function forceDelete($id)
    {
        try {
            $this->userRepository->force_delete($id);
            return redirect()->route('user-trash.index')->with('add_message', 'Deleted user forever successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}