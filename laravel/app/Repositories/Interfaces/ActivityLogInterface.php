<?php

namespace App\Repositories\Interfaces;

/**
 * Interface ActivityLogInterface
 * @package App\Repositories
 */
interface ActivityLogInterface
{
    public function create($param);
    public function update($data, $param);
    public function getDataByAccessIdType($access_id, $type);
    public function getBrowser();
    public function getDevice();
    public function getPlatform();
    public function getVisitors();
    public function getUserStatistic();
    public function getAll();
    public function getByID($id);
}
