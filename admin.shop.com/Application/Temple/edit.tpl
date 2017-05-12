<extend name="Base/edit"/>
<block name="form"><form method="post" action="{:U()}" name="theForm">
  <table cellspacing="1" cellpadding="3" width="100%">
    <tbody>
    <?php foreach($res as $re):?>
    <tr>
      <td class="label"><?php echo $re['comment']?></td>
    </tr>
    <?php
    if($re['filed_type']=='radio'){
      echo"<td><input type='radio' class='status' name='status' value='1' > 是<input type='radio' class='status' name='status' value='0' > 否</td>";
    }else{
    echo "<td><input type='text' name='{$re['field']}' maxlength='60' value='{\${$re['field']}}'><span class='require-field'>*</span></td>";
    }

    ?>

    <?php endForeach;?>

    <tr>
      <td colspan="2" align="center"><br>
        <input type="hidden" name="id" value="{$id}"/>
        <input type="submit" class="button ajax-post" value=" 确定 ">
        <input type="reset" class="button" value=" 重置 ">
        <input type="hidden" name="act" value="update">
        <input type="hidden" name="brand_id" value="<?php echo $brand_info['brand_id'] ;?>">
      </td>
    </tr>
    </tbody></table>
</form></block>

