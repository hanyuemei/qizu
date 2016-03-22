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
        <select class="form-control" name='direction'>

            <option value="<?php echo $xue['c_name']?>"><?php echo $xue['c_name']?></option>

        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">所属 方向</label>
        <select class="form-control" name='direction'>

<option value="<?php echo $zhuan['d_name']?>"><?php echo $zhuan['d_name']?></option>

            </select>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file"  name="file">
        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>
    <button  type="submit" class="btn btn-default">Submit<tton>
</form>
