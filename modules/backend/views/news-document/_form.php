<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\models\NewsType;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\models\NewsDocument */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php     
    echo $form->field($model, 'file')->widget(FileInput::classname(), [
    'options' => ['accept' => '*'],
    'pluginOptions' => [
        'browseClass' => 'btn btn-info',
        'showRemove' => true,
        'showUpload' => false,
        ]
    ]);     
    ?>

    <?php //$form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => '4'])  ?>

    <?php //echo $form->field($model, 'create_at')->textInput() ?>

    <?php //echo $form->field($model, 'update_at')->textInput() ?>

    <?= $form->field($model, 'news_type_id')->dropdownList(NewsType::getDropDownList(),['prompt' => '--- เลือกสาขา ---']) ?>

    <?php 
    $model->public = 'active';  
    echo $form->field($model, 'public')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
