<?php
/**
 * Created by PhpStorm.
 * User: gogo
 * Date: 2018/6/12
 * Time: 15:32
 */

namespace app\index\controller;


use think\Controller;

class CustomizeController extends Controller
{
    //定制旅行
    public function customize(){
        return $this->fetch('pc/customize');
    }
    //公益活动
    public function commonweal(){
        return $this->fetch('pc/commonweal');
    }
    //关于我们
    public function aboutUs(){
        return $this->fetch('pc/aboutUs');
    }
    //加入我们
    public function joinUs(){
        return $this->fetch('pc/joinUs');
    }
    //旅游商城
    public function touristMall(){
        return $this->fetch('pc/touristMall');
    }
    //详细旅游
    public function detailTouristMall(){
        return $this->fetch('pc/detailTouristMall');
    }
    //每一个旅游
    public function detailTourist(){
        return $this->fetch('pc/detailTourist');
    }
    //特产商城
    public function productMall(){
        return $this->fetch('pc/productMall');
    }
    //详细特产
    public function detailProduct(){
        return $this->fetch('pc/detailProduct');
    }
}