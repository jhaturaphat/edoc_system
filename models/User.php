<?php
namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
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
        $rules['fieldLength']       =   ['dep_id','string','max'=>4];
        return $rules;
    }
}