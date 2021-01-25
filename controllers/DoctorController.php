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

    public function actionDefaultSearch($branch = null , $doctor = '' , $work_date = null , $time_period = null){
        $req = \Yii::$app->request->bodyParams;
        $doctor = $req['doctor'];
    # Search1
        $search1 = Doctor::findBySql("SELECT * FROM doctor AS dt 
        INNER JOIN doctor_profile AS pf ON dt.id = pf.doctor_id 
        INNER JOIN doctor_has_branch AS dbr ON dt.id = dbr.doctor_id
        INNER JOIN branch AS br ON br.id = dbr.branch_id
        WHERE (dt.fname_th LIKE '%".$doctor."%') OR (br.name_th LIKE '%".$branch."%')")->asArray()->all();
    # Search2
      $convert = "'".implode("','",$req['work_date'])."'";
      
       $work_date = WorkDate::findBySql("SELECT dwd.doctor_id FROM work_date AS wd
       INNER JOIN doctor_has_work_date AS dwd ON wd.id = dwd.work_date_id
       WHERE wd.id IN(".$convert.")
       GROUP BY dwd.doctor_id")->asArray()->all();
        
        return $this->renderPartial('_items',['model'=> $search2]);
    }

}
