<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edoc Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edoc Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php yii\widgets\Pjax::begin(['id' => 'pjax_edoc_status_id']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'edoc_status_id',
            'edoc_status_name:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
