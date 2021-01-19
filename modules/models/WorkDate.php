<?php

namespace app\modules\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "work_date".
 *
 * @property string $id รหัสวัน
 * @property string|null $prefix คำย่อ
 * @property string|null $name ชื่อวัน
 * @property string|null $note หมายเหตุ
 *
 * @property DoctorHasWorkDate[] $doctorHasWorkDates
 * @property Doctor[] $doctors
 */
class WorkDate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_date';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['note'], 'string'],
            [['id'], 'string', 'max' => 3],
            [['prefix', 'name'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสวัน',
            'prefix' => 'คำย่อ',
            'name' => 'ชื่อวัน',
            'note' => 'หมายเหตุ',
        ];
    }

    static function getcheckBoxList(){
        return ArrayHelper::map(self::find()->orderBy([new \yii\db\Expression("FIELD (id, 'SUN', 'MON', 'THE', 'WED', 'THU', 'FRI', 'SAT')")])->all(), 'id','name');
    }

    /**
     * Gets query for [[DoctorHasWorkDates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorHasWorkDates()
    {
        return $this->hasMany(DoctorHasWorkDate::className(), ['work_date_id' => 'id']);
    }

    /**
     * Gets query for [[Doctors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['id' => 'doctor_id'])->viaTable('doctor_has_work_date', ['work_date_id' => 'id']);
    }
}
