<?php

use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\BaseHtml;
?>

<div class="report">
    <center>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                เลือกปีงบประมาณ &nbsp;<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="?r=report/report2">ปีงบประมาณ 2558</a></li>
                <li><a href="?r=report/report3">ปีงบประมาณ 2557</a></li>
                <li><a href="?r=report/report4">ปีงบประมาณ 2556</a></li>
                <li><a href="?r=report/report5">ปีงบประมาณ 2555</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="?r=report/report100">ทุกปีงบประมาณ</a></li>
            </ul>
        </div>
    </center>

    <div class = "panel-body">

        <div style = "display: none">
            <?php
            echo Highcharts::widget([
                'scripts' => [
                    'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                    'modules/exporting', // adds Exporting button/menu to chart
//'themes/grid', // applies global 'grid' theme to all charts
//'highcharts-3d',
                    'modules/drilldown'
                ]
            ]);
            ?>
        </div>
        <div id="chart1">
        </div>

        <?php
        $this->registerJs("$(function () { 
                    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                return {
                                radialGradient: {
                                    cx: 0.5,
                                    cy: 0.3,
                                    r: 0.7
                                    },
                                stops: [
                                    [0, color],
                                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                ]
                            };
                        });
    
                        $('#chart1').highcharts({
                            chart: {
                            type: 'column',
                            margin: 75,
                            options3d: {   
                                enabled: true,
                                alpha: 10,
                                beta: 15,
                                depth: 70
                            }
                            },
                            title: {
                                text: '10 อันดับรายการยาที่ใช้ ปี 2556 / จำนวนครั้งที่สั่ง'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    depth: 35,
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                        style: {
                                            color:'black'                     
                                        },
                                        connectorColor: 'silver'
                                    }
                                }
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: '<b>ครั้ง</b>'
                                },
                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [
                            {
                                name: 'ครั้ง',
                                colorByPoint: true,
                                data:$main

                            }
                            ],
                        });
                    });");
        ?>   
    </div>
</div>
