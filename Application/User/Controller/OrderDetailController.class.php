<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class OrderDetailController extends Controller\UserBaseController
{
   //���ض�������
    public function OrderDetail(){

        //��ȡ���ݿ�����
        $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();
        /*$this->display();*/
    }

}