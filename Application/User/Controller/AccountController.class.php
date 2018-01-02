<?php

namespace User\Controller;

use Common\Controller;

class AccountController extends Controller\UserBaseController
{
    //加载账单界面
    public function Account(){
        $this->display();
    }

}