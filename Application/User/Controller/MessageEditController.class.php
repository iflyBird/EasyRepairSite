<?php

namespace User\Controller;

use Common\Controller;
use Think\Model;

class MessageEditController extends Controller\UserBaseController
{
  //������Ϣ�༭����
    public function MessageEdit(){
        //�������ݿ�����
        //��ȡ�û�id
        $id= $_SESSION['userId'];
        $model=new Model();
        $data=$model->query("select username,password,email,phone,avatar,sex,address from ers_users where id=$id");
        //var_dump($data[0]['username']);
        $this->assign('data',$data);
        $this->display();

    }
    //������Ϣ�޸Ĵ���
    public function saves()
    {
        $id=$_SESSION['userId'];
        $model = M('users');
       // dump($_POST['username']);
        //create�������ݴ������ǿյ�
       // $data = $model->create();
        $data['id']=$id;
        $data['username']=$_POST['username'];
        $data['password']=md5($_POST['password']);
        $data['phone']=$_POST['phone'];
        $data['sex']=$_POST['sex'];
        $data['address']=$_POST['address'];
        if ($data['id']) {

            $res = $model->save($data);
        } else {
            $res = $model->add($data);
        }
        if ($res >= 0) {
            response(1, '����ɹ���', null, U('User/MessageEdit/MessageEdit'));
        } else {
            response(2, '����ʧ�ܣ�');
        }
    }

}