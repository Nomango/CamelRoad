<?php
/**
 * Created by PhpStorm.
 * User: Nomango
 * Date: 2018-6-19
 * Time: 21:38
 */

namespace app\index\controller;


use app\common\model\Commonweal;
use think\Controller;
use think\Request;

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
    public function index() {
        $commweals = Commonweal::all();
        $this->assign([
            'commonweals' => $commweals,
        ]);
        return $this->fetch('pc/commonweal');
    }

    //公益详情页
    public function detail() {
        $id = Request::instance()->param('id/d');
        $commweal = Commonweal::get($id);
        $this->assign([
            'commonweal' => $commweal,
        ]);
        return $this->fetch('pc/detailcommonweal');
    }
}