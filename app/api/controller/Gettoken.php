<?php

namespace app\api\controller;

use app\BaseController;
use app\common\auth\JwtAuth;
use app\common\lib\ResponseJson;

class Test extends BaseController
{
    use ResponseJson;
    public function index()
    {
        // 获取jwtAuth的句柄
        $jwtAuth = JwtAuth::getInstance();
        $token = $jwtAuth->setUid(1)->encode()->getToken();
        return  $this->success(['token' => $token]);
    }
}
