<?php

namespace app\controllers;

use app\models\Doctor;
use app\models\Branch;
use app\models\WorkDate;
use app\models\TimePeriod;
use app\models\DoctorHasWorkDate;

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
    // return ArrayHelper::map(self::find()->orderBy([new \yii\db\Expression("FIELD (id, 'SUN', 'MON', 'THE', 'WED', 'THU', 'FRI', 'SAT')")])->all(), 'id','name');

    public function actionDefaultSearch(){
        $req = \Yii::$app->request->bodyParams;
        $doctor = $req['doctor'];
        $branch = $req['branch'];
        # เงื่อนไขที่ 2 ถ้ามีการเลือกมาก็ให้เพิ่ม JOIN QUERY
        if(!empty($req['work_date']) && isset($req['work_date'])){
            $convert = "'".implode("','",$req['work_date'])."'";
            $join = " LEFT JOIN (
                    SELECT * FROM doctor_has_work_date WHERE work_date_id IN($convert)
                    ) AS dwd ON dwd.doctor_id = dt.id ";
        }else{
            $join = '';
        }

        if(!empty($req['doctor']) && isset($req['doctor'])){
            $join2 = "(dt.fname_th LIKE '%".$doctor."%') OR ";
        }else{
            $join2 ='';
        }
    # Search1 (dt.fname_th LIKE '%".$doctor."%') OR
    $sql = "SELECT * FROM doctor AS dt 
                INNER JOIN doctor_profile AS pf ON dt.id = pf.doctor_id 
                INNER JOIN doctor_has_branch AS dbr ON dt.id = dbr.doctor_id
                INNER JOIN branch AS br ON br.id = dbr.branch_id 
                $join
                WHERE $join2 (br.name_th LIKE '%".$branch."%') 
                GROUP BY dt.id";
    $search1 = Doctor::findBySql($sql)->asArray()->all();
    
    $json = array();
        foreach($search1 as $index => $val){
            $data['work_date'] = DoctorHasWorkDate::findBySql("SELECT wd.name FROM doctor_has_work_date  AS dwd
            INNER JOIN work_date AS wd ON dwd.work_date_id = wd.id
            WHERE dwd.doctor_id = ".$val['id']." ORDER BY FIELD (wd.id, 'SUN', 'MON', 'THE', 'WED', 'THU', 'FRI', 'SAT')"
            )->asArray()->all();          
            $json[] = array_merge($search1[$index], $data);
        }
        return $this->renderPartial('_items',['model'=> $json]);
    }

}
