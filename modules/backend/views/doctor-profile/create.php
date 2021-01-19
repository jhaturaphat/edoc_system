<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\models\DoctorProfile */

$this->title = 'Create Doctor Profile';
$this->params['breadcrumbs'][] = ['label' => 'Doctor Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
