<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "doctor_has_branch".
 *
 * @property int $doctor_id รหัสแพทย์
 * @property int $branch_id รหัสสาขาแพทย์
 *
 * @property Branch $branch
 * @property Doctor $doctor
 */
class DoctorHasBranch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_has_branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'branch_id'], 'required'],
            [['doctor_id', 'branch_id'], 'integer'],
            [['doctor_id', 'branch_id'], 'unique', 'targetAttribute' => ['doctor_id', 'branch_id']],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'รหัสแพทย์',
            'branch_id' => 'รหัสสาขาแพทย์',
        ];
    }

    

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
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
}
