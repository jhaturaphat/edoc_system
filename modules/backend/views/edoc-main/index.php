<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
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

    <?php
        Modal::begin([
            'id'=> 'modal_send',
            'title' => 'Hello world',
            'size'=> 'modal-lg' ,
            'toggleButton' => ['label' => 'click me'],
        ]);
        
        echo '<div id="modal_content" class="col-md-12"></div>';
        
        Modal::end();
    ?>

    <?php Pjax::begin(['id'=>'e_main_id']); ?>
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
                    return Html::button('<i class="fas fa-paper-plane"></i>', 
                    [
                        'title'=>'ส่ง', 
                        'id'=>'send_button', 
                        'class'=>"btn",
                        'value'=>Url::to(['/backend/edoc-main/send','id'=>$model->e_main_id])
                    ]);
                }
            ]
        
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>


<?php
$script = <<< JS
    $("#send_button").click(function(){
        $("#modal_send").modal('show').find("#modal_content").load($(this).attr('value'));
    });
          

JS;
$this->registerJs($script);
?>
