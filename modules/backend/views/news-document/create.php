<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\models\NewsDocument */

$this->title = 'Create News Document';
$this->params['breadcrumbs'][] = ['label' => 'News Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
