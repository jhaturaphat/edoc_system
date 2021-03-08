<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\KingEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="king-event-form container">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php 
        echo $form->field($model, 'img_event[]')->widget(FileInput::classname(), [
            'options' => [
                'multiple' => true,
                'accept' => 'image/*'                                     
            ],              
            'pluginOptions' => [  
                'uploadUrl' => true,                       
                'maxFileCount' => 15,       
                // 'overwriteInitial' => true,
                // 'initialPreviewAsData'=>true,
                'browseClass' => 'btn btn-info',                
                'showRemove' => true,
                'showUpload' => false, 
                'maxFileSize'=>2800
            ],
            'pluginEvents' => [
                
            ]
        ]); 
        ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
