<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 20:52
 */

namespace Admin\Controller;


use Think\Controller;

class BaseController extends Controller
{
    protected $model;
    protected function _initialize()
    {
        $this->model = D(CONTROLLER_NAME);
    }
    /**
     * 供应商的列表
     */
    public function index()
    {

        //创建模型

        $search = I('get.search');
        if (!empty($search)) {
            $where['name'] = array('like', "%$search%");
        }
        //取出表中数据,分页工具条
        $res = $this->model->getPage($where);


        //分配数据
        $this->assign('rows', $res['rows']);
        $this->assign('pageHtml', $res['pageHtml']);
        setcookie('forward', $_SERVER['REQUEST_URI']);
        //显示页面
        $this->display('index');
    }

    /**
     * 添加供应商
     */
    public function add()
    {
        if (IS_POST) {

            if ($this->model->create() !== false) {
                if ($this->model->add() !== false) {
                    $this->success('添加成功', U('index'));
                    return;
                }
            }
            $this->error('操作失败' . show_model_error($this->model));

        } else {
            $this->display('edit');
        }
    }

    /**
     * 编辑供应商信息
     * @param $id 供应商id
     */
    public function edit($id)
    {

        if (IS_POST) {
            if ($this->model->create() !== false) {
                if ($this->model->save() !== false) {
                    $this->success('修改成功', cookie('forward'));
                    return;
                }
            }
            $this->error('操作失败' . show_model_error($this->model));

        } else {
            $row = $this->model->find($id);
            $this->assign($row);
            $this->display('edit');
        }
    }

    public function remove($id)
    {

        $result = $this->model->remove($id);
        if ($result) {
            $this->success('删除成功!', U('index'));
        } else {
            $this->error('删除失败!' . show_model_error($this->model));
        }
    }

    public function changeStatus()
    {

        $arr = I();
        $res = $this->model->changeStatus($arr);
        if ($res) {
            $this->success('操作成功', cookie('forward'));
        } else {
            $this->error('操作失败' . show_model_error($this->model));
        }
    }


}