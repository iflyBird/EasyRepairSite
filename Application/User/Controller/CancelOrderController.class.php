<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class CancelOrderController extends Controller\UserBaseController
{
   //加载取消订单界面
    public function CancelOrder(){
        //获取数据库数据
        $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();

    }
    //实现取消订单方法
    public function cancel(){
        echo $_GET['id'];


    }
    public function delete()
    {
        $id = I('id');
        $model = M('shop');
        $res = $model->where(array('id' => $id))->delete();
        if ($res) {
            response(1, '删除成功！', null, U('User/CancelOrder/CancelOrder'));
        } else {
            response(2, '删除失败！');
        }
    }

}