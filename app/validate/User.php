<?php

declare(strict_types=1);

namespace app\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'username'  =>  'require|chsDash|unique:user',
        'password'    =>  'require|min:6|max:16',
        'ucode' => 'require|number|length:5,11|unique:ucode'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'username.require' => '用户名必须',
        'username.chsDash' => '中文、字母、数字、_等',
        'username.unique' => '用户名已存在',
        'password.require' => '密码必须',
        'password.min' => '密码最短6位',
        'password.max' => '密码最长16位',
        'ucode.require' => 'ucode必须',
        'ucode.number' => 'ucode必须为整型',
        'ucode.length' => 'length长度5-15',
        'ucode.unique' => 'ucode已存在',
    ];

    //验证场景
    protected $scene = [
        'adduser'  =>  ['username', 'password', 'ucode'],
        'login' => ['username', 'password'],
    ];
}
