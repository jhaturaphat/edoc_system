<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_important}}".
 *
 * @property string $edoc_important_id รหัสความสำคัญของหนังสือ
 * @property string $edoc_important_name ชื่อความสำคัญของหนังสือ เช่น ด่วน ด่วนมาก ปกติ
 */
class EdocImportant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_important}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_important_id', 'edoc_important_name'], 'required'],
            [['edoc_important_name'], 'string'],
            [['edoc_important_id'], 'string', 'max' => 4],
            [['edoc_important_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'edoc_important_id' => 'รหัสความสำคัญของหนังสือ',
            'edoc_important_name' => 'ชื่อความสำคัญของหนังสือ เช่น ด่วน ด่วนมาก ปกติ',
        ];
    }
}
