<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class OrderEditController extends Controller\UserBaseController
{
   //���ض����޸Ľ���
    public function OrderEdit(){
        //��ȡ���ݿ�����
        $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();

    }
    //�˵��޸Ĳ���

        //��ȡ���ݿ�����
        public function edit()
        {
            $id = I('id');
            $model=new Model();
            $data= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
            ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id And  ers_shop.id=$id ");
          //  console.log($data);
         /*  echo($data);*/
           // var_dump($data);
           // print_r($data['id']) ;
            // var_dump($data) ;
            $this->assign('data',$data);
            $this->display();

        }
    //���ݱ���
    public function saves()
    {
        //����shop���в�������(ֻ���޸Ķ�������Ͷ�������)
        $model = M('shop');
       // var_dump($model);
        $data = $model->create();


        if ($data['id']) {
            $res = $model->save($data);
        } else {
            $res = $model->add($data);
        }
        if ($res >= 0) {
            response(1, '����ɹ���', null, U('User/OrderEdit/OrderEdit'));
        } else {
            response(2, '����ʧ�ܣ�');
        }
    }






}