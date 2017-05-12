<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/6
 * Time: 20:47
 */

namespace Admin\Model;


use Think\Model;

class PermissionModel extends Model
{
    public function getRow($id){
        //>>0.从数据库中取出一行
        $p=$this->where("`id`=$id")->select();

        //>>1.从数据库中取出数据
        $rows=$this->order('path')->select();

        //>>2.对取出的数据进行缩进处理
        foreach ($rows as &$row) {
            $row['name-text']=str_repeat('&nbsp;',$row['level']*3).$row['name'];
        }

        //>>3.查询当前id的父亲id
        $path=$this->getFieldById($id,'path');
        $level=$this->getFieldById($id,'level');

        if($level==0){
            $id=0;
        }else{
            $arr=explode('@',$path);
            $id=$arr[$level-1];
        }
        //>>4.返回结果
        $res=array();
        $res[]=$rows;
        $res['select_id']=$id;
        $res['prow']=$p;
        return $res;
    }

    public function getList(){

        //>>1.从数据库中取出数据
        $rows=$this->order('path')->select();

        //>>2.对取出的数据进行缩进处理
        foreach ($rows as &$row) {
            $row['name-text']=str_repeat('&nbsp;',$row['level']*3).$row['name'];
        }

        //>>3.返回结果
        return $rows;
    }

    public function add($parent_id){
        $this->startTrans();
        //>>1.先添加表传递过来的数据
        $id=parent::add();

        //>>2.根据生成的id得到level和path的值
        if($parent_id==0){
            $path=$id.'@';
        }else{
            $path=$this->getFieldById($parent_id,'path').$id.'@';
        }
        $level=substr_count($path,'@')-1;

        //>>3.将level和path的值存入
        $res=$this->save(array('level'=>$level,'path'=>$path,'id'=>$id));

        //>>4.返回结果
        if($res===false){
            $this->rollback();
            return false;
        }
        $this->commit();
        return true;
    }

    public function remove($id){

        //>>1.根据id找到路径
        $path=$this->getFieldById($id,'path');

        //>>2.删去要删的权限,同时删去子权限
        $res=$this->where("path like '$path%'")->delete();

        //>>3.返回结果
        return $res;
    }

    public function save($post){
        $id=$post['id'];
        $name=$post['name'];
        $url=$post['url'];
        $parent_id=$post['parent_id'];

        //>>得到level和path
        $path=$this->getFieldById($parent_id,'path').$id.'@';
        $level=substr_count($path,'@')-1;

        //>>保存数据
        return parent::save(array('name'=>$name,'url'=>$url,'level'=>$level,'path'=>$path,'id'=>$id));

    }

}