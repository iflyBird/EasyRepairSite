<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class MessageCenterController extends Controller\UserBaseController
{
    //������Ϣ���Ľ���
    public function MessageCenter(){
        $this->display();
    }

}