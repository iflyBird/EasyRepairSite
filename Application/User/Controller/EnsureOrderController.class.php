<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class EnsureOrderController extends Controller\UserBaseController
{
   //����ȷ�϶�������
    public function EnsureOrder(){

        //��ȡ���ݿ�����
        $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
    // var_dump($datas[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();

    }

    //ȷ�ϰ�ť�������ȷ��(�޸�״̬)
    public function ensureButton(){
        //var_dump($_GET['id']);
        //
        //��ȡ���ݿ�����
        $model=new Model();
   $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        //��ȡ�����id
        $id=$_GET['id'];
        $shop=M("shop");
        $shop->check=1;
        $shop->where("id=$id")->save();
        $this->display();
     /*  $this->display('EnsureOrder');*/
     /*   $this->success('��ӳɹ�',U('EnsureOrder:EnsureOrder'),3);*/
       /* $model=new Model();
        $data= $model->query("update ers_shop set check ='1' where id=1");
        var_dump($data);*/

    }



}