<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Common;
use App\Jobs\SendEmailVerifyRegister;
use App\Repositories\Interfaces\ActivationInterface;
use App\Repositories\Interfaces\ActivityLogInterface;
use App\Repositories\Interfaces\UserInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    protected $user;

    protected $activation;

    protected $activityLog;

    /**
     * constructor.
     */
    public function __construct(
        UserInterface $user,
        ActivationInterface $activation,
        ActivityLogInterface $activityLog,
    ) {
        $this->user = $user;
        $this->activation = $activation;
        $this->activityLog = $activityLog;
    }

    /**
     * Authenticate the user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        try {
            DB::beginTransaction();
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ];
            $guard = Common::getAuthGuard($credentials['role']);
            if (Auth::guard($guard)->attempt($credentials)) {
                $request->session()->regenerate();
                $param = $request->all();
                $param['userAgent'] = $request->header('User-Agent');
                $user = $this->user->getUserByEmailRole($param['email'], $param['role']);
                if ($user->status == INACTIVE) {
                    $param_activation = [
                        'user_id' => $user->id,
                        'code' => sprintf('%06d', rand(1, 999999)),
                        'expired_time' => Carbon::now()->addMinutes(5),
                    ];
                    $activation = $this->activation->create($param_activation);
                    DB::commit();
                    $templateName = config('mail.template_name.verify_register');
                    $data_send_mail = [
                        'mail_address' => $user->email,
                        'expired_time' => $activation->expired_time,
                        'user_name' => $user->name,
                        'activation_code' => $activation->code,
                        'company_name' => env('APP_NAME'),
                    ];
                    $dataSendMail = Common::getTemplateEmail($templateName, $data_send_mail);
                    dispatch(new SendEmailVerifyRegister($dataSendMail));
                    $resource = [
                        'user' => $user,
                        'url_prev' => $param['prev'],
                        'url_verify' => $param['prev'],
                    ];

                    return $this->renderResponse(Response::HTTP_FORBIDDEN, __('messages.api.response.login.403'), $resource);
                }
                $userAgent = $param['userAgent'];
                $param_activityLog = [
                    'access_id' => $user->id,
                    'access_type' => $param['role'],
                    'login_time' => now(),
                    'user_agent' => $userAgent,
                ];
                $this->activityLog->create($param_activityLog);
                DB::commit();
                $resource = [
                    'url_prev' => $param['prev'],
                ];

                return $this->renderResponse(Response::HTTP_OK, __('messages.api.response.login.200'), $resource);
            }

            return $this->renderResponse(Response::HTTP_UNAUTHORIZED, __('messages.api.response.login.401'));
        } catch (Exception $e) {
            Log::error('[UserController][authenticate] error ' . $e->getMessage());
            DB::rollBack();

            return $this->renderResponseError($e);
        }
    }
    public function  testb() {
        
    }
}