<?php

declare(strict_types=1);

namespace app\api\middleware;


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
        if (!isset($_SERVER['SERVER_NAME']) || !in_array($_SERVER['SERVER_NAME'], config('app.allow_host_domain'))) {
            return errorJson(404, '请求拒绝！');
        }
        // 
        if (getRealIp() == null || !in_array(getRealIp(), config('app.allow_client_ip'))) {
            return errorJson(404, '请求拒绝！');
        }
        return $next($request);
    }
}
