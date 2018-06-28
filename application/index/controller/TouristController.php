<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:47
 */

namespace app\index\controller;


use app\common\model\Order;
use app\common\model\Tourist;
use think\Controller;
use think\Request;

// 旅游商城
class TouristController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign([
            'isMall' => true,
        ]);
    }

    public function landing() {
        $tourist1 = Tourist::where('category', '=', 1)->order('id desc')->limit(0, 3)->select();
        $tourist2 = Tourist::where('category', '=', 2)->order('id desc')->limit(0, 6)->select();
        $tourist3 = Tourist::where('category', '=', 3)->order('id desc')->limit(0, 6)->select();

        $this->assign([
            'tourist1' => $tourist1,
            'tourist2' => $tourist2,
            'tourist3' => $tourist3
        ]);
        return $this->fetch('pc/touristMall');
    }

    //详细旅游
    public function index() {
        $query = Request::instance()->param('q');
        if (is_null($query) || $query == '') {
            $query = '';
            $tourist = Tourist::paginate(9);
        } else {
            $tourist = Tourist::where('name|desc|departure|oneline_desc','like','%'.$query.'%')->select();
        }

        $this->assign([
            'query' => $query,
            'tourist' => $tourist,
        ]);

        if (Request::instance()->isMobile()) {
            return $this->fetch('index/detailTouristMall');
        } else {
            return $this->fetch('pc/detailTouristMall');
        }
    }

    //每一个旅游
    public function detail(){
        $id = Request::instance()->param('id/d');
        if (!isset($id)) {
            abort(404,'页面不存在');
            return;
        }
        $tourist = Tourist::get($id);
        $this->assign([
            'tourist' => $tourist,
        ]);

        if (Request::instance()->isMobile()) {
            return $this->fetch('index/detailTourist');
        } else {
            return $this->fetch('pc/detailTourist');
        }
    }

    public function order() {
        $data = Request::instance()->param();

        $order = new Order();
        $order['tourist_id'] = $data['tourist_id'];
        $order['name'] = $data['name'];
        $order['phone'] = $data['phone'];
        $order['remark'] = $data['remark'];
        if ($order->save()) {
            return serve_json(0, '提交成功');
        } else {
            return serve_json(10001, '服务器异常');
        }
    }
}