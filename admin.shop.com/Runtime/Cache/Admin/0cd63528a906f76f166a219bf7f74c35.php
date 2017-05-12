<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 供应商管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
  
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('index');?>">商品供应商</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 编辑供应商信息 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
<form method="post" action="<?php echo U();?>" name="theForm">
  <table cellspacing="1" cellpadding="3" width="100%">
    <tbody><tr>
      <td class="label">供应商名称</td>
      <td><input type="text" name="name" maxlength="60" value="<?php echo ($name); ?>"><span class="require-field">*</span></td>
    </tr>

    <tr>
      <td class="label">供应商简介</td>
      <td><textarea name="intro" cols="60" rows="4"><?php echo ($intro); ?></textarea></td>
    </tr>
    <tr>
      <td class="label">排序</td>
      <td><input type="text" name="sort" maxlength="40" size="15" value="<?php echo ((isset($sort) && ($sort !== ""))?($sort):20); ?>"></td>
    </tr>
    <tr>
      <td class="label">是否显示</td>
      <td>
        <input type="radio" class="status" name="status" value="1" > 是
        <input type="radio" class="status" name="status" value="0" > 否
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><br>
        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
        <input type="submit" class="button ajax-post" value=" 确定 ">
        <input type="reset" class="button" value=" 重置 ">
        <input type="hidden" name="act" value="update">
        <input type="hidden" name="brand_id" value="<?php echo $brand_info['brand_id'] ;?>">
      </td>
    </tr>
    </tbody></table>
</form>
</div>


<div id="footer">
	版权所有 &copy; 2012-2013 传智播客 - PHP培训 - </div>
</div>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/com.js"></script>

<script type="text/javascript">
//    单选按钮通过jquery赋值,给谁赋值,谁被选中
    $(function () {
        $('.status').val([<?php echo ((isset($status) && ($status !== ""))?($status):1); ?>]);
    });
</script>
</body>
</html>