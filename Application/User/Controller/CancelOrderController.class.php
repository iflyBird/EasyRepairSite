<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class CancelOrderController extends Controller\UserBaseController
{
   //加载取消订单界面
    public function CancelOrder(){
        $model=new Model();
        $sql="select o.*,s.name,u.username,u.phone as userphone,p.price,u.address,o.status,t.id as tid  from ers_order as o,ers_shop as s,ers_users as u,
    ers_price as p,ers_type as t where o.sid=s.id and o.uid=u.id and o.pid=p.id and p.tid=t.id ";
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
   /*     $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();*/

    }
/*    //实现取消订单方法
    public function cancel(){
        echo $_GET['id'];


    }*/
    public function delete()
    {
        //获取订单编号
        $id = I('id');
        $model = M('order');
        $res = $model->where(array('id' => $id))->delete();
        if ($res) {


            response(1, '删除成功！', null, U('User/OrderManger/OrderManger'));
        } else {
            response(2, '删除失败！');
        }
    }

}