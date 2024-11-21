<?php
namespace App\Repositories\Eloquent;
use App\Repositories\UserRepositoryInterface;
use App\Models\User;
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all()->where('is_admin', 0);
    }
    public function onlyTrashed()
    {
        return User::onlyTrashed()->get();
    }
    public function registerAdminUser($array)
    {
        $data = [
            ...$array,
            'is_admin' => 1,
        ];
        try {
            parent::create($data);
            return true;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}