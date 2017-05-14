<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 供应商管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
  

  <link rel="stylesheet" type="text/css" href="http://admin.shop.com/Public/Admin/uplodify/uploadify.css">

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
      <td class="label">图片</td>
      <td><input id="file_upload" type="file" name="pic" multiple="true"></td>
      <input type='hidden' class="logo" name='pic' maxlength='60'/>

      <div class="upload-img-box" style="display: none">
        <div class="upload-pre-item">
          <img src="">
        </div>
      </div>
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


  <script src="http://admin.shop.com/Public/Admin/uplodify/jquery.uploadify.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(function() {
      $('#file_upload').uploadify({
        'buttonText' : '图片上传',  //设置按钮文字
        'debug'    : true,  //开启调试
        'fileSizeLimit' : '1MB', //限制文件上传大小
        //'fileObjName' : 'pic',  //设置上传的名字
        'fileTypeExts' : '*.gif; *.jpg; *.png', //设置上传允许的扩展名
        'formData'      : {'dir' : 'logo'},  //设置文件上传时,传递的额外信息
        height        : 50,  //上传控件的高
        swf           : 'http://admin.shop.com/Public/Admin/uplodify/uploadify.swf',  //设置swf文件
        uploader      : "<?php echo U('Upload/index');?>",  //设置上传文件的额处理文件
        'width'     : 120,  //设置空间 的髋

        'onUploadSuccess' : function(file, data, response) {
          $('.upload-pre-item img').attr('src','.http://admin.shop.com/Uploads/'+data);
          $('.imgs').attr('src','./Upload/'+data);
          $('.upload-img-box').show();
          $('.logo').val(data);

        },  //上传成功的返回数据  file为上传的文件原名  data为上传后服务器返回的任何数据  response为真假值

        'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('文件 ' + file.name + ' 上传失败: ' + errorString);
        }   //上传失败返回数据

      });
    });
  </script>

<script type="text/javascript">
//    单选按钮通过jquery赋值,给谁赋值,谁被选中
    $(function () {
        $('.status').val([<?php echo ((isset($status) && ($status !== ""))?($status):1); ?>]);
    });
</script>
</body>
</html>