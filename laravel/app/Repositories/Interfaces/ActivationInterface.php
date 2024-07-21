<?php

namespace App\Repositories\Interfaces;

/**
 * Interface ActivationInterface
 * @package App\Repositories
 */
interface ActivationInterface
{
    public function create($params);
    public function getActivationByID($id);
    public function update($data, $params);
}
