<?php

declare(strict_types=1);

namespace app\api\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class Role extends Model
{
    // public static function selectAttr()
    // {
    //     Role::
    // }
    public function getLastRcode()
    {
        return Role::order('id desc')
            ->value('rcode');
    }
    // 检查角色
    public static function checkRole($where)
    {
        return Role::field('id')
            ->where($where)
            ->find();
    }
}
