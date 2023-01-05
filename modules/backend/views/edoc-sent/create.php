<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EdocSent */

$this->title = 'สร้าง คลังหนังสือเวียน';
$this->params['breadcrumbs'][] = ['label' => 'คลังหนังสือเวียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edoc-sent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
