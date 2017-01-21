<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $name
 * @property string $country
 * @property integer $is_active
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'state', 'country'], 'required'],
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['state'], 'integer'],
            [['country'], 'string', 'max' => 2],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'state' => 'State',
            'country' => 'Country',
            'is_active' => 'Is Active',
        ];
    }
}
