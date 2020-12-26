<?php


namespace app\common\lib;

use app\common\lib\error\ApiErrDesc;

trait ResponseJson
{

    /**
     * @param null $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    public static function success($data = null, $httpCode = 200)
    {

        $status = ApiErrDesc::SUCCESS[0];
        $message = ApiErrDesc::SUCCESS[1];
        return self::jsonResponse($status, $message, $data, $httpCode);
    }

    /**
     * @param $status
     * @param $message
     * @param null $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    public static function error($status, $message, $data = null, $httpCode = 500)
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
