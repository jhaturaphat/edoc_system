<?php

namespace app\modules\backend\controllers;

use Yii;
use app\models\EdocDep;
use app\models\EdocMain;
use app\models\EdocMainSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * EdocMainController implements the CRUD actions for EdocMain model.
 */
class EdocMainController extends Controller
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
     * Lists all EdocMain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EdocMainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'param' => Yii::$app->request->queryParams
        ]);
    }

    /**
     * Displays a single EdocMain model.
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
     * Creates a new EdocMain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EdocMain();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {            
            $model->path = $model->upload($model,'path');
            $model->edoc_id = (date("Y") + 543);
            $model->save();               
            return $this->redirect(['view', 'id' => $model->e_main_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionGetEdocType(){
        if(Yii::$app->request->isAjax){
            $data = Yii::$app->request->post();
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return  EdocMain::find()->where(['edoc_type_id'=>$data['e_id'], 'edoc_id'=>(date("Y") + 543)])->max('e_id');
           
        }
    }

    /**
     * Updates an existing EdocMain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $old_path = $model->path;
            $Upfile = UploadedFile::getInstance($model, 'path');
            if(!empty($Upfile)){ 
                if($model->removeFile($old_path)){
                    $model->path = $model->upload($model,'path');
                    $model->save();
                }            
            }else{
                $model->save();
            }
            
            return $this->redirect(['view', 'id' => $model->e_main_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionSend($id = null){  
            $dep = EdocDep::find()->asArray()->all();
            $model = EdocMain::find()->where(['e_main_id'=>$id])->asArray()->one(); 
            return $this->renderAjax('send',[
                'xmodel'=>$model,
                'dep'=> $dep
            ]);
    }

    /**
     * Deletes an existing EdocMain model.
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

    /**
     * Finds the EdocMain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EdocMain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EdocMain::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
