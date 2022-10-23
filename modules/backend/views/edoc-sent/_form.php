<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocSent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-sent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edoc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_read_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_id_sent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_id_dud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_get')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_get')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_get')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'e_id_radio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
