<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Index  extends ActiveRecord{
    public static function tableName(){
        return "liuyan";
    }
}