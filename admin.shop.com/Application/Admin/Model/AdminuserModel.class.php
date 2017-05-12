<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 12:39
 */

namespace Admin\Model;


use Think\Model;

class AdminuserModel extends Model
{
    public function add($post){
        $id=parent::add();

        //>>2.将数据插入aur表

        $arModel=M('AdminuserRole');
        $arr=array();
        $roleids=$post['roleids'];
        foreach ($roleids as $roleid) {
            $arr[]=array('u_id'=>$id,'r_id'=>$roleid);
        }

        return $arModel->addAll($arr);

    }

    public function save($post){
        parent::save();

        //>>删去ar表原来数据
        $u_id=$post['id'];
        $arModel=M('AdminuserRole');
        $arModel->where("`u_id`=$u_id")->delete();

        //>>添加新数据
        $arr=array();
        foreach ($post['roleids'] as $roleid) {
            $arr[]=array('u_id'=>$u_id,'r_id'=>$roleid);
        }

        return $arModel->addAll($arr);
    }

    public function remove($id){
        $this->where("`id`=$id")->delete();

        $arModel=M('AdminuserRole');
        return $arModel->where("`u_id`=$id")->delete();
    }

}