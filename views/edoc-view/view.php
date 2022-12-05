<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EdocView */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Edoc Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="edoc-view-view">

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
            'edoc_id',
            'e_id',
            'edoc_read_id',
            'r_date',
            'dep_id',
            'edoc_type_id',
            'e_id_sent',
            'e_id_dud',
            'user_get:ntext',
            'date_get',
            'ip_get:ntext',
            'e_id_radio',
            'e_main_id',
        ],
    ]) ?>

</div>
