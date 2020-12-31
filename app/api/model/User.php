<?php

declare(strict_types=1);

namespace app\api\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class User extends Model
{
    // 模型数据不区分大小写
    protected $strict = true;
    // 设置字段自动转换类型
    // protected $type = [
    //     "id" => "int",
    //     "ucode" => "varchar",
    //     "username" => "varchar",
    //     "realname" => "varchar",
    //     "password" => "char",
    //     "status" => "char",
    //     "login_count" => "int",
    //     "last_login_ip" => "varchar",
    //     "create_user" => "varchar",
    //     "update_user" => "varchar",
    //     "create_time" => "datetime",
    //     "update_time" => "datetime",
    // ];
}
