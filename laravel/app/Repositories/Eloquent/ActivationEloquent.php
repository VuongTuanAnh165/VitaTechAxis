<?php

namespace App\Repositories\Eloquent;

use App\Models\Activation;
use App\Repositories\Interfaces\ActivationInterface;
use Carbon\Carbon;

/**
 * Class ActivationEloquent
 * @package App\Repositories
 */
class ActivationEloquent implements ActivationInterface
{
    public function create($params)
    {
        return Activation::create($params);
    }

    public function getActivationByID($id)
    {
        return Activation::find($id);
    }

    public function update($data, $params)
    {
        return $data->update($params);
    }
}
