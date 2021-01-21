<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "branch".
 *
 * @property int $id รหัสสาขา
 * @property string|null $name_th ชื่อสาขาภาษาไทย
 * @property string|null $name_en ชื่อสาขาภาษาอังกฤษ
 *
 * @property DoctorHasBranch[] $doctorHasBranches
 * @property Doctor[] $doctors
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_th', 'name_en'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสสาขา',
            'name_th' => 'ชื่อสาขาภาษาไทย',
            'name_en' => 'ชื่อสาขาภาษาอังกฤษ',
        ];
    }

    static function getTypeaHead(){
        return ArrayHelper::map(self::find()->all(), 'id', 'name_th');
    }

    /**
     * Gets query for [[DoctorHasBranches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorHasBranches()
    {
        return $this->hasMany(DoctorHasBranch::className(), ['branch_id' => 'id']);
    }

    /**
     * Gets query for [[Doctors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['id' => 'doctor_id'])->viaTable('doctor_has_branch', ['branch_id' => 'id']);
    }
}
