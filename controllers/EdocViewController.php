<?php

namespace app\controllers;

use Yii;
use app\models\EdocView;
use app\models\EdocViewSearch;
use app\models\EdocMain;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EdocViewController implements the CRUD actions for EdocView model.
 */
class EdocViewController extends Controller
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
            'access' =>[
              'class' => AccessControl::className(),
              'only' => ['index', 'view', 'create', 'update', 'delete'],
              'rules' => [
                [
                  'actions' => ['create', 'update','delete','view','index'],
                  'allow' => true,
                  'roles' => ['@']
                ],
                [
                  'actions' => ['index'],
                  'allow' => true,
                  'roles' => ['@']
                ]
              ]
            ]
        ];
    }

    /**
     * Lists all EdocView models.
     * @return mixed
     */
    public function actionIndex()
    {        
        $searchModel = new EdocViewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Yii::$app->user->identity->dep_id);
        $dataProvider->sort = ['defaultOrder' => ['id'=>SORT_DESC]];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'param'=>Yii::$app->request->queryParams            
        ]);
    }

    /**
     * Displays a single EdocView model.
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
     * Creates a new EdocView model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        exit;
        $model = new EdocView();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EdocView model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        exit;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EdocView model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        exit;
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDownload($id, $edoc_sent_id){

        $EdocMain = EdocMain::findOne($id);   
        // print_r($model);     exit;   
        $path = Yii::getAlias('@webroot').'/uploads/'.$model->path;           
        // $path = Yii::getAlias('@webroot').'/uploads/2566-78bc92ce8bfa4d72fe8fceb9f6078f6f.pdf'; 

        @$fileName = (!empty($EdocMain->edoc_name)? $EdocMain->edoc_name : 'หนังสือเวียนรหัส-'.$EdocMain->e_main_id); 
        if(file_exists($path)){ 
           $old_id = $this->findModel($edoc_sent_id);    
             \Yii::$app->db->createCommand("UPDATE edoc_sent SET edoc_read_id=:edoc_read_id, r_date=:r_date, user_get=:user_get WHERE id=:id")
            ->bindValue(':id', $edoc_sent_id)
            ->bindValue(':edoc_read_id', 're01')
            ->bindValue(':r_date', Date('Y-m-d h:i:s'))
            ->bindValue(':user_get', \Yii::$app->user->identity->username.','.$old_id->user_get)
            ->execute();
            return Yii::$app->response->sendFile($path,$fileName.'.pdf',['inline' => true, 'mimeType' => 'application/pdf']);                
        }else{
            return $this->redirect(['index']);
        } 
    }

    /**
     * Finds the EdocView model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EdocView the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EdocView::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
