<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 代码神生成器 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
  
</head>
<body>

<h1>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 代码生成器 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">

    <form method="post" action="<?php echo U();?>" name="theForm">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tbody>
            <tr>
                <td class="label">表名称</td>
                <td><input type="text" name="name" maxlength="60"><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br>
                    <input type="submit" class="button" value=" 确定 ">
                    <input type="reset" class="button" value=" 重置 ">
                </td>
            </tr>
            </tbody>
        </table>
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