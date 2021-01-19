<?php

namespace app\controllers;

class DoctorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'layout';
        return $this->render('index');
    }

}
