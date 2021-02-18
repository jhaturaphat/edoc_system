<?php

namespace app\controllers;
use Yii;

class AppointmentCardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'layout2'; //สั่งให้ rander บน layout2.php ใน /views/layout/layout2.php
        Yii::$app->hosxp->createCommand('SELECT * FROM onlineuser')->queryAll();
        return $this->render('index');
    }

}
