<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\NewsDocument;

$dataProvider = new ActiveDataProvider([
    'query' => NewsDocument::find()->where(['news_type_id' => $id]),
    'pagination' => ['pageSize' => 10]
]);
?>

<?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
    ]);
?>


