<?php

namespace User\Controller;

use Common\Controller;

class MyOrderController extends Controller\UserBaseController
{
    //加载我的订单界面
    public function MyOrder(){
        $this->display();
    }

}