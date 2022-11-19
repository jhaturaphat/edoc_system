<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edoc_main}}".
 *
 * @property int $e_main_id
 * @property string $edoc_id ปีที่รับหนังสือ เช่น 2565
 * @property string $e_id ลำดับที่ทั่วไปหนังสือรับ เช่น 05023
 * @property string $edoc_no_get เลขลำดับหนังสือ เช่น อบ0032.012/ว11
 * @property string $edoc_no_sent เลขที่หนังสือส่ง
 * @property string $edoc_no_keep เลขที่เก็บหนังสือ
 * @property string $edoc_date_doc ลงวันที่ตามเอกสาร
 * @property string $edoc_date_get วันที่รับหนังสือ
 * @property string $edoc_from จาก
 * @property string $edoc_to ถึง
 * @property string $edoc_name เรื่อง
 * @property string $dep_id
 * @property string $edoc_type_id รหัสประเภทหนังสือ
 * @property string $edoc_status_id รหัสสถานะการดำเนินการของหนังสือ 
 * @property string $edoc_read_id รหัสสถานะการอ่านของหนังสือ 
 * @property string|null $path ชื่อไฟล์ที่ upload เช่น 6301.pdf
 * @property string $edoc_important_id รหัสความสำคัญของหนังสือ
 * @property string|null $e_id_sent ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023
 * @property string|null $e_id_dud ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023
 * @property string|null $e_id_radio ลำดับที่ทั่วไปหนังสือเวียนวิทยุ เช่น 05023
 * @property string|null $ip_get_sent ip เครื่องที่เปิดอ่าน
 * @property string|null $create_at current_timestamp วันเวลาบันทึก
 * @property string|null $edoc_date_get_2
 * @property string|null $edoc_date_doc_2
 */
class EdocMain extends \yii\db\ActiveRecord
{
    public $edocFile;

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
            [['edoc_name', 'path', 'ip_get_sent'], 'string'],
            [['create_at', 'edoc_date_get_2', 'edoc_date_doc_2'], 'safe'],
            [['edoc_id', 'dep_id'], 'string'],
            [['e_id', 'e_id_sent', 'e_id_dud', 'e_id_radio'], 'string'],
            [['edoc_no_get', 'edoc_no_sent', 'edoc_no_keep', 'edoc_from', 'edoc_to'], 'string'],
            [['edoc_date_doc', 'edoc_date_get'], 'string'],
            [['edoc_type_id', 'edoc_status_id', 'edoc_read_id', 'edoc_important_id'], 'string'],
            [['edocFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'e_main_id' => 'E Main ID',
            'edoc_id' => 'ปีที่รับหนังสือ เช่น 2565',
            'e_id' => 'ลำดับที่ทั่วไปหนังสือรับ เช่น 05023',
            'edoc_no_get' => 'เลขลำดับหนังสือ เช่น อบ0032.012/ว11',
            'edoc_no_sent' => 'เลขที่หนังสือส่ง',
            'edoc_no_keep' => 'เลขที่เก็บหนังสือ',
            'edoc_date_doc' => 'ลงวันที่ตามเอกสาร',
            'edoc_date_get' => 'วันที่รับหนังสือ',
            'edoc_from' => 'จาก',
            'edoc_to' => 'ถึง',
            'edoc_name' => 'เรื่อง',
            'dep_id' => 'Dep ID',
            'edoc_type_id' => 'รหัสประเภทหนังสือ',
            'edoc_status_id' => 'รหัสสถานะการดำเนินการของหนังสือ ',
            'edoc_read_id' => 'รหัสสถานะการอ่านของหนังสือ ',
            'path' => 'ชื่อไฟล์ที่ upload เช่น 6301.pdf',
            'edoc_important_id' => 'รหัสความสำคัญของหนังสือ',
            'e_id_sent' => 'ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023',
            'e_id_dud' => 'ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023',
            'e_id_radio' => 'ลำดับที่ทั่วไปหนังสือเวียนวิทยุ เช่น 05023',
            'ip_get_sent' => 'ip เครื่องที่เปิดอ่าน',
            'create_at' => 'current_timestamp วันเวลาบันทึก',
            'edoc_date_get_2' => 'Edoc Date Get 2',
            'edoc_date_doc_2' => 'Edoc Date Doc 2',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->edocFile->saveAs('uploads/documents/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
