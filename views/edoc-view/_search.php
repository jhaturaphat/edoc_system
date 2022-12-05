<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocViewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-view-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'edoc_id') ?>

    <?= $form->field($model, 'e_id') ?>

    <?= $form->field($model, 'edoc_read_id') ?>

    <?= $form->field($model, 'r_date') ?>

    <?php // echo $form->field($model, 'dep_id') ?>

    <?php // echo $form->field($model, 'edoc_type_id') ?>

    <?php // echo $form->field($model, 'e_id_sent') ?>

    <?php // echo $form->field($model, 'e_id_dud') ?>

    <?php // echo $form->field($model, 'user_get') ?>

    <?php // echo $form->field($model, 'date_get') ?>

    <?php // echo $form->field($model, 'ip_get') ?>

    <?php // echo $form->field($model, 'e_id_radio') ?>

    <?php // echo $form->field($model, 'e_main_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
