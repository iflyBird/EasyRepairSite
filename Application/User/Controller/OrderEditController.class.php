<?php

namespace User\Controller;

use Common\Controller;

class OrderEditController extends Controller\UserBaseController
{
    //加载订单修改界面
    public function OrderEdit(){
        $this->display();
    }

}