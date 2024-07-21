<?php

namespace App\Repositories\Eloquent;

use App\Models\Business;
use App\Repositories\Interfaces\BusinessInterface;

/**
 * Class BusinessEloquent
 * @package App\Repositories
 */
class BusinessEloquent implements BusinessInterface
{
    public function show()
    {
        return Business::first();
    }
}
