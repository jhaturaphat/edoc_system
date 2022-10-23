<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocDepSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edoc Deps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-dep-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edoc Dep', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php yii\widgets\Pjax::begin(['id' => 'pjax_edoc_dep_id']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dep_id',
            'dep_name:ntext',
            'dep_user',
            'dep_pass',
            'sent_txt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php yii\widgets\Pjax::end() ?>


</div>
