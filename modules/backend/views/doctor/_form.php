<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use app\modules\models\Branch;
use app\modules\models\WorkDate;
use app\modules\models\TimePeriod;

/* @var $this yii\web\View */
/* @var $model app\modules\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin([        
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-md-6">
        <?php /*echo $form->field($docProfile, 'imageFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'browseClass' => 'btn btn-info',
            'showRemove' => true,
            'showUpload' => false,
        ]
        ]); */?>
        </div>
        <div class="col-md-6">
        <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>
            </div>        
        </div>

        <div class="row">
            <div class="col-md-6">
            <?= $form->field($model, 'fname_th')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'lname_th')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <?= $form->field($model, 'fname_en')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'lname_en')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?php echo $form->field($docHasBranch, 'branch_id')->dropdownList(Branch::getDropDownList(),['prompt' => '--- เลือกสาขา ---']) ?>

        <?php echo $form->field($model, 'detail')->textarea(['rows' => 4]) ?>

        <?php echo $form->field($docHasWorkDate, 'work_date_id[]')->checkBoxList(WorkDate::getcheckBoxList(), ['itemOptions' => ['labelOptions'=> ['style'=> 'margin-right: 15px']]]) ?>        

        <?php echo $form->field($docHasTimePeri, 'time_period_id[]')->checkBoxList(TimePeriod::getcheckBoxList(), ['itemOptions' => ['labelOptions'=> ['style'=> 'margin-right: 15px']]]) ?>    
    </div>   

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
