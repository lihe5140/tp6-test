<?php

declare(strict_types=1);

namespace app\validate;

use think\Validate;

class Role extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'name' => 'require|chsAlpha',
        'description' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'name.require' => '角色名必须',
        'name.chsAlpha' => '必须为中文、字母',
        'description.require' => '角色描述必须',
    ];
}
