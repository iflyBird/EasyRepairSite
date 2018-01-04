<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class EnsureOrderController extends Controller\UserBaseController
{
   //加载确认订单界面
    public function EnsureOrder(){
        $model=new Model();
        $sql="select o.*,s.name,u.username,u.phone as userphone,p.price,u.address,s.check,t.id as tid  from ers_order as o,ers_shop as s,ers_users as u,ers_price as p,ers_type as t where o.sid=s.id and o.uid=u.id and o.pid=p.id and p.tid=t.id";
        $orders=$model->query($sql);
        for($i=0;$i<count($orders);$i++){

            $model=M('users');
            $businessphone=$model->where(array('sid'=>$orders[$i]['sid']))->getField('phone');
            $orders[$i]['businessphone']=$businessphone;
            $model=new Model();
            $sql="select name as type from ers_type where FIND_IN_SET(id,getParList({$orders[$i]['tid']}))";
            $res=$model->query($sql);
            $type=$res[2]['type'] .$res[1]['type'];
            $orders[$i]['type']=$type;
        }
        $this->assign('datas',$orders);
        $this->display();





        //获取数据库数据
 /*       $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
    // var_dump($datas[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();*/

    }

    //确认按钮点击订单确认(修改状态)
    public function ensureButton(){
        //获取对应的订单编号id
        $id=$_GET['id'];
        $model=new Model();
        $sql="select o.*,s.name,u.username,u.phone as userphone,p.price,u.address,o.status,t.id as tid  from ers_order as o,ers_shop as s,ers_users as u,
        ers_price as p,ers_type as t where o.sid=s.id and o.uid=u.id and o.pid=p.id and p.tid=t.id and o.id=$id";
        $orders=$model->query($sql);
        for($i=0;$i<count($orders);$i++){

            $model=M('users');
            $businessphone=$model->where(array('sid'=>$orders[$i]['sid']))->getField('phone');
            $orders[$i]['businessphone']=$businessphone;
            $model=new Model();
            $sql="select name as type from ers_type where FIND_IN_SET(id,getParList({$orders[$i]['tid']}))";
            $res=$model->query($sql);
            $type=$res[2]['type'] .$res[1]['type'];
            $orders[$i]['type']=$type;
        }
        $this->assign('datas',$orders);
        $this->display();
        //var_dump($_GET['id']);
        //
        //获取数据库数据
    /*    $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);*/
        //获取传入的id
        /*$id=$_GET['id'];*/
        $order=M("order");
        $order->status=1;
        $order->where("id=$id")->save();
        $this->display();
     /*  $this->display('EnsureOrder');*/
     /*   $this->success('添加成功',U('EnsureOrder:EnsureOrder'),3);*/
       /* $model=new Model();
        $data= $model->query("update ers_shop set check ='1' where id=1");
        var_dump($data);*/

    }



}