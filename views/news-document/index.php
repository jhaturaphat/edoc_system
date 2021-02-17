<?php
/* @var $this yii\web\View */
use kartik\tabs\TabsX;
use app\models\NewsType;
?>

<?php
$tabs = array();

foreach(NewsType::findAll(['active'=>'YES']) as $item){
    $tab['label'] = $item['name'];
    $tab['content'] = $this->render('tab-one',[
        'id' => $item['id']
        ]);
    array_push($tabs,$tab);
}

//print_r($tabs);
echo TabsX::widget([
    'items'=>$tabs,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false
]);