<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocView */

$this->title = 'Create Edoc View';
$this->params['breadcrumbs'][] = ['label' => 'Edoc Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
