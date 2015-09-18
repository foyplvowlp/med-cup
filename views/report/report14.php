<?php

use fedemotta\datatables\DataTables;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'รายงาน SUMARY รพสต.คกเลาใต้ ปีงบ 2558';

//$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการใช้ยา', 'url' => ['/report/report1']];
$this->params['breadcrumbs'][] = 'รายงาน SUMARY รพสต.คกเลาใต้ ปีงบ 2558';
?>


<div class="report">
    <center>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                เลือก รพสต. &nbsp;<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="?r=report/report6">รพสต.ธาตุ</a></li>
                <li><a href="?r=report/report7">รพสต.สงเปือย</a></li>
                <li><a href="?r=report/report8">รพสต.โพน</a></li>
                <li><a href="?r=report/report9">รพสต.ศรีโพนแท่น</a></li>                      
                <li><a href="?r=report/report10">รพสต.นาป่าหนาด</a></li>
                <li><a href="?r=report/report11">รพสต.ท่าบม</a></li>
                <li><a href="?r=report/report12">รพสต.นาจาน</a></li>
                <li><a href="?r=report/report13">รพสต.ท่าดีหมี</a></li>
                <li><a href="?r=report/report14">รพสต.คกเลาใต้</a></li>
                <li><a href="?r=report/report15">รพสต.ผาแบ่น</a></li>
                <li><a href="?r=report/report16">รพสต.บุฮม</a></li>
                <li><a href="?r=report/report17">รพสต.หินตั้ง</a></li>
                <li><a href="?r=report/report18">รพสต.หาดทรายขาว</a></li>
                <li><a href="?r=report/report19">รพสต.โสกใหม่</a></li>
            </ul>
        </div>
    </center>
    <center><h1>รายงาน SUMARY รพสต.คกเลาใต้ ปีงบ 2558</h1></center>

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
                    [
                        'attribute' => 'DNAME',
                        'header' => 'รายชือยา',
                        'headerOptions' => ['width' => '350']
                    ],
                    [
                        'attribute' => 'Oct',
                        'header' => 'ต.ค',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Nov',
                        'header' => 'พ.ย',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Dece',
                        'header' => 'ธ.ค',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Jan',
                        'header' => 'ม.ค',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Feb',
                        'header' => 'ก.พ',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Mar',
                        'header' => 'มี.ย',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Apr',
                        'header' => 'เม.ย',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'May',
                        'header' => 'พ.ค',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'June',
                        'header' => 'มิ.ย',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'July',
                        'header' => 'ก.ค',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Aug',
                        'header' => 'ส.ค',
                        'headerOptions' => ['width' => '10']
                    ],
                    [
                        'attribute' => 'Sep',
                        'header' => 'ก.ย',
                        'headerOptions' => ['width' => '10']
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
