<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DrugOpd */

$this->title = $model->HOSPCODE;
$this->params['breadcrumbs'][] = ['label' => 'Drug Opds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-opd-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'HOSPCODE' => $model->HOSPCODE, 'PID' => $model->PID, 'SEQ' => $model->SEQ, 'DIDSTD' => $model->DIDSTD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'HOSPCODE' => $model->HOSPCODE, 'PID' => $model->PID, 'SEQ' => $model->SEQ, 'DIDSTD' => $model->DIDSTD], [
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
            'HOSPCODE',
            'PID',
            'SEQ',
            'DATE_SERV',
            'CLINIC',
            'DIDSTD',
            'DNAME',
            'AMOUNT',
            'UNIT',
            'UNIT_PACKING',
            'DRUGPRICE',
            'DRUGCOST',
            'PROVIDER',
            'D_UPDATE',
        ],
    ]) ?>

</div>
