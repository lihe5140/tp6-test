<?php

/**
 * 通用化API数据格式输出
 */

namespace app\common\lib;
use think\facade\Config;

trait ResponseJson
{
    /**
     * @param null $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    public static function successJson($data = null, $httpCode = 200)
    {
        $status = Config::get('jsonstatus.SUCCESS.status');
        $message = Config::get('jsonstatus.SUCCESS.msg');
        return self::jsonResponse($status, $message, $data, $httpCode);
    }

    /**
     * @param $status
     * @param $message
     * @param null $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    public static function errorJson($status, $message, $data = null, $httpCode = 500)
    {
        return self::jsonResponse($status, $message, $data, $httpCode);
    }
    /**
     * @param $status
     * @param $message
     * @param $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    private static function jsonResponse($status, $message, $data, $httpCode = 200)
    {

        $result = [
            'status' => $status, // 业务状态码
            'message' => $message,
            'result' => $data
        ];
        return json($result, $httpCode);
    }
}
