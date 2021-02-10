<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\models\Doctor */

$this->title = $model->prefix.' '.$model->fname_th.' '.$model->lname_th;
$this->params['breadcrumbs'][] = ['label' => 'แพทย์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'prefix',
            'fname_th',
            'lname_th',
            'fname_en',
            'lname_en',
            'detail:ntext',
            'doctorProfiles.email'
        ],
    ]) ?>

</div>
