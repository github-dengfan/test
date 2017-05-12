<extend name="Base/index"/>
<block name="form"><form method="post" action="" name="listForm">
	<!-- start brand list -->
	<div class="list-div" id="listDiv">

		<table cellpadding="3" cellspacing="1">
			<tbody>
			<tr>
				<th align="left"><input type="checkbox" class="selectAll"/>供应商名称</th>
				<?php foreach($res as $re):?>
				<th><?php echo $re['comment']?></th>
				<?php endForeach;?>

				<th>操作</th>
			</tr>
			<volist name="rows" id="row">
				<tr>
					<td class="first-cell"><input type="checkbox" name="ids[]" class="select" value="{$row.id}"/><span>{$row.name}</span></td>
					<td align="left" >{$row.intro}</td>
					<td align="right"><span>{$row.sort|default=10}</span></td>
					<td align="center"><a class="ajax-get" href="{:U('changeStatus',array('id'=>$row['id'],'status'=>1-$row['status']))}"><img src="__IMG__/{$row.status}.gif"></a></td>
					<td align="center">
						<a href="{:U('edit',array('id'=>$row['id']))}" title="编辑">编辑</a> |
						<a href="{:U('changeStatus',array('id'=>$row['id'],'status'=>-1))}" onclick="listTable.remove(1, '你确认要删除选定的商品品牌吗？')" title="编辑">移除</a>
					</td>
				</tr>
			</volist>
			<!--start，这些都是显示代码，没有格式化，开发时会删除 -->


			<!--end，这些都是显示代码，没有格式化，开发时会删除 -->
			<tr>
				<td align="right" nowrap="true" colspan="6">
					<div id="turn-page" class="page">
						{$pageHtml}
					</div>
				</td>
			</tr>
			</tbody></table>

		<!-- end brand list -->
	</div>
</form></block>



