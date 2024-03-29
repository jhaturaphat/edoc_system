<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edoc Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edoc Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php yii\widgets\Pjax::begin(['id' => 'pjax_edoc_type_id']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'edoc_type_id',
            'edoc_type_name:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
