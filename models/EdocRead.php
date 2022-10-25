<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_read}}".
 *
 * @property string $edoc_read_id
 * @property string $edoc_read_name
 */
class EdocRead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_read}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_read_id'], 'required'],
            [['edoc_read_name'], 'string'],
            [['edoc_read_id'], 'string', 'max' => 4],
            [['edoc_read_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'edoc_read_id' => 'รหัสสถานะการอ่าน',
            'edoc_read_name' => 'ชื่อสถานะการอ่าน',
        ];
    }
}
