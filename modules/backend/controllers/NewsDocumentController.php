<?php

namespace app\modules\backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\modules\models\backend\NewsDocument;
use app\modules\models\backend\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsDocumentController implements the CRUD actions for NewsDocument model.
 */
class NewsDocumentController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => [],
                'rules' => [                    
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all NewsDocument models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsDocument model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NewsDocument model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewsDocument();
        $transaction = Yii::$app->db->beginTransaction();
        if ($model->load(Yii::$app->request->post())) {
            $model->File = UploadedFile::getInstance($model, 'File');
            $model->path = $model::Createfolder().$model->File->baseName . '.'. $model->File->extension;
            try{
                if($model->save(FALSE)){  
                    if($model->upload($model::Createfolder())){
                        $transaction->commit(); 
                        return $this->redirect(['view', 'id' => $model->id]);
                    }else{
                        $transaction->rollBack();
                        throw new \yii\web\HttpException(404, 'ไม่สามารถบันทึกไฟล์ได้');
                    }            
                }  
            } catch (\Exception $e) {
                $flag = false;
                $transaction->rollBack();                
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                $flag = false;
                throw $e;
            }          
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NewsDocument model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old = $model->path;
        $transaction = Yii::$app->db->beginTransaction();
    try{
        if ($model->load(Yii::$app->request->post()) ) {  //&& $model->save()
            $model->File = UploadedFile::getInstance($model, 'File');
            $model->path = $model::Createfolder().$model->File->baseName . '.'. $model->File->extension;
            if($model->save()){
                if(Yii::$app->Utility->DeleteFile($old) && $model->upload($model::Createfolder())){
                    $transaction->commit();
                }else{
                    $transaction->rollBack();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }catch(\Exception $e){
        $transaction->rollBack();                
        throw $e;
    }catch(\Throwable $e){
        $transaction->rollBack();                
        throw $e;
    }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NewsDocument model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        
        $transaction = Yii::$app->db->beginTransaction();
        try{
        $oldFile = $this->findModel($id);  //เก็บข้อมูลเดิมไว้ก่อน
            if($this->findModel($id)->delete()){
                if(Yii::$app->Utility->DeleteFile($oldFile->path)){ //ตรวจสอบว่าไฟล์มีอยู่จริง
                    $transaction->commit(); 
                }else{                    
                    $transaction->rollBack();
                }                
            }
        } catch (\Exception $e) {
            $flag = false;
            $transaction->rollBack();                
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            $flag = false;
            throw $e;
        } 
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the NewsDocument model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsDocument the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsDocument::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
