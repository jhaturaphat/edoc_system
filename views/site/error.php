<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="jumbotron">
      <h1><?=Html::img(Url::base().'/img/icon-system/forbidden.png')?><?= Html::encode($this->title) ?></h1>
      <p class="text-danger"><?= nl2br(Html::encode($message)) ?></p>
      <p><a class="btn btn-default btn-lg" onclick="goBack()" role="button"><< ย้อนกลับ</a></p>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>