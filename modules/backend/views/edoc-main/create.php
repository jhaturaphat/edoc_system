<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */

$this->title = 'สร้างหนังสือ';
$this->params['breadcrumbs'][] = ['label' => 'คลังหนังสือ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-main-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
