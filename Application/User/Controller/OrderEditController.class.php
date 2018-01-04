<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class OrderEditController extends Controller\UserBaseController
{
   //加载订单修改界面
    public function OrderEdit(){
        $model=new Model();
        $sql="select o.*,o.id,s.name,p.price,u.username,u.phone as userphone,p.price,u.address,o.status,t.id as tid  from ers_order as o,ers_shop as s,ers_users as u,ers_price as p,ers_type as t where o.sid=s.id and o.uid=u.id and o.pid=p.id and p.tid=t.id";
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
       /* $model=new Model();
        $datas= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
        ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id");
        // var_dump($data[0]['id']) ;
        $this->assign('datas',$datas);
        $this->display();*/

    }
    //账单修改操作

        //获取数据库数据
        public function edit()

        {
            //获取订单id
            $id= $_GET['id'];
            $model=new Model();
            $sql="select o.*,o.id,s.name,p.price,u.username,u.phone as userphone,p.price,u.address,o.status,t.id as tid  from ers_order as o,ers_shop as s,ers_users as u,ers_price as p,ers_type as t where o.sid=s.id and o.uid=u.id and o.pid=p.id and p.tid=t.id and o.id=$id";
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


            $this->assign('data',$orders);
            $this->display();


    /*        $id = I('id');
            $model=new Model();
            $data= $model->query("select ers_shop.id,name,score,orders,detail,`check`,price from ers_order , ers_shop,ers_price  where
            ers_order.sid=ers_shop.id AND ers_order.pid=ers_price.id And  ers_shop.id=$id ");*/
          //  console.log($data);
         /*  echo($data);*/
           // var_dump($data);
           // print_r($data['id']) ;
            // var_dump($data) ;
          /*  $this->assign('data',$data);
            $this->display();*/

        }
    //数据保存
    public function saves()
    {
       /* $username=$_POST['username'];
        $phone=$_POST['userphone'];
        $address=$_POST['address'];*/
       /* $oid=$_POST['id'];*/
        //echo $oid;
       // echo $_POST['id'];
/*        $uid="select create_time from order where id=$oid";

        $model = M('users');
        $data = $model->create();

        $data['id']=$uid;
        $data['username']=$_POST['username'];
        $data['phone']=$_POST['userphone'];
        $data['address']=$_POST['address'];
   echo $uid;*/
       // echo $uid;
       // $sql="update users set username='$username',address=''$address'',phone=$phone  where id=$uid";
        /*echo $sql*/;
       // $user=M('users');
       // $user=$user->query($sql);
       //var_dump($user);
       //$data=array('username'=>'11','phone'=>'22','address'=>'22');
       // var_dump($data);
       // $user->where('id=$uid')->setField($data);

       /* $user->username=$username;
        $user->phone=$phone;
        $user->address=$address;
        $data=$user->where('id=$uid')->save();
        dump($data[]);*/




        //修改订单时候传用户id,一个用户对应一个订单权限
      $id=$_SESSION['userId'];
        $model = M('users');
        $data = $model->create();
        $data['id']=$id;
        $data['username']=$_POST['username'];
        $data['phone']=$_POST['userphone'];
        $data['address']=$_POST['address'];
        //where('id=5')->data($data)->save();
        if ($data['id']) {
            $res = $model->where('id=2')->data($data)->save();
        } else {
            $res = $model->add($data);
        }
        if ($res >= 0) {

          response(1, '保存成功！/', null, U('User/OrderEdit/OrderEdit'));

        } else {
            response(2, '保存失败！');
        }
    }






}