<?php
namespace Admin\Model;


use Think\Model;
use Think\Page;

class BrandModel extends BaseModel
{

    protected $_validate = array(

        array('name','require','品牌名不能为空'), 
array('weburl','require','品牌网址不能为空'), 
array('sort','require','品牌排序不能为空'), 
array('status','require','品牌状态不能为空'), 
    );

}