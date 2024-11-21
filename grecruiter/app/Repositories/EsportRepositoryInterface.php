<?php

namespace App\Repositories;
use Request;

interface EsportRepositoryInterface extends BaseRepositoryInterface
{
    public function onlyTrashed();

}