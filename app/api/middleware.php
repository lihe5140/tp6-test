<?php
// 该模块下的中间件定义文件, 对该模块下的所有控制器都有效, 在middleware下写好中间件后, 需要在该文件下配置绑定
// 如果使得该中间件只针对某一个控制器有效, 可以借助路由来设置, 不需要在该文件下配置绑定, 直接在middleware下写好中间件然后通过路由绑定->middleware()
return [
    app\api\middleware\CheckRequestAuth::class,
    app\api\middleware\CheckAuth::class,

];
