<?php

namespace User\Controller;

use Common\Controller;

class MessageEditController extends Controller\UserBaseController
{
    //加载信息修改界面
    public function MessageEdit(){
        $this->display();
    }

}