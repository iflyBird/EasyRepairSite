<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class IndexController extends Controller\UserBaseController
{
    //加载默认index
    public function index()
    {
        //$this->show('普通用户后台');
        $this->display();
    }
    //首页展示模块
    public function homepage(){
        $this->display();
    }
}