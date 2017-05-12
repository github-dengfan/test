<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 12:24
 */

namespace Admin\Controller;


use Think\Controller;

class AdminuserController extends Controller
{
    public function index(){
        $adminuserModel=M('Adminuser');
        $rows=$adminuserModel->select();
        $this->assign('rows',$rows);
        $this->display();
    }

    public function add(){
        if(IS_POST){
            $adminuserModel=D('Adminuser');
            if($adminuserModel->create()!==false){
                $res=$adminuserModel->add(I());
                if($res){
                    $this->success('操作成功',U('index'));
                }else{
                    $this->error('操作失败'.show_model_error($adminuserModel),U('index'));
                }

            }

        }else{
            $roleModel=M('Role');
            $rows=$roleModel->select();
            $this->assign('rows',$rows);
            $this->display('edit');
        }
    }

    public function edit($id){
        $adminuserModel=D('Adminuser');
        if(IS_POST){
            if($adminuserModel->create()!==false){
                $res=$adminuserModel->save(I());
                if($res){
                    $this->success('操作成功',U('index'));
                }else{
                    $this->error('操作失败'.show_model_error($adminuserModel),U('index'));
                }
            }

        }else{

            //>>取出id对应用户表信息
            $user=$adminuserModel-> find($id);

            //>>取出id对应ar表信息
            $arModel=M('AdminuserRole');
            $roleids=$arModel->field('r_id')->where("`u_id`=$id")->select();
            $arr=array();
            foreach ($roleids as $roleid) {
                $arr[]=$roleid['r_id'];
            }

            //>>取出role表所有信息
            $roleModel=M('Role');
            $rows=$roleModel->select();

            $this->assign($user);
            $this->assign('arr',$arr);
            $this->assign('rows',$rows);
            $this->display();

        }
    }

    public function remove($id){
        $adminuserModel=D('Adminuser');
        $res=$adminuserModel->remove($id);

        if($res){
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败'.show_model_error($adminuserModel),U('index'));
        }
    }

}