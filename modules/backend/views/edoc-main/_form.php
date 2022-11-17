<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-main-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edoc_date_get')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_no_get')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_no_keep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_date_doc')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'edoc_from')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"> <?= $form->field($model, 'edoc_to')->textInput(['maxlength' => true]) ?></div>
    </div>
    
    <?= $form->field($model, 'edoc_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'edoc_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_important_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_status_id')->textInput(['maxlength' => true]) ?>


<!-- 
    <?= $form->field($model, 'edoc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_id')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($model, 'edoc_no_sent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edoc_read_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'path')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'e_id_sent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_id_dud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_id_radio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_get_sent')->textarea(['rows' => 6]) ?>
-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
