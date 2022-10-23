<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */

$this->title = 'Update Edoc Main: ' . $model->edoc_id;
$this->params['breadcrumbs'][] = ['label' => 'Edoc Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->edoc_id, 'url' => ['view', 'edoc_id' => $model->edoc_id, 'e_id' => $model->e_id, 'e_id_sent' => $model->e_id_sent, 'e_id_dud' => $model->e_id_dud, 'e_id_radio' => $model->e_id_radio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edoc-main-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
