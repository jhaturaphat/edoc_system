<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocDep */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-dep-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dep_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dep_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_pass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sent_txt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
