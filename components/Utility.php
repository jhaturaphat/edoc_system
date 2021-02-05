<?php
namespace app\components;


use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Utility extends Component
{
    public function DeleteFile($path){
        if(file_exists($path)){
            if(unlink($path)){ //สั่งลบไฟล์ได้เลย
                return true;
            }else{
                return false;
            }
        }
        return true;
    }
}