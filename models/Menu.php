<?php


namespace app\models;


use yii\db\ActiveRecord;

class Menu extends ActiveRecord
{
    public static function tableName()
    {
        return 'menu';
    }
}