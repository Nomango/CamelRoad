<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:47
 */

namespace app\index\controller;


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
        return $this->fetch('pc/touristMall');
    }

    //详细旅游
    public function index() {
        if (Request::instance()->isMobile()) {
            return $this->fetch('index/detailTouristMall');
        } else {
            return $this->fetch('pc/detailTouristMall');
        }
    }

    //每一个旅游
    public function detail(){
        if (Request::instance()->isMobile()) {
            return $this->fetch('index/detailTourist');
        } else {
            return $this->fetch('pc/detailTourist');
        }
    }
}