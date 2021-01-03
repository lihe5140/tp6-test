<?php
return [
    // 允许访问的客户端ip
    'allow_client_ip' => [
        '127.0.0.1',
        '172.20.0.21',
    ],
    // 允许访问的域名
    'allow_host_domain' => [
        'tp6-test.me.com',
        'www.me.com'
    ],
    // 异常页面的模板文件
    // 'exception_tmpl'   => \think\facade\App::getAppPath() . '404.json',
];
