<form action="saveadd" method="get">
<table>
    <input type="hidden" name="id" value="<?php echo $arr[0]['c_id']?>">
    <tr>
        <td>留言 </td>
        <td><textarea name="con"><?php echo $arr[0]['c_con']?></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" id="sub" value="修改"></td>
    </tr>
</table></form>