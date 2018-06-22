<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:47
 */

namespace app\index\controller;


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
        $tourist1 = Tourist::where('category', '=', 1)->select();
        $tourist2 = Tourist::where('category', '=', 2)->select();
        $tourist3 = Tourist::where('category', '=', 3)->select();

        $this->assign([
            'tourist1' => $tourist1,
            'tourist2' => $tourist2,
            'tourist3' => $tourist3
        ]);
        return $this->fetch('pc/touristMall');
    }

    //详细旅游
    public function index() {
        $tourist = Tourist::paginate(9);
        $this->assign([
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
}