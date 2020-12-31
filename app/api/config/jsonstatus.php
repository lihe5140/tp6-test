<?php

/**
 * Api通用状态码配置
 * error_code >= 10000
 */

return [
    'success' => [
        'status' => 10000,
        'msg' => "资源请求成功！"
    ],
    'error' => [
        'status' => 10010,
        'msg' => "未知错误"
    ],
    // API Token验证返回状态码 
    "token" => [
        'token_empty' => [
            'status' => 10003,
            'msg' => "token empty"
        ],
        'token_error' => [
            'status' => 10002,
            'msg' => "token error"
        ],
    ],
    'ERROR' => [
        // 登录相关

    ],
    'successApiCode' => [
        'SUCCESS' => [
            'status' => 1,
            'msg' => "数据请求成功！"
        ],
        'UNKNOWN_ERR' => [
            'status' => 0,
            'msg' => "未知错误"
        ],
        'ERR_URL' => [
            'status' => 2,
            'msg' => "请求接口不存在"
        ],
        'ERR_PARAMS' => [
            'status' => 100,
            'msg' => "参数错误"
        ],
    ],


    /**
     * 用户登录相关的错误码
     * error_code 1000-1100
     */

    'UNKNOWN_USER' => [
        'status' => 1001,
        'msg' => "用户不存在"
    ],
    'ERR_PASSWORD' => [
        'status' => 1002,
        'msg' => "密码错误"
    ],
    'ERR_LOGIN' => [
        'status' => 1000,
        'msg' => "登录过期"
    ],
];
