<?php

namespace app\controllers;

class AppointmentCardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'layout2'; //สั่งให้ rander บน layout2.php ใน /views/layout/layout2.php
        Yii::$app->db2->createCommand('SELECT * FROM post')->queryAll();
        return $this->render('index');
    }

}
