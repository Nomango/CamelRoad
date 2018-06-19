<?php
namespace app\index\controller;

use app\common\model\Commonweal;
use think\Controller;
use think\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign([
            'isIndex' => true,
        ]);
    }

    public function index()
    {
        $commweals = Commonweal::limit(0 , 3)->select();
        $this->assign([
            'commonweals' => $commweals,
        ]);

        if (Request::instance()->isMobile()) {
            return $this->fetch();
        } else {
            return $this->fetch('pc/index');
        }
    }
}
