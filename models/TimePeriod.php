<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "time_period".
 *
 * @property int $id รหัสเวลา
 * @property string|null $prefix คำย่อ
 * @property string|null $name ชื่อเวลา
 * @property string|null $note หมายเหตุ
 *
 * @property DoctorHasTimePeriod[] $doctorHasTimePeriods
 * @property Doctor[] $doctors
 */
class TimePeriod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'time_period';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note'], 'string'],
            [['prefix', 'name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสเวลา',
            'prefix' => 'คำย่อ',
            'name' => 'ชื่อเวลา',
            'note' => 'หมายเหตุ',
        ];
    }

    static function getcheckBoxList(){
        return ArrayHelper::map(self::find()->orderBy([new \yii\db\Expression("FIELD (prefix, 'morning', 'afternoom')")])->all(), 'id','name');
    }

    /**
     * Gets query for [[DoctorHasTimePeriods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorHasTimePeriods()
    {
        return $this->hasMany(DoctorHasTimePeriod::className(), ['time_period_id' => 'id']);
    }

    /**
     * Gets query for [[Doctors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['id' => 'doctor_id'])->viaTable('doctor_has_time_period', ['time_period_id' => 'id']);
    }
}
