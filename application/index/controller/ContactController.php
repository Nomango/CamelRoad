<?php
/**
 * Created by PhpStorm.
 * User: gogo
 * Date: 2018/6/6
 * Time: 19:10
 */

namespace app\index\controller;


use think\Controller;

class ContactController extends Controller
{
    //联系我们
    public function contact(){
        return $this->fetch('index/contact');
    }
    //预定提交
    public function reserve(){
        return $this->fetch('index/reserve');
    }
    //旅游商品详情页
    public function detailTourist(){
        return $this->fetch('index/detailTourist');
    }
    //新疆旅游
    public function tourism(){
        return $this->fetch('index/tourism');
    }
    //特产商城
    public function specialtyMall(){
        return $this->fetch('index/specialtyMall');
    }
    //详细的特产
    public function detailSpecialty(){
        return $this->fetch('index/detailSpecialty');
    }
    //私人订制
    public function privateTailor(){
        return $this->fetch('index/private');
    }
}