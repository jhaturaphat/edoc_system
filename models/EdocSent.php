<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_sent}}".
 *
 * @property int $id
 * @property string $edoc_id
 * @property string $e_id
 * @property string $edoc_read_id
 * @property string $r_date
 * @property string $edoc_type_id
 * @property string $e_id_sent
 * @property string $e_id_dud
 * @property string $user_get
 * @property string $date_get
 * @property string $ip_get
 * @property string $e_id_radio
 * @property string $dep_id
 */
class EdocSent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_sent}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_get', 'ip_get'], 'string'],
            [['dep_id'], 'required'],
            [['edoc_id', 'dep_id'], 'string', 'max' => 7],
            [['e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio'], 'string', 'max' => 6],
            [['edoc_read_id', 'edoc_type_id'], 'string', 'max' => 4],
            [['r_date', 'date_get'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'edoc_id' => 'Edoc ID',
            'e_id' => 'E ID',
            'edoc_read_id' => 'Edoc Read ID',
            'r_date' => 'R Date',
            'edoc_type_id' => 'Edoc Type ID',
            'e_id_sent' => 'E Id Sent',
            'e_id_dud' => 'E Id Dud',
            'user_get' => 'User Get',
            'date_get' => 'Date Get',
            'ip_get' => 'Ip Get',
            'e_id_radio' => 'E Id Radio',
            'dep_id' => 'Dep ID',
        ];
    }
}
