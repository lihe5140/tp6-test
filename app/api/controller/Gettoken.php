<?php

namespace app\api\controller;

use app\common\auth\JwtAuth;

class Gettoken
{
    public function index()
    {
        // 获取jwtAuth的句柄
        $jwtAuth = JwtAuth::getInstance();
        $token = $jwtAuth->setUid(1)->encode()->getToken();
        return  successJson(['x-access-token' => $token]);
    }
}
