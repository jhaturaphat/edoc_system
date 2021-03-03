<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "king_event".
 *
 * @property int $id รหัส
 * @property string $title หัวข้อ
 * @property string $detail รายละเอียด
 * @property string|null $create_at วันที่สร้าง
 * @property string|null $user_post คนโพสต์
 * @property string|null $user_update คนแก้ไขโพสต์
 * @property int|null $view_count จำนวนการเข้าชม
 */
class KingEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'king_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'detail'], 'required'],
            [['title', 'detail'], 'string'],
            [['create_at'], 'safe'],
            [['view_count'], 'integer'],
            [['user_post', 'user_update'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'title' => 'หัวข้อ',
            'detail' => 'รายละเอียด',
            'create_at' => 'วันที่สร้าง',
            'user_post' => 'คนโพสต์',
            'user_update' => 'คนแก้ไขโพสต์',
            'view_count' => 'จำนวนการเข้าชม',
        ];
    }
}
