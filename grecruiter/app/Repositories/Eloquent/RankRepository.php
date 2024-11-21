<?php
namespace App\Repositories\Eloquent;

use App\Models\Rank;
use App\Repositories\RankRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
class RankRepository extends BaseRepository implements RankRepositoryInterface
{
    public function onlyTrashed()
    {
        return Rank::onlyTrashed()->get();
    }
}