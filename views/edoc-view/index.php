<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edoc Views';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-view-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edoc View', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <?= print_r($param) ?>
 
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'edoc_id',
            'e_id',
            'edoc_read_id',
            'r_date',
            'dep_id',
            //'edoc_type_id',
            //'e_id_sent',
            //'e_id_dud',
            //'user_get:ntext',
            //'date_get',
            //'ip_get:ntext',
            //'e_id_radio',
            //'e_main_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
