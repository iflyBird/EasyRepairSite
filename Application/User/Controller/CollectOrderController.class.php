<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class CollectOrderController extends Controller\UserBaseController
{
  //收藏的订单界面
    public function CollectOrder(){
        //加载数据库数据
        $User = M("shop"); // 实例化User对象
        $datas=$User->select();
        $this->assign('datas',$datas);
        $this->display();

       // $this->display();
    }
    //收藏的saves处理
    public function saves(){
        //获取前台的id
        $id=$_GET['id'];
        $shop=M('shop');
        $shop->collect=1;
        $shop->where("id=$id")->save();
       /* $this->display('OrderEdit:OrderEdit');*/
        header('location:' . U('OrderManger/OrderManger'));


    }

}