<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocReadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edoc Reads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-read-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edoc Read', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php yii\widgets\Pjax::begin(['id' => 'pjax_edoc_read_id']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'edoc_read_id',
            'edoc_read_name:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php yii\widgets\Pjax::end() ?>
</div>
