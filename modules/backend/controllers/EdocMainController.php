<?php

namespace app\modules\backend\controllers;

use Yii;
use app\models\EdocMain;
use app\models\EdocMainSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        ]);
    }

    /**
     * Displays a single EdocMain model.
     * @param string $edoc_id
     * @param string $e_id
     * @param string $e_id_sent
     * @param string $e_id_dud
     * @param string $e_id_radio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($edoc_id, $e_id, $e_id_sent, $e_id_dud, $e_id_radio)
    {
        return $this->render('view', [
            'model' => $this->findModel($edoc_id, $e_id, $e_id_sent, $e_id_dud, $e_id_radio),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'edoc_id' => $model->edoc_id, 'e_id' => $model->e_id, 'e_id_sent' => $model->e_id_sent, 'e_id_dud' => $model->e_id_dud, 'e_id_radio' => $model->e_id_radio]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EdocMain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $edoc_id
     * @param string $e_id
     * @param string $e_id_sent
     * @param string $e_id_dud
     * @param string $e_id_radio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($edoc_id, $e_id, $e_id_sent, $e_id_dud, $e_id_radio)
    {
        $model = $this->findModel($edoc_id, $e_id, $e_id_sent, $e_id_dud, $e_id_radio);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'edoc_id' => $model->edoc_id, 'e_id' => $model->e_id, 'e_id_sent' => $model->e_id_sent, 'e_id_dud' => $model->e_id_dud, 'e_id_radio' => $model->e_id_radio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EdocMain model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $edoc_id
     * @param string $e_id
     * @param string $e_id_sent
     * @param string $e_id_dud
     * @param string $e_id_radio
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($edoc_id, $e_id, $e_id_sent, $e_id_dud, $e_id_radio)
    {
        $this->findModel($edoc_id, $e_id, $e_id_sent, $e_id_dud, $e_id_radio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EdocMain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $edoc_id
     * @param string $e_id
     * @param string $e_id_sent
     * @param string $e_id_dud
     * @param string $e_id_radio
     * @return EdocMain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($edoc_id, $e_id, $e_id_sent, $e_id_dud, $e_id_radio)
    {
        if (($model = EdocMain::findOne(['edoc_id' => $edoc_id, 'e_id' => $e_id, 'e_id_sent' => $e_id_sent, 'e_id_dud' => $e_id_dud, 'e_id_radio' => $e_id_radio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
