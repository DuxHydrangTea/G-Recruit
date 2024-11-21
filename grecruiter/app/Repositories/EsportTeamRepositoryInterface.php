<?php
namespace App\Repositories;
use App\Repositories\BaseRepositoryInterface;
interface EsportTeamRepositoryInterface extends BaseRepositoryInterface
{
    public function onlyTrashed();
}