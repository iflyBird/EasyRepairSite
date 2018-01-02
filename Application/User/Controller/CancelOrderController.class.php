<?php

namespace User\Controller;

use Common\Controller;

class CancelOrderController extends Controller\UserBaseController
{
    //加载取消订单界面
    public function CancelOrder(){
        $this->display();
    }

}