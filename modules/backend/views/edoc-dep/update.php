<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocDep */

$this->title = 'Update Edoc Dep: ' . $model->dep_id;
$this->params['breadcrumbs'][] = ['label' => 'Edoc Deps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dep_id, 'url' => ['view', 'id' => $model->dep_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edoc-dep-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
