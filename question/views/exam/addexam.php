<form action="index.php?r=exam/exam_add" method="post" enctype="multipart/form-data">

    <input type="radio" value="1" name="radio" class="r">单选题&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" value="0" name='radio' class="r">简答题

    <div class="form-group">
        <label for="exampleInputPassword1">公司 名称</label>
        <select class="form-control" name='company'>
            <option value="----请选择----" selected>--请选择--</option>
            <?php foreach($company as $k=>$v){?>
                <option value="<?php echo $v['company_id']?>"><?php echo $v['company_name']?></option>
            <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">职业 方向</label>
        <select class="form-control" name='direction'>
            <option value="----请选择----" selected>--请选择--</option>
            <?php foreach($direction as $k=>$v){?>
                <option value="<?php echo $v['d_id']?>"><?php echo $v['d_name']?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">试题 名称</label>
        <input type="text" class="form-control" name="e_name" placeholder="请输入试题名称">
    </div>
    <div id="xuan" name="xuan">
        A:<input type="text" class="form-control" name="a">
        B:<input type="text" class="form-control" name="b">
        C:<input type="text" class="form-control" name="c">
        D:<input type="text" class="form-control" name="d">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">试题 答案</label>
        <textarea class="form-control" rows="3" name="answer"></textarea>
    </div>

    <button  type="submit" class="btn btn-default">Submit<tton>
</form>
<script src="./js/jquery-1.8.3.min.js"></script>
<script>
   $(function(){
       $("#xuan").hide()
   })
    $(".r").click(function(){
       var radio=$(this).attr('value')
        if(radio==1){
            $("#xuan").show()
        }else if(radio==0){
            $("#xuan").hide()
        }
    })
</script>

