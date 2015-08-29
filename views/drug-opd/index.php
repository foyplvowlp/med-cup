<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DrugOpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สืบค้นข้อมูลยาที่ รพสต. ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-opd-index">

    <center>
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </center>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'ลำดับ',
                'headerOptions' => ['width' => '50']
            ],
            [
                'attribute' => 'DATE_SERV',
                'headerOptions' => ['width' => '120']
            ],
            //'HOSPCODE',
            //'PID',
            //'SEQ',
            //'DATE_SERV',
            //'CLINIC',
            // 'DIDSTD',
            'DNAME',
            [
                 'attribute' => 'AMOUNT',
                'headerOptions' => ['width' => '50']
            ],
            [
                'attribute' => 'DIDSTD',
                'headerOptions' => ['width' => '270']
            ]
        // 'UNIT',
        // 'UNIT_PACKING',
        // 'DRUGPRICE',
        // 'DRUGCOST',
        // 'PROVIDER',
        // 'D_UPDATE',
        //['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
