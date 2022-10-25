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
            'id' => 'รหัสหนังสือ',
            'edoc_id' => 'ปีที่รับหนังสือ',
            'e_id' => 'ลำดับที่ทั่วไปหนังสือรับ',
            'edoc_read_id' => 'รหัสการอ่าน',
            'r_date' => 'วันที่รับหนังสือ',
            'edoc_type_id' => 'รหัสประเภทหนังสือ',
            'e_id_sent' => 'ลำดับที่ทั่วไปหนังสือส่ง',
            'e_id_dud' => 'ลำดับที่ทั่วไปหนังสือเวียนภายใน',
            'user_get' => 'User ที่เปิดอ่าน',
            'date_get' => 'วันทีเปิดอ่าน',
            'ip_get' => 'เครื่องที่เปิดอ่าน',
            'e_id_radio' => 'เลขที่หนังสือเวียนวิทยุ',
            #'dep_id' => 'Dep ID',
        ];
    }
}
