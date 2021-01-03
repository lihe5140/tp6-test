<?php

namespace app\api\controller;

use think\facade\Config;
use think\facade\Request;
use think\Response;
use app\common\lib\ResponseJson;

/**
 * Class Base
 * @package app\controller
 */
abstract class Base
{
    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $pageSize;

    /**
     * Base constructor.
     */
    public function __construct()
    {
        //获取分页
        $this->page = (int)Request::param('page');

        //获取条数
        $this->pageSize = (int)Request::param('page_size', Config::get('app.page_size'));
    }
    /**
     * 获取字符串型自动编码
     *
     * @param [type] $string
     * @param string $start
     * @return void
     */
    protected function auto_code($string, $start = '1')
    {
        if (!$string)
            return $start;
        if (is_numeric($string)) { // 如果纯数字则直接加1
            return sprintf('%0' . strlen($string) . 's', $string + 1);
        } else { // 非纯数字则先分拆
            $reg = '/^([a-zA-Z-_]+)([0-9]+)$/';
            $str = preg_replace($reg, '$1', $string); // 字母部分
            $num = preg_replace($reg, '$2', $string); // 数字部分
            return $str . sprintf('%0' . (strlen($string) - strlen($str)) . 's', $num + 1);
        }
    }


    /**
     * @param $data
     * @param string $msg
     * @param int $code
     * @param string $type
     * @return Response
     */
    // protected function create($data, string $msg = '', int $code = 200, string $type = 'json'): Response
    // {
    //     //标准api结构生成
    //     $result = [
    //         //状态码
    //         'code'  => $code,
    //         //消息
    //         'msg'   => $msg,
    //         //数据
    //         'data'  => $data
    //     ];

    //     //返回api接口
    //     return Response::create($result, $type);
    // }

    // /**
    //  * @param $name
    //  * @param $arguments
    //  * @return Response
    //  */
    // public function __call($name, $arguments)
    // {
    //     //404，方法不存在的错误
    //     return $this->create([], '资源不存在~', 404);
    // }
}
