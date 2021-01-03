<?php

declare(strict_types=1);

namespace app\api\controller;

use think\Request;
use app\api\model\User as UserModel;

class User
{

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        var_dump(UserModel::select());
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $data = [
            "ucode" => 10004,
            "username" => "test1",
            "realname" => "文明1",
            "password" => 123456,
            "status" => "1",
            "login_count" => 1,
            "last_login_ip" => "172.20.0.21",
            "create_user" => "admin",
            "update_user" => "admin",
            "create_time" => "datetime",
            "update_time" => "datetime",
            "adads" => 111
        ];
        $user = new UserModel;
        // 过滤post数组中的非数据表字段数据
        $data = Request()->only(['username', 'ucode', 'password', 'realname', 'status', 'login_count', 'last_login_ip', 'create_user', 'update_user'], $data);
        halt($data);
        var_dump($user->save($data));
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //参数过滤
        $data = Request()->only(['username', 'ucode', 'password', 'realname', 'status', 'login_count', 'last_login_ip', 'create_user', 'update_user']);
        // 动态新增
        // $user = new UserModel();
        // $user->save($data);
        // 静态新增
        $user = UserModel::create($data);
        // halt($user);
        echo $user->id;

        // halt($data);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
        // 取出主键为1的数据
        $user = UserModel::find($id);
        // echo $user->username;
        halt($user->username);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
