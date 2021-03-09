<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\KingEvent */
/* @var $form yii\widgets\ActiveForm */

app\assets\AppAssetLightbox::register($this);
?>

<div class="king-event-form ">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php 
        echo $form->field($model, 'img_event[]')->widget(FileInput::classname(), [
            'options' => [
                'multiple' => true,
                'accept' => 'image/*'                                     
            ],              
            'pluginOptions' => [  
                'enableResumableUpload'=> true, //
                'overwriteInitial' => false,   
                //'initialPreview' =>  $model->isNewRecord ? [] : $model::getThumnail($model), ยังใช้งานไม่ได้ไว้ Update  ที่หลัง
                //'initialPreviewConfig' => $model->isNewRecord ? [] : $model::getPreviews($model),   ยังใช้งานไม่ได้ไว้ Update  ที่หลัง
                'uploadUrl' => true,                       
                'maxFileCount' => 15,     
                'initialPreviewAsData'=>true,
                'browseClass' => 'btn btn-info',                
                'showRemove' => true,
                'showUpload' => false, 
                'maxFileSize'=>2800,
                'uploadExtraData' => [
                    'uploadToken' => Yii::$app->request->csrfParam, // for access control / security                     
                ],
            ],            
            'pluginEvents' => [
                'delete' => "function(e){console.log(e)}"
            ]
        ]); 
        ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php 
    if(!$model->isNewRecord){
        //'.Yii::getAlias('@web').$model->folder_img.$imgName.'
        $imgFiles = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@web').str_replace("/" , "\\" ,$model->folder_img) ,['only'=>['*.*']]);
        echo '<div class="container">';
        echo '<div id="my-light-boox" class="row no-gutters">';
        foreach($imgFiles as $files)
        {
                $explodeImg = explode('\\', $files);
                $imgName = end($explodeImg);
                echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a data-lightbox="mygallery" href="'.Yii::getAlias('@web').$model->folder_img.$imgName.'">
                <img src="'.Yii::getAlias('@web').$model->folder_img.$imgName.'" class="art img-fluid">
                </a>
                </div>';
            }

            

        ?> 
        <?php
        echo '</div>';
        echo '</div>';
    }
?>

</div>
