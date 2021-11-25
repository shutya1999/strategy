<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 24.11.2021
 * Time: 23:42
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cases extends ActiveRecord
{
    public static function tableName()
    {
        return 'case';
    }

    public function getProduct(){
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}