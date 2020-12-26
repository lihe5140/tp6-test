<?php

namespace app\api\exception;


use think\Exception;
use Throwable;

class ApiException extends Exception
{

    public function __construct(array $apiErrConst, Throwable $previous = null)
    {
        $message = $apiErrConst[1];
        $code = $apiErrConst[0];
        parent::__construct($message, $code, $previous);
    }
}
