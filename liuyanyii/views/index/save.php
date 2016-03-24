<form action="index.php?r=index/sa" method="post">
<table>
    <input type="hidden" name="id" value="<?php echo $arr['c_id']?>">
    <tr>
        <td>留言 </td>
        <td><textarea name="con"><?php echo $arr['c_con']?></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" id="sub" value="修改"></td>
    </tr>
</table></form>