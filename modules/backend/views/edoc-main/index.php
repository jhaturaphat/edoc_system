<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocMainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edoc Mains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-main-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edoc Main', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php yii\widgets\Pjax::begin(['id' => 'pjax_edoc_main_id']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'edoc_id',
            'e_id',
            'edoc_no_get',
            'edoc_no_sent',
            'edoc_no_keep',
            //'edoc_date_doc',
            //'edoc_date_get',
            //'edoc_from',
            //'edoc_to',
            //'edoc_name:ntext',
            //'dep_id',
            //'edoc_type_id',
            //'edoc_status_id',
            //'edoc_read_id',
            //'path:ntext',
            //'edoc_important_id',
            //'e_id_sent',
            //'e_id_dud',
            //'e_id_radio',
            //'ip_get_sent:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
