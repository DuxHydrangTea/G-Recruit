<?php

namespace App\Repositories\Eloquent;
use App\Models\Position;
use App\Repositories\PositionRepositoryInterface;
class PositionRepository extends BaseRepository implements PositionRepositoryInterface
{
    public function onlyTrashed()
    {
        return Position::onlyTrashed()->get();
    }
}