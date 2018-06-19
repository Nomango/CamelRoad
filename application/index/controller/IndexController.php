<?php
namespace app\index\controller;

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
        if (Request::instance()->isMobile()) {
            return $this->fetch();
        } else {
            return $this->fetch('pc/index');
        }
    }
}
