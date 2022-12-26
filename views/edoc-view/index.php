<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Resume;
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
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'e_main_id',
            // 'id',
            // 'edoc_id',
            //'e_id',            
            [
                'label'=> 'ชื่อหนังสือ',
                'format' => 'ntext',
                'attribute'=>'e_main_id',
                'filter'=> function($model){
                    return print_r($model);
                },
                'value'=> 'edoc.edoc_name'
            ],            
            [
                'attribute'=>'หนังสือจาก',
                //'filter'=>Resume::itemsAlias('education'),
                'value'=> 'edoc.edoc_from'
            ],
            [
                'attribute'=>'สถานะการอ่าน',
                //'filter'=>Resume::itemsAlias('education'),
                'value'=> 'edocRead.edoc_read_name'
            ],
            //'edoc_read_id',
            'r_date',
            //'dep_id',
            //'edoc_type_id',
            //'e_id_sent',
            //'e_id_dud',
            //'user_get:ntext',
            //'date_get',
            //'ip_get:ntext',
            //'e_id_radio',
            

            ['class' => 'yii\grid\ActionColumn',
            // 'template'=>'{download} {view} {update} {delete}',
            'template'=>'{download}',
            'contentOptions'=>[
                'noWrap' => true
              ],
              'buttons'=>[                
                'download' => function($url,$model,$key){   
                    return Html::a('<i class="fas fa-download text-primary"></i>',$url,['class'=>'btn btn-default', 'title'=>'ดาวน์โหลด']);
                }                  
            ]
        
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<!-- http://dixonsatit.github.io/2015/07/21/item-alias.html -->
<!-- https://www.youtube.com/watch?v=OUUQNbQ3TS8 -->
