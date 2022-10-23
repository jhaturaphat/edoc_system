<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocDepSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-dep-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dep_id') ?>

    <?= $form->field($model, 'dep_name') ?>

    <?= $form->field($model, 'dep_user') ?>

    <?= $form->field($model, 'dep_pass') ?>

    <?= $form->field($model, 'sent_txt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
