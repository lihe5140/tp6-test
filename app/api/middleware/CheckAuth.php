<?php


namespace app\api\middleware;


use app\api\exception\ApiException;
use app\common\auth\JwtAuth;
use app\common\lib\ResponseJson;
use think\facade\Config;
// use think\facade\Request;

/**
 * 签名认证
 * Class CheckAuth
 * @package app\middleware
 * 中间件
 */
class CheckAuth
{
    /**
     * @param $request
     * @param \Closure $next
     */
    public function handle($request, \Closure $next)
    {
        // JWT用户令牌认证，令牌内容获取
        $userToken = $request->header('x-access-token');
        if (empty($userToken)) {
            throw new ApiException(Config::get('jsonstatus.token.token_empty'));
        };
        if ($userToken) {
            // 校验
            $jwtAuth = JwtAuth::getInstance();
            $jwtAuth->setToken($userToken);
            if ($jwtAuth->validate() && $jwtAuth->verify()) {
                return $next($request);
            } else {
                throw new ApiException(Config::get('jsonstatus.token.token_error'));
            }
        } else {
            throw new ApiException(Config::get('jsonstatus.token.token_error'));
        }
    }
}
