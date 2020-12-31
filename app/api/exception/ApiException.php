<?php

namespace app\api\exception;

use think\Exception;
use Throwable;

/**
 * 自定义异常
 * class ApiException
 */
class ApiException extends Exception
{

    public function __construct(array $apiErrConst, Throwable $previous = null)
    {
        $message = $apiErrConst['msg'];
        $code = $apiErrConst['status'];
        parent::__construct($message, $code, $previous);
    }
}
