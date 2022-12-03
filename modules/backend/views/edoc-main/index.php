<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
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

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'e_main_id',
            //'edoc_id',
            'e_id',
            //'edoc_no_get',
            //'edoc_no_sent',
            //'edoc_no_keep',
            //'edoc_date_doc',
            //'edoc_date_get',
            'edoc_name:ntext',
            'edoc_from',
            'edoc_to',            
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
            //'create_at',
            //'edoc_date_get_2',
            //'edoc_date_doc_2',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{send} {view} {update} {delete}',
            'contentOptions'=>[
                'noWrap' => true
              ],
            'buttons'=>[                
                'send' => function($url,$model,$key){ 
                    return Html::a('<i class="fas fa-paper-plane"></i>',Url::to(['/backend/edoc-main/send','model'=>$model]), ['title'=>'ส่ง']);
                }
            ]
        
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
