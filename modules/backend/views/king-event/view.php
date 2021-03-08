<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\AppAssetLightbox;
/* @var $this yii\web\View */
/* @var $model app\models\KingEvent */


AppAssetLightbox::register($this);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'กิจกรรมเฉลิมพระเกียรติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="king-event-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:ntext',
            'detail:ntext',
            'create_at',
            'user_post',
            'user_update',
            'view_count',
            'folder_img'
        ],
    ]) ?>


</div>

<!-- The Gallery as lightbox dialog, should be a document body child element -->



<?php 
//'.Yii::getAlias('@web').$model->folder_img.$imgName.'
$imgFiles = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@web').str_replace("/" , "\\" ,$model->folder_img) ,['only'=>['*.*']]);
echo '<div class="container">';
echo '<div id="my-light-boox" class="row no-gutters">';
foreach($imgFiles as $files)
   {
        $explodeImg = explode('\\', $files);
        $imgName = end($explodeImg);
        echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a data-lightbox="mygallery" href="'.Yii::getAlias('@web').$model->folder_img.$imgName.'">
        <img src="'.Yii::getAlias('@web').$model->folder_img.$imgName.'" class="art img-fluid">
        </a>
        </div>';
    }

?>
<?php
echo '</div>';
echo '</div>';






