<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocType */

$this->title = 'Create Edoc Type';
$this->params['breadcrumbs'][] = ['label' => 'Edoc Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
