<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocStatus */

$this->title = 'Create Edoc Status';
$this->params['breadcrumbs'][] = ['label' => 'Edoc Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
