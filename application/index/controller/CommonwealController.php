<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:38
 */

namespace app\index\controller;


use think\Controller;

// 公益活动
class CommonwealController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign([
            'isCommonweal' => true,
        ]);
    }

    //公益活动
    public function index(){
        return $this->fetch('pc/commonweal');
    }
}