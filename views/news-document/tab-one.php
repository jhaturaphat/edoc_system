<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\NewsDocument;
use app\models\NewsDocumentSearch;
use yii\helpers\Html;
use yii\helpers\Url;


$dataProvider = new ActiveDataProvider([
    'query' => NewsDocument::find()->where(['news_type_id' => $id]),
    'pagination' => ['pageSize' => 10]
]);


?>

<?php
    echo GridView::widget([  
        'dataProvider' => $dataProvider,
        //'filterModel' => new NewsDocumentSearch(),
        //'filterUrl' => ['/news-document'],        
        'pager' => ['class' => yii\bootstrap4\LinkPager::className(), 'firstPageLabel' => Yii::t('app', 'First'), 'lastPageLabel' => Yii::t('app', 'Last'),],        
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover',
            'width'=>'100%',
            'cellspacing'=> '0'
        ],        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],            
            'title',
            'detail',
            'update_at',
            // ['class' => 'yii\grid\CheckboxColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                //'visible'=> Yii::$app->user->isGuest ? false : true,
                'contentOptions' => [
                    'noWrap' => true
                ],
                'buttons' => [
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view')
                        ]);
                    },
                    'update' =>  function($url,$model) {
                        return !Yii::$app->user->isGuest ?
                        Html::a('<i class="fas fa-edit"></i>', ['/backend/news-document/update','id'=>$model->id], [
                            'title' => Yii::t('app', 'แก้ไข')
                        ]) : false;
                    },                    
                    'delete' => function($url,$model) {
                        return !Yii::$app->user->isGuest ? 
                        Html::a('<i class="fas fa-trash"></i>', ['/backend/news-document/delete','id'=>$model->id], [
                            'title' => Yii::t('app', 'ลบ'),                            
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) : false;
                    }
                ],
                
            ],
        ],
        
    ]);
?>

<button class="btn btn btn-primary">อ่านทั้งหมด ...</button>


