<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KingEvent */

$this->title = 'แก้ไข : ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'กิจกรรมเฉลิมพระเกียรติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="king-event-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
