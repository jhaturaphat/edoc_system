<?php
namespace app\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * @var string
     */
    public $dep_id;
    /**
     * @inheritdoc
     */

    // public function scenarios()
    // {
    //     $scenarios = parent::scenarios();
    //     $scenarios['create'][]      =   'dep_id';
    //     $scenarios['update'][]      =   'dep_id';
    //     $scenarios['register'][]    =   'dep_id';
    //     return $scenarios;
    // }
    public function rules()
    {
        $rules = parent::rules();
        $rules['fieldRequired']     =   ['dep_id','required'];
        $rules['fieldLength']       =   ['dep_id','string','max'=>4];
        return $rules;
    }
}