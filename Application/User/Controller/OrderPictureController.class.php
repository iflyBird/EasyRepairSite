<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class OrderPictureController extends Controller\UserBaseController
{
   //加载订单图表界面
    public function OrderPicture(){
        $this->display();
    }

}