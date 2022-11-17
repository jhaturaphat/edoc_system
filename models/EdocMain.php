<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_main}}".
 *
 * @property string $edoc_id ปีที่รับหนังสือ เช่น 2565
 * @property string $e_id ลำดับที่ทั่วไปหนังสือรับ เช่น 05023
 * @property string $edoc_no_get เลขลำดับหนังสือ เช่น อบ0032.012/ว11
 * @property string $edoc_no_sent เลขที่หนังสือส่ง
 * @property string $edoc_no_keep เลขที่หนังสือเก็บ
 * @property string $edoc_date_doc ลงวันที่ตามเอกสาร
 * @property string $edoc_date_get วันที่รับหนังสือ
 * @property string $edoc_from จาก
 * @property string $edoc_to ถึง
 * @property string $edoc_name เรื่อง
 * @property string|null $dep_id
 * @property string $edoc_type_id รหัสประเภทหนังสือ
 * @property string $edoc_status_id รหัสสถานะการดำเนินการของหนังสือ 
 * @property string|null $edoc_read_id รหัสสถานะการอ่านของหนังสือ
 * @property string|null $path ชื่อไฟล์ที่ upload เช่น 6301.pdf
 * @property string $edoc_important_id รหัสความสำคัญของหนังสือ
 * @property string $e_id_sent ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023
 * @property string $e_id_dud ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023
 * @property string $e_id_radio ลำดับที่ทั่วไปหนังสือเวียนวิทยุ เช่น 05023
 * @property string|null $ip_get_sent ip เครื่องที่เปิดอ่าน
 * @property string|null $create_at current_timestamp วันเวลาบันทึก
 */
class EdocMain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edoc_main}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_status_id','edoc_important_id','edoc_type_id','edoc_name','edoc_to','edoc_from','edoc_date_doc','edoc_id', 'e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio','edoc_date_get','edoc_no_get','edoc_no_keep',''], 'required'],
            [['edoc_name', 'path', 'ip_get_sent'], 'string'],
            [['create_at'], 'safe'],
            [['edoc_id', 'dep_id'], 'string', 'max' => 7],
            [['e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio'], 'string', 'max' => 6],
            [['edoc_no_get', 'edoc_no_sent', 'edoc_no_keep', 'edoc_from', 'edoc_to'], 'string', 'max' => 50],
            [['edoc_date_doc', 'edoc_date_get'], 'string', 'max' => 10],
            [['edoc_type_id', 'edoc_status_id', 'edoc_read_id', 'edoc_important_id'], 'string', 'max' => 4],
            [['edoc_id', 'e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio'], 'unique', 'targetAttribute' => ['edoc_id', 'e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'edoc_id' => 'ปีที่รับหนังสือ เช่น 2565',
            'e_id' => 'ลำดับที่ทั่วไปหนังสือรับ เช่น 05023',
            'edoc_no_get' => 'เลขลำดับหนังสือ เช่น อบ0032.012/ว11',
            'edoc_no_sent' => 'เลขที่หนังสือส่ง',
            'edoc_no_keep' => 'เลขที่หนังสือเก็บ',
            'edoc_date_doc' => 'ลงวันที่ตามเอกสาร',
            'edoc_date_get' => 'วันที่รับหนังสือ',
            'edoc_from' => 'จาก',
            'edoc_to' => 'ถึง',
            'edoc_name' => 'เรื่อง',
            'dep_id' => 'Dep ID',
            'edoc_type_id' => 'รหัสประเภทหนังสือ',
            'edoc_status_id' => 'รหัสสถานะการดำเนินการของหนังสือ ',
            'edoc_read_id' => 'รหัสสถานะการอ่านของหนังสือ',
            'path' => 'ชื่อไฟล์ที่ upload เช่น 6301.pdf',
            'edoc_important_id' => 'รหัสความสำคัญของหนังสือ',
            'e_id_sent' => 'ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023',
            'e_id_dud' => 'ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023',
            'e_id_radio' => 'ลำดับที่ทั่วไปหนังสือเวียนวิทยุ เช่น 05023',
            'ip_get_sent' => 'ip เครื่องที่เปิดอ่าน',
            'create_at' => 'current_timestamp วันเวลาบันทึก',
        ];
    }
}
