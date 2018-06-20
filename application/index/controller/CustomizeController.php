<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:59
 */

namespace app\index\controller;


use app\common\model\Demand;
use think\Controller;
use think\Request;

class CustomizeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign([
            'isCustomize' => true,
        ]);
    }

    // 私人定制旅行
    public function index(){
        if (Request::instance()->isMobile()) {
            return $this->fetch('index/customize');
        } else {
            return $this->fetch('pc/customize');
        }
    }

    //预定提交
    public function reserve(){
        return $this->fetch('index/reserve');
    }

    // 提交私人定制需求
    public function submit() {
        $data = Request::instance()->param();

        $demand = new Demand();
        $demand['name'] = $data['name'];
        $demand['dest'] = $data['dest'];
        $demand['departure_time'] = $data['departure_time'];
        $demand['phone'] = $data['phone'];
        $demand['remarks'] = $data['remarks'];
        if ($demand->save()) {
            return serve_json(0, '提交成功');
        } else {
            return serve_json(10001, '服务器异常');
        }
    }
}