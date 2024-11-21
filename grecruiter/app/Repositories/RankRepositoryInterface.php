<?php
namespace App\Repositories;
use Request;
use App\Repositories\BaseRepositoryInterface;
interface RankRepositoryInterface extends BaseRepositoryInterface
{
    public function onlyTrashed();

}