<?php

namespace app\controllers;

class NewsDocumentController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'layout2'; //สั่งให้ rander บน layout2.php ใน /views/layout/layout2.php
        return $this->render('index');
    }

}
