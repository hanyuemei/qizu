<form action="index.php?r=index/company_add" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">试题 名称</label>
        <input type="text" class="form-control" name="title" placeholder="请输入试题名称">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">试题 答案</label>
        <textarea class="form-control" rows="3" name="answer"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">试题 类型</label>
        <select class="form-control" name='type'>
            <option value="----请选择----" selected>--请选择--</option>
            <?php foreach($jie as $k=>$v){?>
                <option value="<?php echo $v['t_name']?>"><?php echo $v['t_name']?></option>
            <?php }?>
            </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">所属 学院</label>
        <select class="form-control" name='direction' id="direction">
            <?php if($u_id==1){
                ?>
                <option>--请选择--</option>
                <?php foreach($xue as $k=>$v){?>
                    <option value="<?php echo $v['c_id']?>">
                        <?php echo $v['c_name']?>
                    </option>
                <?php }?>
            <?php
            }else{
                ?>

            <option value="<?php echo $xue['c_id']?>">
                <?php echo $xue['c_name']?>
            </option>
        <?php

            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">所属 方向</label>
        <select class="form-control" name='zhuan' id="zhuan">
        <?php if($u_id==1) {
        ?>
            <option>请选择</option>
            <?php
        }else{
            ?>
            <?php foreach($zhuan as $k=>$v){?>
            <option value="<?php echo $v['d_name']?>">
                <?php echo $v['d_name']?>
            </option>
                <?php }?>
            <?php
        }?>


            </select>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file"  name="file">
        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>
    <button  type="submit" class="btn btn-default">Submit<tton>
</form>
<script src="./js/jquery-1.8.3.min.js"></script>
<script>
    $(document).on("change","#direction",function(){
       var id=$(this).attr('value');
        $.post('index.php?r=index/zhuan',{
            id:id
        },function(data){
            data=eval("("+data+")");
            console.log(data);
            var op="";
            for(i in data){
                op+="<option>"+data[i]['d_name']+"</option>";
            }
            $("#zhuan").html(op);
            //$("#direction").html(data);
        })
    })
</script>
