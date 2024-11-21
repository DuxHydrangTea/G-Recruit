<?php
namespace App\Repositories;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function onlyTrashed();
    public function registerAdminUser($array);
}