<?php

declare(strict_types=1);

namespace app\api\middleware;

use think\facade\Request;
use app\common\lib\GetClientIp;
use app\common\lib\ResponseJson;
use think\facade\Config;

/**
 * 验证是否白名单
 * class CheckRequestAuth
 * @package app\middleware
 * 处理请求
 *
 */
class CheckRequestAuth
{
    /**
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        //验证域名是否允许访问
        if (!isset($_SERVER['SERVER_NAME']) || !in_array($_SERVER['SERVER_NAME'], Config::get('app.allow_host_domain'))) {
            return ResponseJson::errorJson(404, '请求拒绝！');
        }
        // 
        if (GetClientIp::getRealIp() == null || !in_array(GetClientIp::getRealIp(), Config::get('app.allow_client_ip'))) {
            return ResponseJson::errorJson(404, '请求拒绝！');
        }
        return $next($request);
    }
}
