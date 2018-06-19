<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:59
 */

namespace app\index\controller;


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
}