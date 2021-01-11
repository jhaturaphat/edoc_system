<?php

namespace app\controllers;

class DoctorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'index';
        return $this->render('index');
    }

}
