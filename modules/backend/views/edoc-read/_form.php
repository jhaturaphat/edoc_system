<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocRead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-read-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edoc_read_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_read_name')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
