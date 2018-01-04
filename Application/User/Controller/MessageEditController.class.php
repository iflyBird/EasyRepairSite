<?php
namespace User\Controller;
use Common\Controller;
use Think\Model;

class MessageEditController extends Controller\UserBaseController
{

  //加载消息编辑界面
    public function MessageEdit(){
     //加载数据库数据
        //获取用户id
        $id= $_SESSION['userId'];
        $model=new Model();
        $data=$model->query("select username,password,email,phone,avatar,sex,address from ers_users where id=$id");
        //var_dump($data[0]['username']);
        $this->assign('data',$data);
        $this->display();

    }
  //个人信息修改
    public function saves()
    {

        $id=$_SESSION['userId'];
        $model = M('users');
       // dump($model);
       // dump($_POST['username']);
        //create不带数据创建的是空的
        $data = $model->create();
        $data['id']=$id;
        $data['username']=$_POST['username'];
        //暂时密码不需要反加密,否则影响下次登陆
        $data['password']=($_POST['password']);
        $data['phone']=$_POST['phone'];
        $data['sex']=$_POST['sex'];
        $data['address']=$_POST['address'];
        $data['email']=$_POST['email'];
        if ($data['id']) {
            // echo "11";
            $res = $model->save($data);
        } else {
            $res = $model->add($data);
        }
        if ($res >= 0) {
              //echo "22";


            response(1, '保存成功！/', null, U('User/OrderEdit/OrderEdit'));

        } else {
            response(2, '保存失败！');
        }
    }


}