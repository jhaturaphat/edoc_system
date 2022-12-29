<?php

namespace app\models;

use Yii;
use app\models\EdocMain;
use app\models\EdocStatus;
use app\models\EdocRead;
use app\models\EdocDep;
use app\models\EdocType;

/**
 * This is the model class for table "{{%edoc_sent}}".
 *
 * @property int $id รหัสหนังสือ
 * @property string $edoc_id ปีที่รับหนังสือ เช่น 2565
 * @property string $e_id ลำดับที่ทั่วไปหนังสือรับ เช่น 05023
 * @property string $edoc_read_id รหัสการอ่าน เช่น อ่านแล้ว ยังไม่ได้อ่าน
 * @property string $r_date วันที่รับหนังสือ
 * @property string $dep_id รหัสหน่วยงาน
 * @property string $edoc_type_id รหัสประเภทหนังสือ
 * @property string $e_id_sent ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023
 * @property string $e_id_dud ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023
 * @property string $user_get user ที่เปิดอ่าน
 * @property string $date_get วันทีเปิดอ่าน
 * @property string $ip_get ip เครื่องที่เปิดอ่าน
 * @property string $e_id_radio เลขที่หนังสือเวียนวิทยุ
 * @property int $e_main_id
 */
class EdocView extends \yii\db\ActiveRecord
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
            [['user_get', 'ip_get', 'e_main_id'], 'required'],
            [['user_get', 'ip_get'], 'string'],
            [['e_main_id'], 'integer'],
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
            'edoc_id' => 'ปีที่รับหนังสือ เช่น 2565',
            'e_id' => 'ลำดับที่ทั่วไปหนังสือรับ เช่น 05023',
            'edoc_read_id' => 'รหัสการอ่าน เช่น อ่านแล้ว ยังไม่ได้อ่าน',
            'r_date' => 'วันที่รับหนังสือ',
            'dep_id' => 'รหัสหน่วยงาน',
            'edoc_type_id' => 'รหัสประเภทหนังสือ',
            'e_id_sent' => 'ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023',
            'e_id_dud' => 'ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023',
            'user_get' => 'user ที่เปิดอ่าน',
            'date_get' => 'วันทีเปิดอ่าน',
            'ip_get' => 'ip เครื่องที่เปิดอ่าน',
            'e_id_radio' => 'เลขที่หนังสือเวียนวิทยุ',
            'e_main_id' => 'E Main ID'            
        ];
    }

    public function getEdocMain(){
        return $this->hasOne(EdocMain::className(), ['e_main_id' => 'e_main_id']);
    }    
    public function getEdocRead(){
        return $this->hasOne(EdocRead::className(), ['edoc_read_id' => 'edoc_read_id']);
    }
    public function getEdocDep(){
        return $this->hasOne(EdocDep::className(), ['dep_id' => 'dep_id']);
    }
    public function getEdocType(){
        return $this->hasOne(EdocType::className(), ['edoc_type_id' => 'edoc_type_id'])
        ->viaTable('edoc_main AS e_doc_main',['e_main_id' => 'e_main_id']);
    }    
}
