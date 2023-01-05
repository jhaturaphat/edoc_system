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
    <?php Pjax::begin(['id'=>'edoc_view_pjax_id']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => yii\bootstrap4\LinkPager::className()],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'edocSent.id',
            //'e_main_id',
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
            // 'edoc_read_id',
            'r_date',
            //'dep_id',
            //'edoc_type_id',
            //'e_id_sent',
            //'e_id_dud',
            'user_get:ntext',
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
                    // print_r($model->id);
                    return Html::a('<i class="fas fa-download text-primary"></i>',
                    Url::to(['edoc-view/download', 'id' => $model->e_main_id,'edoc_sent_id'=>$model->edocSent->id]),
                    ['class'=>'btn btn-default', 'title'=>'ดาวน์โหลด','data-pjax' => 0,'target' => '_blank','onclick'=>'reload()']);
                }                  
            ]
        
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php

$this->registerJs('
    function reload(){
        setTimeout(function(){
            $.pjax.reload({container: "#edoc_view_pjax_id", async: false}); //รีโหลดข้อมูลใหม่
        }, 1000);
    }
',yii\web\View::POS_END, 'edoc_view_script');
?>

<!-- http://dixonsatit.github.io/2015/07/21/item-alias.html -->
<!-- https://www.youtube.com/watch?v=OUUQNbQ3TS8 -->
