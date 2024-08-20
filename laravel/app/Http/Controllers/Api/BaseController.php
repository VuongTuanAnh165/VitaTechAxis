<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * gói kết quả vào phản hồi json.
     *
     * @return JsonResponse
     */
    // public function wrapResponse(int $code, string $message, ?array $resource = []): JsonResponse
    // {
    //     $result = [
    //         'code' => $code,
    //         'message' => $message
    //     ];

    //     if (count($resource)) {
    //         $result = array_merge($result, ['data' => $resource['data']]);

    //         if (count($resource) > 1)
    //             $result = array_merge($result, ['pages' => ['links' => $resource['links'], 'meta' => $resource['meta']]]);
    //     }

    //     return response()->json($result, $code);
    // }

    public function renderResponse(int $code, string $message, ?array $resource = [])
    {
        $result = [
            'status' => $code,
            'message' => $message,
        ];

        if (count($resource)) {
            $result = array_merge($result, ['data' => $resource['data']]);
        }

        return response()->json($result, $code);
    }

    public function renderResponseError($exception)
    {
        $result = [
            'status' => $exception->getCode(),
            'message' => $exception->getMessage(),
        ];

        return response()->json($result, $exception->getCode());
        //dsadasdsadas
    }
}
