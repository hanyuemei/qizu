<div class="table-responsive">
    <a href="index.php?r=exam/addexam"><button  type="submit" class="btn btn-default" style="float:right">返回添加页面</button></a>
    <table class="table">
        <tr style="text-align:center">
            <td>公司名称</td>
            <td>职业方向</td>
            <td>试题名称</td>
            <td>试题答案</td>
            <td>添加时间</td>
            <td>操 作</td>
        </tr>
        <?php foreach($arr as $k=>$v){?>
            <tr>
                <td><?php echo $v['company_id']?></td>
                <td><?php echo $v['direction_id']?></td>
                <td><?php echo $v['e_name']?></td>
                <td><?php echo $v['e_an']?></td>
                <td><?php echo $v['addtime']?></td>
                <td><a href="index.php?r=index.php?r=index/listsdel">删除</a></td>
            </tr>
        <?php }?>
    </table>


</div>