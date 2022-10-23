<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EdocMain */

$this->title = $model->edoc_id;
$this->params['breadcrumbs'][] = ['label' => 'Edoc Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="edoc-main-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'edoc_id' => $model->edoc_id, 'e_id' => $model->e_id, 'e_id_sent' => $model->e_id_sent, 'e_id_dud' => $model->e_id_dud, 'e_id_radio' => $model->e_id_radio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'edoc_id' => $model->edoc_id, 'e_id' => $model->e_id, 'e_id_sent' => $model->e_id_sent, 'e_id_dud' => $model->e_id_dud, 'e_id_radio' => $model->e_id_radio], [
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
        ],
    ]) ?>

</div>
