<?php
use yii\widgets\LinkPager;
?>
<div id="table">
<table>
<tr>
	<td>留言 </td>
	<td><textarea id="con"></textarea></td>
</tr>
	<tr>
		<td></td>
		<td><input type="button" id="sub" value="提交"></td>
	</tr>
</table>
</div>
<div id="div1">
    <?php foreach($arr as $k=>$v) {?>
        <li>
            <?php echo $v['c_con']?><a href="index.php?r=index/del&id=<?php echo $v['c_id']?>">删除</a>
            <a href="index.php?r=index/save&id=<?php echo $v['c_id']?>">修改</a>
        </li>
    <?php } ?>
</div>
<?php
if(!empty($pages)){
    echo LinkPager::widget([
        'pagination' => $pages,
        'firstPageLabel'=>'首页',
        'nextPageLabel'=>'下一页',
        'prevPageLabel'=>'上一页',
        'lastPageLabel'=>'尾页',
    ]);
}

?>
    <script src="./js/jquery.1.8.min.js"></script>
<script>
    $("#sub").click(function(){
        var con=$("#con").val();
        $.post('index.php?r=index/add',{
            con:con
        },function(data){

           $("#div1").html(data)
    })
    })
</script>