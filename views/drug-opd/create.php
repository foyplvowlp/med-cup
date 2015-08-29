<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DrugOpd */

$this->title = 'Create Drug Opd';
$this->params['breadcrumbs'][] = ['label' => 'Drug Opds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-opd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
