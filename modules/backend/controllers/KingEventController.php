<?php

namespace app\modules\backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\db\Transaction;
use yii\base\Exception;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\KingEvent;
use app\models\KingEventSearch;
use yii\web\Controller;

/**
 * KingEventController implements the CRUD actions for KingEvent model.
 */
class KingEventController extends Controller
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
     * Lists all KingEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KingEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KingEvent model.
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
     * Creates a new KingEvent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KingEvent();

        if ($model->load(Yii::$app->request->post())){
            $model->img_event = UploadedFile::getInstances($model, 'img_event'); 
            $model->folder_img = $model::CreateFolderKingEvent();
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if($model->save(FALSE)){
                    if($model->upload($model->folder_img)){
                        $transaction->commit(); 
                        return $this->redirect(['view', 'id' => $model->id]);
                    }else{
                        $transaction->rollBack();
                        throw new \yii\web\HttpException(404, 'ไม่สามารถบันทึกไฟล์ได้');
                    } 
                    $transaction->commit();                
                }
            }catch (\Exception $e) {
                $flag = false;
                $transaction->rollBack();                
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                $flag = false;
                throw $e;
            }
        }

       
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing KingEvent model.
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
     * Deletes an existing KingEvent model.
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
     * Finds the KingEvent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KingEvent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KingEvent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
