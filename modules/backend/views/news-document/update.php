<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\models\NewsDocument */

$this->title = 'แก้ไข ข่าวประชาสัมพันธ์: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ข่าวประชาสัมพันธ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
