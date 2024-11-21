<?php
namespace App\Repositories\Eloquent;

use App\Models\Esport;
use App\Repositories\EsportRepositoryInterface;
class EsportRepository extends BaseRepository implements EsportRepositoryInterface
{
    public function onlyTrashed()
    {
        return Esport::onlyTrashed()->get();
    }
}