<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocSentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edoc Sents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-sent-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edoc Sent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'edoc_id',
            'e_id',
            'edoc_read_id',
            'r_date',
            //'edoc_type_id',
            //'e_id_sent',
            //'e_id_dud',
            //'user_get:ntext',
            //'date_get',
            //'ip_get:ntext',
            //'e_id_radio',
            //'dep_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
