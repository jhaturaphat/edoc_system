<?php

namespace app\modules\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id รหัสแพทย์
 * @property string|null $prefix คำนำหน้า
 * @property string|null $fname_th ชื่ออภาษาไทย
 * @property string|null $lname_th นามสกุลภาษาไทย
 * @property string|null $fname_en ชื่อภาษาอังกฤษ
 * @property string|null $lname_en นามสกุลภาษาอังกฤษ
 * @property string|null $detail รายละเอียด
 *
 * @property DoctorHasBranch[] $doctorHasBranches
 * @property Branch[] $branches
 * @property DoctorHasTimePeriod[] $doctorHasTimePeriods
 * @property TimePeriod[] $timePeriods
 * @property DoctorHasWorkDate[] $doctorHasWorkDates
 * @property WorkDate[] $workDates
 * @property DoctorProfile[] $doctorProfiles
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['prefix', 'fname_th', 'lname_th', 'fname_en', 'lname_en'], 'required'],
            [['prefix', 'fname_th', 'lname_th', 'fname_en', 'lname_en'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสแพทย์',
            'prefix' => 'คำนำหน้า',
            'fname_th' => 'ชื่อ(ภาษาไทย)',
            'lname_th' => 'นามสกุล(ภาษาไทย)',
            'fname_en' => 'ชื่อ(ภาษาอังกฤษ)',
            'lname_en' => 'นามสกุล(ภาษาอังกฤษ)',
            'detail' => 'รายละเอียด',
        ];
    }

    /**
     * Gets query for [[DoctorHasBranches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorHasBranches()
    {
        return $this->hasMany(DoctorHasBranch::className(), ['doctor_id' => 'id']);
    }

    /**
     * Gets query for [[Branches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::className(), ['id' => 'branch_id'])->viaTable('doctor_has_branch', ['doctor_id' => 'id']);
    }

    /**
     * Gets query for [[DoctorHasTimePeriods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorHasTimePeriods()
    {
        return $this->hasMany(DoctorHasTimePeriod::className(), ['doctor_id' => 'id']);
    }

    /**
     * Gets query for [[TimePeriods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimePeriods()
    {
        return $this->hasMany(TimePeriod::className(), ['id' => 'time_period_id'])->viaTable('doctor_has_time_period', ['doctor_id' => 'id']);
    }

    /**
     * Gets query for [[DoctorHasWorkDates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorHasWorkDates()
    {
        return $this->hasMany(DoctorHasWorkDate::className(), ['doctor_id' => 'id']);
    }

    /**
     * Gets query for [[WorkDates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkDates()
    {
        return $this->hasMany(WorkDate::className(), ['id' => 'work_date_id'])->viaTable('doctor_has_work_date', ['doctor_id' => 'id']);
    }

    /**
     * Gets query for [[DoctorProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorProfiles()
    {
        return $this->hasMany(DoctorProfile::className(), ['doctor_id' => 'id']);
    }
}
