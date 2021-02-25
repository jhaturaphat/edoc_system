<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\NewsDocument;
use app\models\NewsDocumentSearch;

$dataProvider = new ActiveDataProvider([
    'query' => NewsDocument::find()->where(['news_type_id' => $id]),
    'pagination' => ['pageSize' => 10]
]);


?>

<?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => new NewsDocumentSearch(),
        'pager' => ['class' => yii\widgets\LinkPager::className(), 'firstPageLabel' => Yii::t('app', 'First'), 'lastPageLabel' => Yii::t('app', 'Last'),],
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class' => 'x'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],            
            'title',
            'detail',
            'update_at'
        ]
    ]);
?>


