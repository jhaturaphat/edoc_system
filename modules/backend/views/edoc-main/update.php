<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */

$this->title = 'แก้ไขหนังสือ: ' . $model->e_main_id;
$this->params['breadcrumbs'][] = ['label' => 'หนังสือ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->e_main_id, 'url' => ['view', 'id' => $model->e_main_id]];
$this->params['breadcrumbs'][] = 'แก้ไขหนังสือ';
?>
<div class="edoc-main-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
