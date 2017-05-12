<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/6
 * Time: 20:46
 */

namespace Admin\Controller;


use Think\Controller;

class PermissionController extends Controller
{
    public function index(){
        $permissionModel=D('Permission');
        $rows=$permissionModel->getList();
        $this->assign('rows',$rows);
        $this->display();
    }

    public function add(){
        $permissionModl=D('Permission');
        if(IS_POST){

            if($permissionModl->create()!==false){
                if($permissionModl->add(I('parent_id'))){
                    $this->success('操作成功',U('index'));
                    return;
                }
            }
            $this->error('操作失败'.show_model_error($permissionModl),U(''));
        }else{
            $rows=$permissionModl->getList();
            $this->assign('rows',$rows);
            $this->display('edit');
        }

    }

    public function remove($id){
        $permissionModl=D('Permission');
        $res=$permissionModl->remove($id);
        if($res){
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败'.show_model_error($permissionModl),U('index'));
        }
    }

    public function edit($id){
        $permissionModel=D('Permission');
        if(IS_POST){
            $res=$permissionModel->save(I(''));
            if($res){
                $this->success('操作成功',U('index'));
            }else{
                $this->error('操作失败'.show_model_error($permissionModel),U(''));
            }

        }else{
            $rows=$permissionModel->getRow($id);
            $this->assign('rows',$rows[0]);
            $this->assign('select_id',$rows['select_id']);
            $this->assign($rows['prow'][0]);
            $this->display();
        }

    }

}