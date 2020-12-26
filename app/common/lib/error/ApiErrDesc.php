<?php

/**
 * 老王
 *
 **/

namespace app\common\lib\error;

/**
 * Class ApiErrDesc
 * @package app\common\lib\error
 * APi返回码类库
 */
class ApiErrDesc
{
    /**
     * Api通用错误码
     * error_code < 1000
     */
    const SUCCESS = [1, 'Success'];
    const UNKNOWN_ERR = [0, '未知错误'];
    const ERR_URL = [2, '请求接口不存在'];

    const ERR_PARAMS = [100, '参数错误'];

    /**
     * 用户登录相关的错误码
     * error_code 1000-1100
     */
    const UNKNOWN_USER = [1001, '用户不存在'];
    const ERR_PASSWORD = [1002, '密码错误'];
    const ERR_LOGIN = [1000, '登录过期'];
}
