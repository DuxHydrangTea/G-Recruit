<?php
namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\EsportTeamRepositoryInterface;
use App\Models\EsportTeam;
class EsportTeamRepository extends BaseRepository implements EsportTeamRepositoryInterface
{
    public function onlyTrashed()
    {
        return EsportTeam::onlyTrashed()->get();
    }
}