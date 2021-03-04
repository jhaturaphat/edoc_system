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
            [['img_event'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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

    public function upload($path = null)
    {        
        //echo $path; exit;
        if(!empty($this->img_event) && is_dir($path)) {
            //. $this->File->baseName . '.'. $this->File->extension              
                $this->img_event->saveAs($path. $this->img_event->baseName . '.'. $this->img_event->extension); 
                return true;
        }else{
            return false;
        }
    }

    static function CreateFolderKingEvent($id){
        $path = 'images/king-event';
        if(!is_dir($path)) mkdir($path, '0777');  //ถ้ายังไม่ได้สร้างโฟล์เดอร์ ก็สร้าง king-event
        $thumbnail = "img-".$id."-".date("dmY_His");
        //ถ้ายังไม่ได้สร้างโฟล์เดอร์ ก็สร้าง Folder ปีขึ้นมา
        if(!is_dir($path.'/'.$thumbnail)){ 
            mkdir($path.'/'.$thumbnail, '0777');            
            return $path.'/'.$thumbnail.'/';
        }else{
            return $path.'/'.$thumbnail.'/';
        }
    }
}
