<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_status}}".
 *
 * @property string $edoc_status_id
 * @property string $edoc_status_name
 */
class EdocStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_status}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_status_id'], 'required'],
            [['edoc_status_name'], 'string'],
            [['edoc_status_id'], 'string', 'max' => 4],
            [['edoc_status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'edoc_status_id' => 'รหัสสถานะการดำเนินการของหนังสือ',
            'edoc_status_name' => 'ชื่อสถานะการดำเนินการของหนังสือ',
        ];
    }
}
