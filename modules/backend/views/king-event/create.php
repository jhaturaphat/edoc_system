<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KingEvent */

$this->title = 'สร้าง กิจกรรมเฉลิมพระเกียรติ';
$this->params['breadcrumbs'][] = ['label' => 'กิจกรรมเฉลิมพระเกียรติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="king-event-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
