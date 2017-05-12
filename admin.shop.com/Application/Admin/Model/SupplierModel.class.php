<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 23:03
 */

namespace Admin\Model;


use Think\Model;
use Think\Page;

class SupplierModel extends BaseModel
{
    //开启批量验证
    // 自动验证定义
    protected $_validate = array(
        array('name','require','名字不能够为空'),
        array('intro','require','描述不能够为空'),
    );

}