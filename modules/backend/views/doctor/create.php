<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\models\Doctor */

$this->title = 'เพิ่มแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'docProfile' => $docProfile,
        'docHasBranch' => $docHasBranch,
        'docHasTimePeri' => $docHasTimePeri,
        'docHasWorkDate' => $docHasWorkDate

    ]) ?>

</div>
