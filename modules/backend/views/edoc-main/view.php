<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */

$this->title = $model->edoc_name;
$this->params['breadcrumbs'][] = ['label' => 'คลังหนังสือหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="edoc-main-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->e_main_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->e_main_id], [
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
            'e_main_id',
            'edoc_id',
            'e_id',
            'edoc_no_get',
            'edoc_no_sent',
            'edoc_no_keep',
            'edoc_date_doc',
            'edoc_date_get',
            'edoc_from',
            'edoc_to',
            'edoc_name:ntext',
            'dep_id',
            'edoc_type_id',
            'edoc_status_id',
            'edoc_read_id',
            'path:ntext',
            'edoc_important_id',
            'e_id_sent',
            'e_id_dud',
            'e_id_radio',
            'ip_get_sent:ntext',
            'create_at',
            'edoc_date_get_2',
            'edoc_date_doc_2',
        ],
    ]) ?>

</div>
