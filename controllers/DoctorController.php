<?php

namespace app\controllers;

use app\models\Doctor;
use app\models\Branch;

class DoctorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'layout';
        $model = new Doctor();
        $branch = new Branch();
        return $this->render('index',[
            'model'=> $model,
            'branch' => $branch 
        ]);
    }

}
