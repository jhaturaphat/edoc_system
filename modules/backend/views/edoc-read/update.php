<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocRead */

$this->title = 'Update Edoc Read: ' . $model->edoc_read_id;
$this->params['breadcrumbs'][] = ['label' => 'Edoc Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->edoc_read_id, 'url' => ['view', 'id' => $model->edoc_read_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edoc-read-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
