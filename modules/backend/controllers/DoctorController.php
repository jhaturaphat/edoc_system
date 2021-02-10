<?php

namespace app\modules\backend\controllers;

use Yii;
use yii\web\UploadedFile;
use yii\db\Transaction;
use yii\base\Exception;
use app\modules\models\Doctor;
use app\modules\models\DoctorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\models\DoctorProfile;
use app\modules\models\DoctorHasBranch;
use app\modules\models\DoctorHasTimePeriod;
use app\modules\models\DoctorHasWorkDate;
use yii\web\Request;
/**
 * DoctorController implements the CRUD actions for Doctor model.
 */
class DoctorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Doctor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //print_r( $this->findModel($id)); exit;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();
        $docProfile = new DoctorProfile();
        $docHasBranch = new DoctorHasBranch();
        $docHasTimePeri = new DoctorHasTimePeriod();
        $docHasWorkDate = new DoctorHasWorkDate();

        

        if ($model->load(Yii::$app->request->post()) 
        && $docProfile->load(Yii::$app->request->post())
        && $docHasBranch->load(Yii::$app->request->post())
        && $docHasTimePeri->load(Yii::$app->request->post())
        && $docHasWorkDate->load(Yii::$app->request->post())) { 

            //echo "<pre>";
            //print_r(Yii::$app->request->bodyParams);     
            //var_dump($docHasWorkDate);       
            //echo "</pre>";
            //exit();

            $docProfile->imageFile = UploadedFile::getInstance($docProfile, 'imageFile');  
            //เริ่มต้น Transaction mysql
            $flag = true;
            $transaction = Yii::$app->db->beginTransaction();
            try{
                $model->save();
                $docProfile->doctor_id = $model->id;
                $docProfile->image = 'images/doctors/'. $docProfile->imageFile->baseName . '.'. $docProfile->imageFile->extension;
                $docProfile->save();
                $docHasBranch->doctor_id = $model->id; 
                $docHasBranch->save();
                //สร้างรูปแบบเตรียมข้อมูล insert ลงตาราง doctor_has_time_period
                $batchQuery1 = array();
                foreach($docHasTimePeri->time_period_id as $key => $val){
                    if(!empty($val)) $batchQuery1[] = [$model->id, $val];                                        
                }   
                Yii::$app->db->createCommand()->batchInsert(
                    'doctor_has_time_period',['doctor_id', 'time_period_id'], $batchQuery1
                )->execute();

                //สร้างรูปแบบเตรียมข้อมูล insert ลงตาราง doctor_has_work_date
                $batchQuery2 = array();
                foreach($docHasWorkDate->work_date_id as $val){
                    if(!empty($val)) $batchQuery2[] = [$model->id, $val];
                }
                Yii::$app->db->createCommand()->batchInsert(
                    'doctor_has_work_date',['doctor_id', 'work_date_id'], $batchQuery2
                )->execute();

                $transaction->commit(); 
                //$transaction->rollBack();          

            } catch (\Exception $e) {
                $flag = false;
                $transaction->rollBack();                
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                $flag = false;
                throw $e;
            }

            if($flag){
                if($docProfile->upload()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }  
        }

        return $this->render('create', [
            'model' => $model,
            'docProfile' => $docProfile,
            'docHasBranch' => $docHasBranch,
            'docHasTimePeri' => $docHasTimePeri,
            'docHasWorkDate' => $docHasWorkDate
        ]);
       
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $docProfile = $this->findDoctorProfile($id);
        $docHasBranch = $this->findDoctorHasBranch($id);
        $docHasTimePeri = $this->findDoctorHasTimePeriod($id);
        $docHasWorkDate = $this->findDoctorHasWorkDate($id); 

        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // echo '<br><pre>';
        // print_r($docHasWorkDate);
        // echo '</pre>';
        return $this->render('update', [
            'model' => $model,
            'docProfile' => $docProfile,
            'docHasBranch' => $docHasBranch,
            'docHasTimePeri' => $docHasTimePeri,
            'docHasWorkDate' => $docHasWorkDate
        ]);
        
    }

    /**
     * Deletes an existing Doctor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {        
        $oldImage = $this->findDoctorProfile($id);        
        $transaction = Yii::$app->db->beginTransaction();
        try{
            if($this->findModel($id)->delete()){
                if(@unlink($oldImage->image)){
                    $transaction->commit(); 
                }else{
                    $transaction->rollBack();
                }
            }
        } catch (\Exception $e) {            
            $transaction->rollBack();            
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();            
            throw $e;
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoctorProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDoctorProfile($id)
    {
        if (($model = DoctorProfile::find()->where(['doctor_id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoctorHasBranch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDoctorHasBranch($id)
    {
        if (($model = DoctorHasBranch::find()->where(['doctor_id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoctorHasTimePeriod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDoctorHasTimePeriod($id)
    {
        if (($model = DoctorHasTimePeriod::find()->where(['doctor_id' => $id])->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoctorHasWorkDate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDoctorHasWorkDate($id)
    {
        if (($model = DoctorHasWorkDate::find()->where(['doctor_id' => $id])->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
