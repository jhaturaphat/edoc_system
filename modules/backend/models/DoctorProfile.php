<?php

namespace app\modules\backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "doctor_profile".
 *
 * @property int $id
 * @property string|null $email อีเมล์
 * @property string|null $mobile มือถือ
 * @property string|null $sub_special ความเชี่ยวชาญพิเศษ
 * @property int $doctor_id รหัสแพทย์
 * @property string|null $avatar รูปโปไฟล์
 * @property string|null $image รูป โพสเตอร์
 * @property string|null $birth_day วันเกิด
 * @property string|null $imageFile อัพโหลดรูป
 *
 * @property Doctor $doctor
 */
class DoctorProfile extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id'], 'required'],
            [['doctor_id'], 'integer'],
            [['avatar', 'image'], 'string'],
            [['email', 'mobile', 'sub_special'], 'string', 'max' => 45],
            [['birth_day'], 'string', 'max' => 255],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสโปรไฟล์',
            'email' => 'อีเมล์',
            'mobile' => 'มือถือ',
            'sub_special' => 'ความเชี่ยวชาญพิเศษ',
            'doctor_id' => 'รหัสแพทย์',
            'avatar' => 'รูปโปไฟล์',
            'image' => 'รูป โพสเตอร์',
            'birth_day' => 'วันเกิด',
            'imageFile' => 'รูปแพทย์'
        ];
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    public function upload()
    {        
        if(!empty($this->imageFile)) {              
            //path อยู่ที่ web/images/doctors/
            $this->imageFile->saveAs('images/doctors/'. $this->imageFile->baseName . '.'. $this->imageFile->extension);               
            return true;
        }else{
            return false;
        }
    }
}
