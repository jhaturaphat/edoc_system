<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_dep}}".
 *
 * @property string $dep_id
 * @property string $dep_name
 * @property string $dep_user
 * @property string $dep_pass
 * @property string|null $sent_txt
 */
class EdocDep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_dep}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_id'], 'required'],
            [['dep_name'], 'string'],
            [['dep_id'], 'string', 'max' => 7],
            [['dep_user', 'dep_pass'], 'string', 'max' => 13],
            [['sent_txt'], 'string', 'max' => 30],
            [['dep_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dep_id' => 'Dep ID',
            'dep_name' => 'Dep Name',
            'dep_user' => 'Dep User',
            'dep_pass' => 'Dep Pass',
            'sent_txt' => 'Sent Txt',
        ];
    }
}
