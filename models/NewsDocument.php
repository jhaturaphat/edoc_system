<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_document".
 *
 * @property int $id รหัส
 * @property string $path ไฟล์อัพโหลด
 * @property string $title หัวข้อ
 * @property string $detail รายละเอียด
 * @property string|null $create_at
 * @property string|null $update_at
 * @property int $news_type_id
 * @property string $public
 *
 * @property NewsType $newsType
 */
class NewsDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'title', 'detail', 'news_type_id'], 'required'],
            [['detail', 'public'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['news_type_id'], 'integer'],
            [['path', 'title'], 'string', 'max' => 255],
            [['news_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsType::className(), 'targetAttribute' => ['news_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'path' => 'ไฟล์อัพโหลด',
            'title' => 'หัวข้อ',
            'detail' => 'รายละเอียด',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'news_type_id' => 'News Type ID',
            'public' => 'Public',
        ];
    }

    /**
     * Gets query for [[NewsType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsType()
    {
        return $this->hasOne(NewsType::className(), ['id' => 'news_type_id']);
    }
}
