<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_type}}".
 *
 * @property string $edoc_type_id
 * @property string $edoc_type_name
 */
class EdocType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_type_id'], 'required'],
            [['edoc_type_name'], 'string'],
            [['edoc_type_id'], 'string', 'max' => 4],
            [['edoc_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'edoc_type_id' => 'Edoc Type ID',
            'edoc_type_name' => 'Edoc Type Name',
        ];
    }
}
