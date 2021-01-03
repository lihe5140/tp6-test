<?php

declare(strict_types=1);

namespace app\api\controller;

use think\Request;
use think\facade\Config;
use think\exception\ValidateException;
use app\api\model\Role as RoleModel;
use app\validate\Role as RoleValidate;
use app\common\lib\ResponseJson;
use think\facade\Validate;

class Role extends Base
{

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $roleModel = new RoleModel();
        // halt($roleModel->getLastRcode());

        //获取数据列表
        $data = $roleModel->field('*')
            ->page($this->page, $this->pageSize)
            ->select();
        //判断是否有值
        if ($data->isEmpty()) {
            return errorJson(10010);
        } else {
            return successJson($data);
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //获取数据
        $data = $request->param();
        //验证返回
        try {
            //验证
            validate(RoleValidate::class)->check($data);
        } catch (ValidateException $exception) {
            //错误返回
            return ResponseJson::errorJson(10003, $exception->getError());
        }
        $data['rcode'] = parent::auto_code($roleModel->getLastRcode());
        $data['create_user'] = session('username');
        $data['update_user'] = session('username');
        // 检查编码
        // halt($data);
        if ($roleModel->checkRole(['rcode' => $data['rcode']])) {
            return ResponseJson::errorJson(Config::get('jsonstatus.role.role_add_rcode_error.status'), Config::get('jsonstatus.role.role_add_rcode_error.msg'));
        }
        $id = $roleModel->create($data)->getData('id');
        // //判断是否有值
        if (empty($id)) {
            return ResponseJson::errorJson(Config::get('jsonstatus.role.role_add_error.status'), Config::get('jsonstatus.role.role_add_error.msg'));
        } else {
            return ResponseJson::successJson('角色新增成功');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //判断id是否整型
        if (!Validate::isInteger($id)) {
            return ResponseJson::errorJson(Config::get('jsonstatus.role.role_read_error.status'), Config::get('jsonstatus.role.role_read_error.msg'));
        }
        $data = $roleModel->field('id,rcode,name,description,create_time,update_time')->find($id);
        var_dump($data);
        die;
        if ($data->isEmpty()) {
            return ResponseJson::errorJson(Config::get('jsonstatus.role.role_read_empty.status'), Config::get('jsonstatus.role.role_read_empty.msg'));
        } else {
            return ResponseJson::successJson($data);
        }
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
