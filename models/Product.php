<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 24.11.2021
 * Time: 22:22
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName(){
        return "product";
    }

    public function getCases(){
        return $this->hasMany(Cases::class, ['product_id' => 'id']);
    }
}