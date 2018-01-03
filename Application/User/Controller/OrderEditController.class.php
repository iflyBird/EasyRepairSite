<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class OrderEditController extends Controller\UserBaseController
{
   //加载订单修改界面
    public function OrderEdit(){
        //获取数据库数据
        $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();

    }
    //账单修改操作

        //获取数据库数据
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
    //数据保存
    public function saves()
    {
        //先向shop表中插入数据(只能修改订单详情和订单评分)
        $model = M('shop');
       // var_dump($model);
        $data = $model->create();


        if ($data['id']) {
            $res = $model->save($data);
        } else {
            $res = $model->add($data);
        }
        if ($res >= 0) {
            response(1, '保存成功！', null, U('User/OrderEdit/OrderEdit'));
        } else {
            response(2, '保存失败！');
        }
    }






}