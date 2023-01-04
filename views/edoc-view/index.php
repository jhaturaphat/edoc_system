<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\EdocRead;
use app\models\EdocType;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EdocViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลังหนังสือ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-view-index">

    <h1><?= Html::encode($this->title) ?></h1>   
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
                'label'=> 'ประเภทหนังสือ',
                'format' => 'ntext',
                'filter' => ArrayHelper::map(EdocType::find()->all(), 'edoc_type_id', 'edoc_type_name'),
                'attribute'=>'edoc_type_id',                
                'value'=> 'edocType.edoc_type_name'
            ],         
            [
                'label'=> 'ชื่อหนังสือ',
                'format' => 'ntext',
                'attribute'=>'e_main_id',                
                'value'=> 'edocMain.edoc_name'
            ],            
            [
                'label'=> 'หนังสือจาก',
                'format' => 'ntext',
                'attribute'=>'หนังสือจาก',                
                'value'=> 'edocMain.edoc_from'
            ],
            [
                'label'=> 'สถานะการอ่าน',
                'format' => 'ntext',
                'filter' => ArrayHelper::map(EdocRead::find()->all(), 'edoc_read_id', 'edoc_read_name'),
                'attribute'=>'edoc_read_id',                
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
                    return Html::a('<i class="fas fa-download text-primary"></i>',
                    Url::to(['edoc-view/download', 'id' => $model->e_main_id]),
                    ['class'=>'btn btn-default', 'title'=>'ดาวน์โหลด']);
                }                  
            ]
        
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<!-- http://dixonsatit.github.io/2015/07/21/item-alias.html -->
<!-- https://www.youtube.com/watch?v=OUUQNbQ3TS8 -->
