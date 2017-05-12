<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 21:04
 */

namespace Admin\Model;


use Think\Model;
use Think\Page;

class BaseModel extends Model
{

    protected $patchValidate = true;

    public function remove($id)
    {
        return parent::save(array('status' => -1, 'id' => $id));
    }

    public function getList()
    {
        return $this->where(array('status' => array('gt', -1)))->select();
    }

    public function changeStatus($arr)
    {
        if ($arr['status'] == -1) {
            return $this->save(array('status' => $arr['status'], 'name' => array('exp', "concat(name,'_del')"), 'id' => $arr['id']));
        }
        return $this->save(array('status' => $arr['status'], 'id' => $arr['id']));
    }

    public function getPage($where = array())
    {


        $where['status'] = array('gt', -1);
        //>>1.获取分页工具条
        $pageRows = 2;
        $totalRows = $this->where($where)->count();
        $pageHtml = '';

        $page = new Page($totalRows, $pageRows);
        $pageHtml = $page->show();

        //>>2.获取分页数据

        if ($page->firstRow > $totalRows - 1) {
            $page->firstRow = $totalRows - $page->listRows;
        }
        $rows = $this->where($where)->limit($page->firstRow, $page->listRows)->select();


        //>>3.返回数据
        return array('rows' => $rows, 'pageHtml' => $pageHtml);


    }
}