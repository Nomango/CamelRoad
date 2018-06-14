<?php
/**
 * Created by PhpStorm.
 * User: gogo
 * Date: 2018/6/9
 * Time: 22:18
 */

namespace app\index\controller;


use think\Controller;

class PcindexController extends Controller
{
    public function pcindex(){
        return $this->fetch('pc/index');
    }
}