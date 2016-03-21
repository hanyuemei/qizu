<div class="table-responsive">
<a href="index.php?r=index/company"><button  type="submit" class="btn btn-default" style="float:right">返回添加页面</button></a>
  <table class="table">
    <tr style="text-align:center">
    	<td>公司logo</td>
    	<td>试题名称</td>
    	<td>试题答案</td>
    	<td>试题类型</td>
    	<td>所属公司</td>
    	<td>操 作</td>
    </tr>
    <?php foreach($arr as $k=>$v){?>
		<tr>
			<td><img src="<?php echo $v['c_logo']?>" alt="" width="100" height="100px"></td>
			<td><?php echo $v['c_name']?></td>
			<td><?php echo $v['c_answer']?></td>
			<td><?php echo $v['c_type']?></td>
			<td><?php echo $v['c_college']?></td>
			<td><a href="index.php?r=index.php?r=index/listsdel">删除</a></td>
		</tr>
    <?php }?>
  </table>


</div>