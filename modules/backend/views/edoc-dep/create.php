<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocDep */

$this->title = 'Create Edoc Dep';
$this->params['breadcrumbs'][] = ['label' => 'Edoc Deps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-dep-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
