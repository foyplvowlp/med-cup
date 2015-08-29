<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospname".
 *
 * @property integer $id
 * @property string $hospname
 */
class Hospname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hospname'], 'required'],
            [['id'], 'integer'],
            [['hospname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospname' => 'Hospname',
        ];
    }
}
