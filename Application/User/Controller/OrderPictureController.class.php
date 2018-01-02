<?php

namespace User\Controller;

use Common\Controller;

class OrderPictureController extends Controller\UserBaseController
{
    //加载订单图表界面
    public function OrderPicture(){
        $this->display();
    }

}