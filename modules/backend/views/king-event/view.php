<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\KingEvent */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'กิจกรรมเฉลิมพระเกียรติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="king-event-view">

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
<div
  id="blueimp-gallery"
  class="blueimp-gallery"
  aria-label="image gallery"
  aria-modal="true"
  role="dialog"
>
  <div class="slides" aria-live="polite"></div>
  <h3 class="title"></h3>
  <a
    class="prev"
    aria-controls="blueimp-gallery"
    aria-label="previous slide"
    aria-keyshortcuts="ArrowLeft"
  ></a>
  <a
    class="next"
    aria-controls="blueimp-gallery"
    aria-label="next slide"
    aria-keyshortcuts="ArrowRight"
  ></a>
  <a
    class="close"
    aria-controls="blueimp-gallery"
    aria-label="close"
    aria-keyshortcuts="Escape"
  ></a>
  <a
    class="play-pause"
    aria-controls="blueimp-gallery"
    aria-label="play slideshow"
    aria-keyshortcuts="Space"
    aria-pressed="false"
    role="button"
  ></a>
  <ol class="indicator"></ol>
</div>


<?php 
//'.Yii::getAlias('@web').$model->folder_img.$imgName.'
$imgFiles = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@web').str_replace("/" , "\\" ,$model->folder_img) ,['only'=>['*.*']]);
echo '<div id="links">';
foreach($imgFiles as $files)
   {
        $explodeImg = explode('\\', $files);
        $imgName = end($explodeImg);
        echo '<a href="'.Yii::getAlias('@web').$model->folder_img.$imgName.'" title="Banana">
        <img src="'.Yii::getAlias('@web').$model->folder_img.$imgName.'" alt="Banana" />
      </a>';
    }

?>
echo '</div>';



<script>
  document.getElementById('links').onclick = function (event) {
    event = event || window.event
    var target = event.target || event.srcElement
    var link = target.src ? target.parentNode : target
    var options = { index: link, event: event }
    var links = this.getElementsByTagName('a')
    blueimp.Gallery(links, options)
  }
</script>




