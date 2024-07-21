<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class IPHelper
{
    public static function getIp()
    {
        $args = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];
        foreach ($args as $key) {
            if (!key_exists($key, $_SERVER)) {
                continue;
            }

            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (strpos($ip, ':') !== false) {
                    $data = explode(":", $ip);
                    $ip = $data[0];
                }
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }

        return "";
    }

    public static function getCountryByIp(String $ip)
    {
        try {
            $ipdat = @json_decode(file_get_contents(
                "http://www.geoplugin.net/json.gp?ip=" . $ip));
            return $ipdat;
        } catch (\Exception $exception) {
            Log::error('[LogAccessListener][handle] error: ' . $exception->getMessage());
        }
    }
}
