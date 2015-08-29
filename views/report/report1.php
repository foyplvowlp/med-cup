<?php

use fedemotta\datatables\DataTables;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'ข้อมูลการใช้ยา';

//$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการใช้ยา', 'url' => ['/report/report1']];
$this->params['breadcrumbs'][] = 'ข้อมูลการใช้ยา';
?>


<div class="report">
    <center><h1>รายงานข้อมูลการใช้ยา เลือกสถานพยาบาล</h1></center>


    <div class='well'>
        <!--h4><i class="icon fa fa-bar-chart"></i> รายการความเสี่ยงทั้งหมด</h4-->    
        <form method="POST"> 

            <div id="div3">ระหว่าง :</div>
            <div id="div1">
                <?=
                yii\jui\DatePicker::widget([
                    'name' => 'date1',
                    'value' => $date1,
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => [
                        'placeholder' => '',
                        'style' => 'width:130px;',
                        'class' => 'form-control',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1996:2099',
                        'showOn' => 'button',
                        'buttonImageOnly' => true,
                        'buttonText' => 'Select date'
                    ],
                ]);
                ?>


            </div>
            <div id="div4">ถึง</div>
            <div id="div2">
                <?=
                yii\jui\DatePicker::widget([
                    'name' => 'date2',
                    'value' => $date2,
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => [
                        'placeholder' => '',
                        'style' => 'width:130px;',
                        'class' => 'form-control',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1996:2099',
                        'showOn' => 'button',
                        'buttonImageOnly' => true,
                        'buttonText' => 'Select date'
                    ],
                ]);
                ?>                             
            </div>

            <!--div id="div5">เลือกแผนก :</div-->
            <div id="div6">
                <?php
                $list = yii\helpers\ArrayHelper::map(app\models\Hospname::find()->all(), 'id', 'hospname');
                echo yii\helpers\Html::dropDownList('hospcode', $hospcode, $list, [
                    'prompt' => 'เลือกสถานพยาบาล',
                    'class' => 'form-control',
                ]);
                ?>
            </div>&nbsp;

            <button class='btn btn-success'>ประมวลผล</button>


        </form>


    </div>



    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            if (isset($dataProvider))
                $dev = \yii\helpers\Html::a('คุณดนัย สอนไสย', 'https://fb.com/foyplvowlp', ['target' => '_blank']);


//echo yii\grid\GridView::widget([
//echo \kartik\grid\GridView::widget([
            echo DataTables::widget([
                'dataProvider' => $dataProvider,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '0'],
                //'dataProvider' => $dataProvider,
                //'responsive' => TRUE,
                //'hover' => true,
                //'floatHeader' => true,
                //'panel' => [
                //'before' => 'ประมวลผลข้อมูล จากวันที่  ' . $date1 . '   ถึงวันที่   ' . $date2 . '',
                //'type' => \kartik\grid\GridView::TYPE_SUCCESS,
                //'after' => 'โดย ' . $dev
                //],
                'columns' => [
                    /* [
                      'attribute' => 'risk_date',
                      'header' => 'วันที่เกิดเหตุ',
                      'headerOptions' => ['width' => '80']
                      ], */
                    [
                        'attribute' => 'HOSPCODE',
                        'header' => 'รหัส รพสต.',
                        'headerOptions' => ['width' => '30']
                    ],
                    [
                        'attribute' => 'DNAME',
                        'header' => 'รายการยา',
                        'headerOptions' => ['width' => '300']
                    ],
                    [
                        'attribute' => 'TOTAL',
                        'header' => 'จำนวน (เม็ด)',
                        'headerOptions' => ['width' => '20']
                    ],
                ],
                'clientOptions' => [
                    "lengthMenu" => [[20, -1], [20, Yii::t('app', "All")]], //20 Rows
                    "info" => TRUE,
                    "responsive" => true,
                    "dom" => 'lfTrtip',
                    "tableTools" => [
                        "aButtons" => [
                            [
                                "sExtends" => "copy",
                                "sButtonText" => Yii::t('app', "Copy to clipboard")
                            ], [
                                "sExtends" => "csv",
                                "sButtonText" => Yii::t('app', "Save to CSV")
                            ], [
                                "sExtends" => "xls",
                                "oSelectorOpts" => ["page" => 'current']
                            ], [
                                "sExtends" => "pdf",
                                "sButtonText" => Yii::t('app', "Save to PDF")
                            ], [
                                "sExtends" => "print",
                                "sButtonText" => Yii::t('app', "Print")
                            ],
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <?php
    $script = <<< JS
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});                 
JS;
    $this->registerJs($script);
    ?>

</div>
