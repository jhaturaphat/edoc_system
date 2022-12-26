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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDownload($id){

        $model = EdocMain::findOne($id);   
        // print_r($model->edoc_name);     exit;   
        // $path = Yii::getAlias('@webroot').'/uploads/'.$model->path;           
        $path = Yii::getAlias('@webroot').'/uploads/13ec700d026aa9c4554389220e996fd2.pdf';           
        
        if(file_exists($path)){                
            return Yii::$app->response->sendFile($path, $model->edoc_name);                
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
