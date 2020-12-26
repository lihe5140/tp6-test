<?php

namespace app\api\exception;

use think\exception\Handle;
use think\Response;
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
                $status = ApiErrDesc::UNKNOWN_ERR[0];
            }
            $message = $e->getMessage() ?: ApiErrDesc::UNKNOWN_ERR[1];
        }

        // 添加自定义异常处理机制
        if (method_exists($e, 'getStatusCode')) {

            $this->httpCode = $e->getStatusCode();
        }

        return ResponseJson::error($status, $message, null, $this->httpCode);
    }
}
