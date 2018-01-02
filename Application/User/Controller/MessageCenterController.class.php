<?php

namespace User\Controller;

use Common\Controller;

class MessageCenterController extends Controller\UserBaseController
{
    //加载消息中心界面
    public function MessageCenter(){
        $this->display();
    }

}