<?php

namespace App\Services;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Collection;

class DBIndexService extends ApiController
{
    public static function indexModel(Collection $collection)
    {

        return self::showAll($collection);
    }

}
