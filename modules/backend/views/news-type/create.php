<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\models\NewsType */

$this->title = 'เพิ่ม ประเภทข่าวประชาสัมพันธ์';
$this->params['breadcrumbs'][] = ['label' => 'News Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
