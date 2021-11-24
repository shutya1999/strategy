<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "local".
 *
 * @property integer $id
 * @property string $var
 * @property string $ru
 * @property string $ua
 */
class Local extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['var'], 'required'],
            [['var'], 'string', 'max' => 255],
            [['ru', 'ua'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'var' => 'Var',
            'ru' => 'Ru',
            'ua' => 'Ua',
        ];
    }
//    public static function test($lang_id=null)
//    {
//        $lang_id = ($lang_id === null)? Lang::getCurrent()->url: $lang_id;
//        //$sql = "SELECT `$lang_id` FROM `local`";
//        $sql = "SELECT * FROM `local`";
//        $data = self::findBySql($sql)->all();
//        $local[$data['var']]['en'] = $data['en'];
//        $local[$data['var']]['fr'] = $data['fr'];
//        return $data;
//    }

}
