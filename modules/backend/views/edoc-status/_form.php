<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edoc_status_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_status_name')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
