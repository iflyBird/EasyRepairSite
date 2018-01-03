<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class EnsureOrderController extends Controller\UserBaseController
{
   //加载确认订单界面
    public function EnsureOrder(){

        //获取数据库数据
        $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
    // var_dump($datas[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();

    }

    //确认按钮点击订单确认(修改状态)
    public function ensureButton(){
        //var_dump($_GET['id']);
        //
        //获取数据库数据
        $model=new Model();
   $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        //获取传入的id
        $id=$_GET['id'];
        $shop=M("shop");
        $shop->check=1;
        $shop->where("id=$id")->save();
        $this->display();
     /*  $this->display('EnsureOrder');*/
     /*   $this->success('添加成功',U('EnsureOrder:EnsureOrder'),3);*/
       /* $model=new Model();
        $data= $model->query("update ers_shop set check ='1' where id=1");
        var_dump($data);*/

    }



}