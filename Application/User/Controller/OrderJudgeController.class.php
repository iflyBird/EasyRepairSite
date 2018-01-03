<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class OrderJudgeController extends Controller\UserBaseController
{
    //加载订单评价界面
    public function OrderJudge(){
        $this->display();
    }

}