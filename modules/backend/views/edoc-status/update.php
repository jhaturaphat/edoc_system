<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocStatus */

$this->title = 'Update Edoc Status: ' . $model->edoc_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Edoc Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->edoc_status_id, 'url' => ['view', 'id' => $model->edoc_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edoc-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
