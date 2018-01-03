<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class CollectOrderController extends Controller\UserBaseController
{
  //收藏的订单界面
    public function CollectMarket(){
        $this->display();
    }

}