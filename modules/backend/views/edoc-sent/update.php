<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocSent */

$this->title = 'แก้ไข คลังหนังสือเวียน: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'คลังหนังสือเวียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edoc-sent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
