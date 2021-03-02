<?php

namespace app\modules\backend\models;

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

    public $File = null;
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
            [['path', 'title', 'detail', 'news_type_id','public'], 'required'],
            [['detail', 'public'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['news_type_id'], 'integer'],
            [['path', 'title'], 'string', 'max' => 255],
            [['news_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsType::className(), 'targetAttribute' => ['news_type_id' => 'id']],
            [['File'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
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
            'news_type_id' => 'ประเภท',
            'public' => 'การเผยแพร่',
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

    public function upload($path = null)
    {        
        //echo $path; exit;
        if(!empty($this->File) && is_dir($path)) {
            //. $this->File->baseName . '.'. $this->File->extension              
                $this->File->saveAs($path. $this->File->baseName . '.'. $this->File->extension); 
                return true;
        }else{
            return false;
        }
    }

    static function Createfolder($path = 'documents/news-document'){
        
        if(!is_dir($path)) mkdir($path, '0777');  //ถ้ายังไม่ได้สร้างโฟล์เดอร์ ก็สร้าง Folder news-document
        $year = date("Y")+543;
        //ถ้ายังไม่ได้สร้างโฟล์เดอร์ ก็สร้าง Folder ปีขึ้นมา
        if(!is_dir($path.'/'.$year)){ 
            mkdir($path.'/'.$year, '0777');
            echo "Create Folder";
            return $path.'/'.$year.'/';
        }else{
            return $path.'/'.$year.'/';
        }
    }
}
