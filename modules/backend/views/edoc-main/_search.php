<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMainSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-main-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'edoc_id') ?>

    <?= $form->field($model, 'e_id') ?>

    <?= $form->field($model, 'edoc_no_get') ?>

    <?= $form->field($model, 'edoc_no_sent') ?>

    <?= $form->field($model, 'edoc_no_keep') ?>

    <?php // echo $form->field($model, 'edoc_date_doc') ?>

    <?php // echo $form->field($model, 'edoc_date_get') ?>

    <?php // echo $form->field($model, 'edoc_from') ?>

    <?php // echo $form->field($model, 'edoc_to') ?>

    <?php // echo $form->field($model, 'edoc_name') ?>

    <?php // echo $form->field($model, 'dep_id') ?>

    <?php // echo $form->field($model, 'edoc_type_id') ?>

    <?php // echo $form->field($model, 'edoc_status_id') ?>

    <?php // echo $form->field($model, 'edoc_read_id') ?>

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'edoc_important_id') ?>

    <?php // echo $form->field($model, 'e_id_sent') ?>

    <?php // echo $form->field($model, 'e_id_dud') ?>

    <?php // echo $form->field($model, 'e_id_radio') ?>

    <?php // echo $form->field($model, 'ip_get_sent') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
