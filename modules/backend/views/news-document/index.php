<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข่าวประชาสัมพันธ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-document-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('สร้าง ข่าวประชาสัมพันธ์', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'path',
            'title',
            'detail:ntext',
            'create_at',
            //'update_at',
            //'news_type_id',
            //'public',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update} {delete}',
                //'visible'=> Yii::$app->user->isGuest ? false : true,
                'contentOptions'=>[
                    'noWrap' => true
                ],
                'buttons' => [
                    'update' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'title' => Yii::t('app', 'update')
                        ]);
                    },
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view')
                        ]);
                    },
                    'delete' => function($url,$model) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'delete'),                            
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
