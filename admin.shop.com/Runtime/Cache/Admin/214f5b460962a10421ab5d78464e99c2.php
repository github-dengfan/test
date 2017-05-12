<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 权限 管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('index');?>">权限列表</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 编辑供应商信息 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
<form method="post" action="<?php echo U();?>" name="theForm">
<table cellspacing="1" cellpadding="3" width="100%">
  <tbody><tr>
    <td class="label">权限名称</td>
    <td><input type="text" name="name" maxlength="60" value="<?php echo ($name); ?>"><span class="require-field">*</span></td>
  </tr>
 
  <tr>
    <td class="label">权限url</td>
    <td><input type="text" name="url" maxlength="60" value="<?php echo ($url); ?>"><span class="require-field">*</span></td>
  </tr>
  <tr>
    <td class="label">父级权限</td>
    <td>
      <select name="parent_id" id="">
        <option value="0">-顶级权限-</option>
        <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row["id"]); ?>" <?php echo $select_id==$row['id']?'selected':'';?>><?php echo ($row["name-text"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      <span class="require-field">*</span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br>
        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
      <input type="submit" class="button" value=" 确定 ">
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
<script type="text/javascript">
//    单选按钮通过jquery赋值,给谁赋值,谁被选中
    $(function () {
        $('.status').val([<?php echo ((isset($status) && ($status !== ""))?($status):1); ?>]);
    });
</script>
</body>
</html>