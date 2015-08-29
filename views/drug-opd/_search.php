<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DrugOpdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drug-opd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'HOSPCODE') ?>

    <?= $form->field($model, 'PID') ?>

    <?= $form->field($model, 'SEQ') ?>

    <?= $form->field($model, 'DATE_SERV') ?>

    <?= $form->field($model, 'CLINIC') ?>

    <?php // echo $form->field($model, 'DIDSTD') ?>

    <?php // echo $form->field($model, 'DNAME') ?>

    <?php // echo $form->field($model, 'AMOUNT') ?>

    <?php // echo $form->field($model, 'UNIT') ?>

    <?php // echo $form->field($model, 'UNIT_PACKING') ?>

    <?php // echo $form->field($model, 'DRUGPRICE') ?>

    <?php // echo $form->field($model, 'DRUGCOST') ?>

    <?php // echo $form->field($model, 'PROVIDER') ?>

    <?php // echo $form->field($model, 'D_UPDATE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
