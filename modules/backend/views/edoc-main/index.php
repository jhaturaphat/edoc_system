<?php

use yii\helpers\Html;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\web\View;
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
            'title' => 'แจ้งเวียนเอกสารในระบบ',
            'size'=> 'modal-lg'
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
                    return Html::button('<i class="fas fa-paper-plane text-primary"></i>', 
                    [
                        'title'=>'แจ้งเวียน', 
                        'id'=>'send_button', 
                        'class'=>"btn",
                        'onclick'=>'loadModal(this)',
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

$this->registerJs('
    function loadModal(ele){  
        $("#modal_send").modal("show").find("#modal_content").load($(ele).attr("value"));
    } 
',View::POS_END, 'my-script');
$this->registerCss(".modal-lg { max-width: 100%; }");
?>
