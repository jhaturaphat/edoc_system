<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use app\modules\models\NewsType;

/* @var $this yii\web\View */
/* @var $model app\modules\models\NewsDocument */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'File')->widget(FileInput::classname(), []); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'news_type_id')->DropDownList(NewsType::getDropDownList(),['prompt' => '--- เลือก ---']) ?>

    <?php // $form->field($model, 'public')->dropDownList([ 'active' => 'แผยแพร่', 'inactive' => 'ไม่เผยแพร่', ], ['prompt' => '--- เลือก ---']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
