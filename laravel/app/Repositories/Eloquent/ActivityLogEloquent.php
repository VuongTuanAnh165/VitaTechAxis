<?php

namespace App\Repositories\Eloquent;

use App\Helpers\IPHelper;
use App\Models\ActivityLog;
use App\Repositories\Interfaces\ActivityLogInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;

/**
 * Class ActivityLogEloquent
 * @package App\Repositories
 */
class ActivityLogEloquent implements ActivityLogInterface
{
    const PAGINATION_NUMBER = 9;

    public function create($params)
    {
        $agent = new Agent();
        $device = $agent->device();
        $platform = $agent->platform();
        $browser = $agent->browser();
        $ipAddress = IPHelper::getIp();
        $ipInfo = IPHelper::getCountryByIp($ipAddress);
        $countryCode = $ipInfo->geoplugin_countryCode ?? '';
        $countryName = $ipInfo->geoplugin_countryName ?? '';
        $region = $ipInfo->geoplugin_region ?? '';
        $regionCode = $ipInfo->geoplugin_regionCode ?? '';
        $regionName = $ipInfo->geoplugin_regionName ?? '';
        if (empty($ipAddress)) {
            $ipAddress = $ipInfo->geoplugin_request ?? '';
        }

        if (is_object($ipInfo)) {
            $ipInfo = (array)$ipInfo;
        }

        $params['ip_address'] = $ipAddress;
        $params['platform'] = $platform;
        $params['device'] = $device;
        $params['browser'] = $browser;
        $params['country_code'] = $countryCode;
        $params['country_name'] = $countryName;
        $params['region'] = $region;
        $params['region_code'] = $regionCode;
        $params['region_name'] = $regionName;
        $params['ip_info'] = json_encode($ipInfo);
        return ActivityLog::create($params);
    }

    public function update($data, $param)
    {
        return $data->update($param);
    }

    public function getDataByAccessIdType($access_id, $type)
    {
        return ActivityLog::where('access_id', $access_id)
            ->where('access_type', $type)
            ->orderBy('login_time', 'desc')
            ->paginate(self::PAGINATION_NUMBER);
    }

    public function getBrowser()
    {
        return ActivityLog::query()
            ->select('browser', DB::raw('COUNT(*) as count'))
            ->groupBy('browser')
            ->get();
    }

    public function getDevice()
    {
        return ActivityLog::query()
            ->select('device', DB::raw('COUNT(*) as count'))
            ->groupBy('device')
            ->get();
    }

    public function getPlatform()
    {
        return ActivityLog::query()
            ->select('platform', DB::raw('COUNT(*) as count'))
            ->groupBy('platform')
            ->get();
    }

    public function getVisitors()
    {
        $activityLogs = ActivityLog::query()
            ->select('country_code', DB::raw('COUNT(*) as count'))
            ->groupBy('country_code')
            ->get();
        return $activityLogs->mapWithKeys(function ($item, int $key) {
            if (isset($item['country_code'])) {
                $item['country_code'] = strtolower($item['country_code']);
            }
            return [$item['country_code'] => $item['count']];
        });
    }

    public function getUserStatistic()
    {
        return ActivityLog::query()
            ->select('access_id', 'access_type', DB::raw('COUNT(*) as count'))
            ->groupBy('access_id', 'access_type')
            ->orderByDesc('count')
            ->with('user', 'entity')
            ->take(5)
            ->get();
    }

    public function getAll(?int $paginate = self::PAGINATION_NUMBER)
    {
        return ActivityLog::paginate($paginate);
    }

    public function getByID($id)
    {
        return ActivityLog::find($id);
    }
}
