<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "doctor_has_time_period".
 *
 * @property int $doctor_id รหัสแพทย์
 * @property int $time_period_id เวลาทำงานแพทย์
 *
 * @property Doctor $doctor
 * @property TimePeriod $timePeriod
 */
class DoctorHasTimePeriod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_has_time_period';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'time_period_id'], 'required'],
            [['doctor_id', 'time_period_id'], 'integer'],
            [['doctor_id', 'time_period_id'], 'unique', 'targetAttribute' => ['doctor_id', 'time_period_id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['time_period_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimePeriod::className(), 'targetAttribute' => ['time_period_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'รหัสแพทย์',
            'time_period_id' => 'เวลาทำงานแพทย์',
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
     * Gets query for [[TimePeriod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimePeriod()
    {
        return $this->hasOne(TimePeriod::className(), ['id' => 'time_period_id']);
    }
}
