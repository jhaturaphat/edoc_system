<?php

namespace app\modules\models;

use Yii;

/**
 * This is the model class for table "doctor_has_work_date".
 *
 * @property int $doctor_id รหัสแพทย์
 * @property string $work_date_id รหัสวันทำงาน
 *
 * @property Doctor $doctor
 * @property WorkDate $workDate
 */
class DoctorHasWorkDate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_has_work_date';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'work_date_id'], 'required'],
            [['doctor_id'], 'integer'],
            //[['work_date_id'], 'string', 'max' => 3],
            [['doctor_id', 'work_date_id'], 'unique', 'targetAttribute' => ['doctor_id', 'work_date_id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['work_date_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkDate::className(), 'targetAttribute' => ['work_date_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'รหัสแพทย์',
            'work_date_id' => 'วันที่ออกตรวจ',
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

    /**
     * Gets query for [[WorkDate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkDate()
    {
        return $this->hasOne(WorkDate::className(), ['id' => 'work_date_id']);
    }
}
