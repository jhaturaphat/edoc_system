<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\EdocStatus;
use app\models\EdocImportant;
use app\models\EdocType;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edoc-main-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'edoc_id')->textInput(['maxlength' => true, 'value'=>'2566']) ?>

    <?= $form->field($model, 'edoc_date_get')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'language' => 'th',       
        'type' => DatePicker::TYPE_INPUT,         
        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
        'convertFormat' => false,
        'pluginOptions' => [
            'autoclose' => true, 
            'todayHighlight' => true,
            'todayBtn'=>true,
            'format' => 'yyyy-mm-dd'           
        ]
    ]) ?>

    <?= $form->field($model, 'edoc_no_get')->textInput(['maxlength' => true, 'value'=>'อบ0032.012/ว11']) ?>

    <?= $form->field($model, 'edoc_no_keep')->textInput(['maxlength' => true, 'value'=>'TEST']) ?>

    <?= $form->field($model, 'edoc_date_doc')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'language' => 'th',       
        'type' => DatePicker::TYPE_INPUT,         
        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
        'convertFormat' => false,
        'pluginOptions' => [
            'autoclose' => true, 
            'todayHighlight' => true,
            'todayBtn'=>true,
            'format' => 'yyyy-mm-dd'           
        ]
    ])  ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'edoc_from')->textInput(['maxlength' => true, 'value'=>'ผอก.รพร.เดชอุดม']) ?></div>
        <div class="col-md-6"> <?= $form->field($model, 'edoc_to')->textInput(['maxlength' => true, 'value'=>'หัวหน้าฝ่าย/หัวหน้างาน']) ?></div>
    </div>

    <?php
    echo $form->field($model, 'edocFile')->widget(FileInput::classname(), [
        'options' => ['multiple' => false],
        'pluginOptions' => [
            'previewFileType' => 'any',
            'showUpload' => false
            ]
    ]);
    ?>
    
    <?= $form->field($model, 'edoc_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'edoc_type_id')->dropdownList(
                ArrayHelper::map(EdocType::find()->all(), 'edoc_type_id', 'edoc_type_name'),                 
                ['prompt' => '-- Select Tag --']) ?>

    <?= $form->field($model, 'edoc_important_id')->dropdownList(
                ArrayHelper::map(EdocImportant::find()->all(), 'edoc_important_id', 'edoc_important_name'),                 
                ['prompt' => '-- Select Tag --']) ?>

    <?= $form->field($model, 'edoc_status_id')->dropdownList(
                ArrayHelper::map(EdocStatus::find()->all(), 'edoc_status_id', 'edoc_status_name'),                 
                ['prompt' => '-- Select Tag --']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
