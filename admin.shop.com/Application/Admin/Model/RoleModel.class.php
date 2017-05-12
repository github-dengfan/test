<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 0:00
 */

namespace Admin\Model;


use Think\Model;

class RoleModel extends Model
{
    public function getRoleP($id){


        //>>2.获取r_p表对应数据
        $rpModel=D('RolePermission');
        $ps=$rpModel->field('p_id')->where("`r_id`=$id")->select();
        $pids=array();
        foreach ($ps as $p) {
            $pids[]=$p['p_id'];
        }

        //>>3.返回数据
        return $pids;

    }


    public function add($post){

        $ar=array(
            'name'=>$post['name'],
        );
        $id=parent::add($ar);

        $pids=$post['permission_ids'];
        $arr=array();
        foreach ($pids as $pid) {
            $arr[]=array('r_id'=>$id,'p_id'=>$pid);
        }

        $opModel=M('RolePermission');
        $opModel->addAll($arr);

        return $id;
    }


    public function save($post){

        //>>1.将role表信息修改
        $res=parent::save();

        //>>2.删除rp表对应信息
        $id=$post['id'];
        $rpModel=D('RolePermission');
        $rpModel->where("`r_id`=$id")->delete();


        //>>3.添加信息到rp表
        $permission_ids=$post['permission_ids'];
        $arr=array();
        foreach ($permission_ids as $permission_id) {
            $arr[]=array('r_id'=>$id,'p_id'=>$permission_id);
        }
        
        $res=$rpModel->addAll($arr);

        //>>4.返回结果
        return $res;

    }

    public function remove($id){

        //>>1.删除role表数据
        $this->where("`id`=$id")->delete();

        //>>2.删除rp表数据
        $rpModel=M('RolePermission');
        $res=$rpModel->where("`r_id`=$id")->delete();

        //>>3.返回结果
        return $res;
    }

}