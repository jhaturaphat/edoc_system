<?php

namespace app\modules\models;

use Yii;

/**
 * This is the model class for table "news_document".
 *
 * @property int $id รหัส
 * @property string|null $path ไฟล์อัพโหลด
 * @property string $title หัวข้อ
 * @property string|null $detail รายละเอียด
 * @property string|null $create_at
 * @property string|null $update_at
 * @property int $news_type_id
 * @property string|null $public
 *
 * @property NewsType $newsType
 */
class NewsDocument extends \yii\db\ActiveRecord
{
    public $file = null;
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
            [['title', 'news_type_id'], 'required'],
            [['create_at', 'update_at'], 'safe'],
            [['news_type_id'], 'integer'],
            [['public'], 'string'],
            [['path', 'title', 'detail'], 'string', 'max' => 45],
            [['news_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsType::className(), 'targetAttribute' => ['news_type_id' => 'id']],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, doc, docx, xls, xlsx, ptt, pttx'],
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
            'news_type_id' => 'ประเภทประชาสัมพันธ์',
            'public' => 'เผยแพร่',
            
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


    public function upload()
    {        
        if(!empty($this->imageFile)) {              
            //path อยู่ที่ web/images/doctors/
            $this->imageFile->saveAs('images/news-document/'. $this->imageFile->baseName . '.'. $this->imageFile->extension);               
            return true;
        }else{
            return false;
        }
    }
}
