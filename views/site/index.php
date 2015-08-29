<?php
Yii::$app->db->open();
/* @var $this yii\web\View */

$this->title = 'ยา รพสต';
?>


<div class="site-index">
    <div class="text-center">
        <img src="../images/logo.png" height="130" width="130" alt="">
    </div>
    <div class="jumbotron">
        ข้อมูลการใช้ยา รพสต.

        <!--p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p-->
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-3">
                <center>
                    <i class="fa fa-medkit fa-4x"></i>
                    <h2>ข้อมูลการใช้ยา</h2>
                </center>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลการใช้ยา ทำหน้าที่ประมวลผมการใช้ยาของ รพสต. ให้ผู้ใช้งานสามารถเลือกสถานพยาบาล ว/ด/ป ได้ตามความต้องการ ระบบรายงานสามารถส่งออกข้อมูลในรูปแบบไฟล์ต่างๆ 
                    เช่น Excel Word PowerPoint PDF CVS ตามความต้องการของผู้ใช้งาน</p>
                <center>
                    <p><a class="btn btn-success" href="?r=report/report1">คลิก &raquo;</a></p>
                </center>
            </div>

            <div class="col-lg-3">
                <center>
                    <i class="glyphicon glyphicon-list fa-4x"></i>
                    <h2>จำแนกรายเดือน</h2>
                </center>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำแนกรายเดือน เป็นการสรุปข้อมูลการใช้ยาของแต่ละ รพสต. ในรูปแบบรายงาน SUMARY ตามปีงบประมาณ ตั้งแต่เดือน ตุลาคม - กันยายน ของแต่ละปี
                ให้อยู่ในรูปแบบของตารางข้อมูล เพื่อให้ทางเภสัชกรจัดทำแผนการใช้ยา</p>
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
                        </ul>
                    </div>
                </center>
            </div>

            <div class="col-lg-3">
                <center>
                    <i class="fa fa-search fa-4x"></i>
                    <h2>สืบค้นข้อมูลยา</h2>
                </center>

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สืบค้นรายการยา ผู้ใช้งานสามารถสือค้นรายการยาที่สถานพยาบาลทุกแห่งได้แจกจ่ายให้กับผู้มารับบริการ โดยสามารถค้นหาจากรหัสสถานพยาบาล ชื่อยา ว/ด/ป ที่จ่ายยาได้โดยยืดหนุ่นต่อการค้นหาข้อมูล
                    ที่อยู่ในรูปแบบของ Grid หรือตารางข้อมูลนั้นเอง</p>
                <center>
                    <p><a class="btn btn-success" href="?r=drug-opd/index">คลิก &raquo;</a></p>
                </center>
            </div>

            <div class="col-lg-3">
                <center>
                    <i class="fa fa-pie-chart fa-4x"></i>
                    <h2>สถิติ</h2>
                </center>

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถิติ เป็นภาพรวมการใช้ยาของ รพสต ที่แสดงอยู่ในรูปแบบ Chart เปรียบเทียบข้อมูลยา ให้ผู้ใช้และผู้ดูแลระบบสามารถเข้าใจได้ง่าย เพื่อเป็นประโยชน์ต่อการคอกเดากำหนดทิศทางความน่าจะเป็นในอนาคต 
                    เพื่อเป็นประโยชน์ต่อผู้มารับบริการ และประโยชน์ต่อองค์กร</p>
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
            </div>
        </div>
    </div>
</div>

