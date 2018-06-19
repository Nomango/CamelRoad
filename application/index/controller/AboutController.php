<?php
/**
 * Created by PhpStorm.
 * User: gogo
 * Date: 2018/6/12
 * Time: 15:32
 */

namespace app\index\controller;


use think\Controller;
use think\Request;

// 关于我们
class AboutController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign([
            'isAbout' => true,
        ]);
    }

    //关于我们
    public function index() {
        if (Request::instance()->isMobile()) {
            // TODO 联系我们？
            return $this->fetch('index/contact');
        } else {
            return $this->fetch('pc/aboutUs');
        }
    }

    //加入我们
    public function join(){
        return $this->fetch('pc/joinUs');
    }
}