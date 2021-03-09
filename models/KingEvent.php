<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

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
    public $img_event;
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
            [['img_event'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 15],
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
            'img_event' => 'อัพโหลดรูปภาพ',
        ];
    }

    public function uploads($path = null)
    { 
        if(!empty($this->img_event) && is_dir($path)) {
                foreach($this->img_event as $file){
                    if(!$file->saveAs($path. $file->baseName . '.'. $file->extension)){
                        if($this->isNewRecord)
                        array_map( 'unlink', array_filter((array) glob($path."/*") ) ); //ลบข้อมูลภาพในโฟล์เดอร์นี้ทั้งหมดถ้ามี Error                        
                        return false;
                    }
                }
                return true;
        }else{
            return false;
        }
    }

    public static function DelFolder($path = null){ //Delete folder
        if(is_dir($path)){ 
            KingEvent::DelimgInFAll($path);  //การเรียกใช้ method หรือ function ภายใน Class ตัวเอง
            if(rmdir($path)){
                return true;
            }else{
                return false;
            }                
        }else{
            return false;
        }
    }

    public static function DelimgInFAll($path = null){ //delete images in folder
        if(is_dir($path)){
            array_map('unlink', array_filter((array) glob($path."/*") ) ); //ลบข้อมูลภาพในโฟล์เดอร์นี้ทั้งหมดถ้ามี
            return true;
        }else{
            return false;
        }
    }

    public static function CreateFolderKingEvent(){ 
        $path = 'images/king-event';
        if(!is_dir($path)) mkdir($path, '0777');  //ถ้ายังไม่ได้สร้างโฟล์เดอร์ ก็สร้าง king-event
        $thumbnail = "img-".date("dmY_His");
        //ถ้ายังไม่ได้สร้างโฟล์เดอร์ ก็สร้าง Folder ปีขึ้นมา
        if(!is_dir($path.'/'.$thumbnail)){ 
            mkdir($path.'/'.$thumbnail, '0777');            
            return $path.'/'.$thumbnail.'/';
        }else{
            return $path.'/'.$thumbnail.'/';
        }
    }

    public static function getThumnail($model){
        $imgFiles = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@web').str_replace("/" , "\\" ,$model->folder_img) ,['only'=>['*.*']]);
        $arr = [];
        foreach($imgFiles as $files)
        {
            $explodeImg = explode('\\', $files);
            $imgName = end($explodeImg);
            $arr[] = Yii::getAlias('@web').$model->folder_img.$imgName;
        }
        return $arr;
    }
    public static function getPreviews($model){
        $imgFiles = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@web').str_replace("/" , "\\" ,$model->folder_img) ,['only'=>['*.*']]);
        $arr = [];        
        foreach($imgFiles as $files)
        {
            $explodeImg = explode('\\', $files);
            $imgName = end($explodeImg);
            $initPre['caption'] = $imgName;
            $initPre['url'] = 'index.php?r=/backend/king-event/delete-item'; //Delete Url
            $initPre['key'] = Yii::getAlias('@web').$model->folder_img.$imgName; 
            $initPre['downloadUrl'] = Yii::getAlias('@web').$model->folder_img.$imgName;            
            $initPre['size'] = getimagesize($model->folder_img.$imgName)[0];
            $arr[] = $initPre;
        }
        return $arr;
    }
}
