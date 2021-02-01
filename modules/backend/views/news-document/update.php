<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\models\NewsDocument */

$this->title = 'Update News Document: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
