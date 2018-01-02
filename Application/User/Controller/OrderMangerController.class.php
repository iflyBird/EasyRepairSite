<?php

namespace User\Controller;

use Common\Controller;

class OrderMangerController extends Controller\UserBaseController
{
    //加载订单管理界面
    public function  OrderManger(){
        $this->display();

    }

}