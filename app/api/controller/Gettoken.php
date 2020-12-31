<?php

namespace app\api\controller;

use app\common\auth\JwtAuth;
use app\common\lib\ResponseJson;

class Gettoken
{
    use ResponseJson;
    public function index()
    {
        // 获取jwtAuth的句柄
        $jwtAuth = JwtAuth::getInstance();
        $token = $jwtAuth->setUid(1)->encode()->getToken();
        return  $this->successJson(['x-access-token' => $token]);
    }
}
