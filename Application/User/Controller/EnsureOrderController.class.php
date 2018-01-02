<?php

namespace User\Controller;

use Common\Controller;

class EnsureOrderController extends Controller\UserBaseController
{
    //加载确认订单界面
    public function EnsureOrder(){
        $this->display();
    }

}