<?php

namespace app\api\exception;

use think\exception\Handle;
use think\Response;
use think\facade\Config;
use Throwable;
use app\common\lib\ResponseJson;
use app\common\lib\error\ApiErrDesc;

/**
 * Class ApiHandler
 * @package app\api\exception
 * api模块下的异常处理类
 */
class ApiHandle extends Handle
{

    protected $httpCode = 500;

    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request   $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {

        if ($e instanceof ApiException) {
            $status = $e->getCode();
            $message = $e->getMessage();
        } else {
            $status = $e->getCode();
            if (!$status || $status < 0) {
                $status = Config::get('error.status');
            }
            $message = $e->getMessage() ?: Config::get('error.msg');
        }

        // 添加自定义异常处理机制
        if (method_exists($e, 'getStatusCode')) {

            $this->httpCode = $e->getStatusCode();
        }
        return ResponseJson::errorJson($status, $message, null, $this->httpCode);
    }
}
