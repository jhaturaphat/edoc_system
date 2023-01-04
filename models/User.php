<?php
namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    const ROLE_ADMIN    =10;
    const ROLE_STAFF    =20;
    const ROLE_USER     =30;

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'][]      =   'dep_id';
        $scenarios['update'][]      =   'dep_id';
        $scenarios['register'][]    =   'dep_id';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        $rules['fieldRequired']     =   ['dep_id','required'];        
        return $rules;
    }

    public static function IsAdmin(){
        if(!\Yii::$app->user->isGuest){
            if(\Yii::$app->user->identity->role == User::ROLE_ADMIN){
                return true;
            }
            return false;
        }else{
            return false;
        }
        
    }
    

}