<?php
namespace App\Repositories;
interface PositionRepositoryInterface extends BaseRepositoryInterface
{
    public function onlyTrashed();

}