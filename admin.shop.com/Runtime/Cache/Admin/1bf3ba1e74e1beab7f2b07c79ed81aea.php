<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 商品供应商 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
    <link href="http://admin.shop.com/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />

</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('add');?>">添加供应商</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品供应商 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="<?php echo U();?>" name="searchForm">
    <img src="http://admin.shop.com/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
     <input type="text" name="search" size="15" value="<?php echo ($_GET['search']); ?>">
    <input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<input type="button" value="删除" class="button ajax-post" url="<?php echo U('changeStatus',array('status'=>-1));?>"/>

<form method="post" action="" name="listForm">
	<!-- start brand list -->
	<div class="list-div" id="listDiv">

		<table cellpadding="3" cellspacing="1">
			<tbody>
			<tr>
				<th align="left"><input type="checkbox" class="selectAll"/>供应商名称</th>
								<th>品牌名</th>
								<th>品牌网址</th>
								<th>品牌排序</th>
								<th>品牌简介</th>
								<th>品牌状态</th>
				
				<th>操作</th>
			</tr>
			<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
					<td class="first-cell"><input type="checkbox" name="ids[]" class="select" value="<?php echo ($row["id"]); ?>"/><span><?php echo ($row["name"]); ?></span></td>
					<td align="left" ><?php echo ($row["intro"]); ?></td>
					<td align="right"><span><?php echo ((isset($row["sort"]) && ($row["sort"] !== ""))?($row["sort"]):10); ?></span></td>
					<td align="center"><a class="ajax-get" href="<?php echo U('changeStatus',array('id'=>$row['id'],'status'=>1-$row['status']));?>"><img src="http://admin.shop.com/Public/Admin/images/<?php echo ($row["status"]); ?>.gif"></a></td>
					<td align="center">
						<a href="<?php echo U('edit',array('id'=>$row['id']));?>" title="编辑">编辑</a> |
						<a href="<?php echo U('changeStatus',array('id'=>$row['id'],'status'=>-1));?>" onclick="listTable.remove(1, '你确认要删除选定的商品品牌吗？')" title="编辑">移除</a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<!--start，这些都是显示代码，没有格式化，开发时会删除 -->


			<!--end，这些都是显示代码，没有格式化，开发时会删除 -->
			<tr>
				<td align="right" nowrap="true" colspan="6">
					<div id="turn-page" class="page">
						<?php echo ($pageHtml); ?>
					</div>
				</td>
			</tr>
			</tbody></table>

		<!-- end brand list -->
	</div>
</form>


<div id="footer">
	版权所有 &copy; 2012-2013 传智播客 - PHP培训 - </div>
</div>

<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/com.js"></script>

</body>
</html>