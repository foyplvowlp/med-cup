<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DrugOpd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drug-opd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'HOSPCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEQ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATE_SERV')->textInput() ?>

    <?= $form->field($model, 'CLINIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIDSTD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMOUNT')->textInput() ?>

    <?= $form->field($model, 'UNIT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UNIT_PACKING')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DRUGPRICE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DRUGCOST')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROVIDER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'D_UPDATE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
