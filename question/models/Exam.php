<?php

namespace app\models;

use yii\db\ActiveRecord;

class Exam extends ActiveRecord{

    public static function tableName(){

        return "exam";
    }
}