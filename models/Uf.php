<?php
namespace app\models;
use Yii;
use \yii\db\ActiveRecord;
class Uf extends ActiveRecord{
    public static function tableName()
    {
        return 'tb_uf';   
    }
    
}