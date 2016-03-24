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
   <?php foreach($arr as $v) {?>
    <li>
        <?php echo $v['c_con']?><a href="del?id=<?php echo $v['c_id']?>">删除</a>
            <a href="save?id=<?php echo $v['c_id']?>">修改</a>
    </li>
    <?php } ?>



</div>
<?php echo $arr->setPath('./list'); ?>
<script src="./js/jquery.1.8.min.js"></script>
<script>
    $("#sub").click(function(){
        var con=$("#con").val();
        $.get('add',{
            con:con
        },function(data){
           // alert(data)
            $("#div1").html(data)
        })
    })
</script>