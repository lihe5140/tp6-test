<?php


namespace app\api\middleware;


use app\MyException;
use app\common\auth\JwtAuth;

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
            throw new MyException(90001, config('errorcode')[90001]);
        };
        if ($userToken) {
            // 校验
            $jwtAuth = JwtAuth::getInstance();
            $jwtAuth->setToken($userToken);
            if ($jwtAuth->validate() && $jwtAuth->verify()) {
                return $next($request);
            } else {
                throw new MyException(90002, config('errorcode')[90002]);
            }
        } else {
            throw new MyException(90002, config('errorcode')[90002]);
        }
    }
}
