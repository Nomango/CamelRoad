<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:45
 */

namespace app\index\controller;

use think\Controller;
use think\Request;

// 特产商城
class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign([
            'isMall' => true,
        ]);
    }

    //特产商城
    public function index(){
        if (Request::instance()->isMobile()) {
            return $this->fetch('index/productMall');
        } else {
            return $this->fetch('pc/productMall');
        }
    }

    //详细特产
    public function detail(){
        if (Request::instance()->isMobile()) {
            return $this->fetch('index/detailProduct');
        } else {
            return $this->fetch('pc/detailProduct');
        }
    }
}