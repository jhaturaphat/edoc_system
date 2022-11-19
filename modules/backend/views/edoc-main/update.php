<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */

$this->title = 'Update Edoc Main: ' . $model->e_main_id;
$this->params['breadcrumbs'][] = ['label' => 'Edoc Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->e_main_id, 'url' => ['view', 'id' => $model->e_main_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edoc-main-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
