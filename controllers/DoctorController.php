<?php

namespace app\controllers;

use app\models\Doctor;
use app\models\Branch;
use app\models\WorkDate;
use app\models\TimePeriod;

class DoctorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'layout';
        $model = new Doctor();
        $branch = new Branch();
        $workDate = new WorkDate();
        $timePeriod = new TimePeriod();
        return $this->render('index',[
            'model'=> $model,
            'branch' => $branch,
            'workDate' => $workDate,
            'timePeriod' => $timePeriod
        ]);
    }

    public function actionDefaultSearch($id = 5){
        $model = Doctor::findBySql("SELECT * FROM doctor AS dt  INNER JOIN doctor_profile AS pf ON dt.id = pf.doctor_id WHERE dt.id = ".$id)->asArray()->all();
    echo '<pre>';
    print_r($model);
    echo '</pre>';
    exit;
        return $this->renderPartial('_items', ['items'=> $ca]);
    }

}
