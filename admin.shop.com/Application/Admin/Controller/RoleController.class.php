<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/6
 * Time: 23:33
 */

namespace Admin\Controller;


use Think\Controller;

class RoleController extends Controller
{
    public function index(){
        $roleModel=M('Role');
        $rows=$roleModel->select();
        $this->assign('rows',$rows);
        $this->display();
    }

    public function add(){
        if(IS_POST){
            $roleModel=D('Role');
            $res=$roleModel->add(I());
            if($res){
                $this->success('操作成功',U('index'));
            }else{
                $this->error('操作失败'.show_model_error($roleModel),U());
            }

        }else{
            $permissionModel=D('Permission');
            $rows=$permissionModel->getList();
            $this->assign('rows',$rows);
            $this->display('edit');
        }
    }

    public function edit($id){
        $roleModel=D('Role');
        if(IS_POST){
            if($roleModel->create()!==false){
                $res=$roleModel->save(I());
                if($res){
                    $this->success('操作成功',U('index'));
                }else{
                    $this->error('操作失败'.show_model_error($roleModel),U('index'));
                }
            }

        }else{

            $role=$roleModel->find($id);
            $this->assign($role);

            $pids=$roleModel->getRoleP($id);
            $this->assign('pids',$pids);

            $permissionModel=D('Permission');
            $rows=$permissionModel->getList();
            $this->assign('rows',$rows);
            $this->display();
        }
    }

    public function remove($id){
        $roleModel=D('Role');
        $res=$roleModel->remove($id);
        if($res){
            $this->success('操作成功',U('index'));
        }else{
            $this->error('操作失败'.show_model_error($roleModel),U('index'));
        }

    }

}