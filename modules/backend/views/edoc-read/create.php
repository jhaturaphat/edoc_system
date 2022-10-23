<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocRead */

$this->title = 'Create Edoc Read';
$this->params['breadcrumbs'][] = ['label' => 'Edoc Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-read-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
