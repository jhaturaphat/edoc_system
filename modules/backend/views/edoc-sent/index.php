<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocSentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สถานะการอ่าน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-sent-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //echo Html::a('เวียนเอกสาร', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'edoc_id',
            // 'e_id',
            //'edocMain.edoc_name',
            'edocRead.edoc_read_name',
            [
                'label'=> 'สถานะการอ่าน',
                'format' => 'ntext',
                'filter' => yii\helpers\ArrayHelper::map(app\models\EdocRead::find()->all(), 'edoc_read_id', 'edoc_read_name'),
                'attribute'=>'edoc_read_id',                
                'value'=> 'edocRead.edoc_read_name'
            ],
            'r_date',
            //'edoc_type_id',
            //'e_id_sent',
            //'e_id_dud',
            //'user_get:ntext',
            //'date_get',
            //'ip_get:ntext',
            //'e_id_radio',
            //'dep_id',
            [
                'label'=> 'หน่วยงาน',
                'format' => 'ntext',
                'filter' => yii\helpers\ArrayHelper::map(app\models\EdocDep::find()->all(), 'dep_id', 'dep_name'),
                'attribute'=>'dep_id',                
                'value'=> 'edocDep.dep_name'
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}',
        ],
        ],
    ]); ?>


</div>
