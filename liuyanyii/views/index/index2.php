
<?php
use yii\widgets\LinkPager;
?>
<div id="div1">
    <?php foreach($arr as $k=>$v) {?>
        <li><?php echo $v['c_con']?><a href="index.php?r=index/del&id=<?php echo $v['c_id']?>">删除</a>
            <a href="index.php?r=index/save&id=<?php echo $v['c_id']?>">修改</a>
        </li>
    <?php } ?>
</div>

