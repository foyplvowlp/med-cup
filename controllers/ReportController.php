<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;

class ReportController extends Controller {

    public function actionReport1() {

        $date1 = date('Y-m-d');
        $date2 = date('Y-m-d');
        $hospcode = '';

        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $hospcode = $_POST['hospcode'];
        }

        $sql = "SELECT HOSPCODE,DNAME,SUM(AMOUNT) AS TOTAL
                FROM drug_opd
                WHERE DATE_SERV BETWEEN '$date1' AND '$date2'";


        if ($hospcode != '') {
            $sql = "SELECT HOSPCODE,DNAME,SUM(AMOUNT) AS TOTAL
                FROM drug_opd
                WHERE DATE_SERV BETWEEN '$date1' AND '$date2'
                AND HOSPCODE = $hospcode
                GROUP BY DNAME
                ORDER BY TOTAL DESC";
        };

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report1', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
                    'date1' => $date1,
                    'date2' => $date2,
                    'hospcode' => $hospcode,
        ]);
    }

    public function actionReport2() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30'
                GROUP BY DNAME
                ORDER BY AMOUNT DESC LIMIT 10";

        $rawData = Yii::$app->db->createCommand($sql)->queryAll();
        $main_data = [];
        foreach ($rawData as $data) {
            $main_data[] = [
                'name' => $data['DNAME'],
                'y' => $data['AMOUNT'] * 1,
                    //'drilldown' => $data['location_riks_id']
            ];
        }

        $main = json_encode($main_data);


        return $this->render('report2', [
                    'sql' => $sql,
                    'main' => $main,
        ]);
    }

    public function actionReport3() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2013-10-01' AND '2014-09-30'
                GROUP BY DNAME
                ORDER BY AMOUNT DESC LIMIT 10";

        $rawData = Yii::$app->db->createCommand($sql)->queryAll();
        $main_data = [];
        foreach ($rawData as $data) {
            $main_data[] = [
                'name' => $data['DNAME'],
                'y' => $data['AMOUNT'] * 1,
                    //'drilldown' => $data['location_riks_id']
            ];
        }

        $main = json_encode($main_data);


        return $this->render('report3', [
                    'sql' => $sql,
                    'main' => $main,
        ]);
    }

    public function actionReport4() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2012-10-01' AND '2013-09-30'
                GROUP BY DNAME
                ORDER BY AMOUNT DESC LIMIT 10";

        $rawData = Yii::$app->db->createCommand($sql)->queryAll();
        $main_data = [];
        foreach ($rawData as $data) {
            $main_data[] = [
                'name' => $data['DNAME'],
                'y' => $data['AMOUNT'] * 1,
                    //'drilldown' => $data['location_riks_id']
            ];
        }

        $main = json_encode($main_data);


        return $this->render('report4', [
                    'sql' => $sql,
                    'main' => $main,
        ]);
    }

    public function actionReport5() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2011-10-01' AND '2012-09-30'
                GROUP BY DNAME
                ORDER BY AMOUNT DESC LIMIT 10";

        $rawData = Yii::$app->db->createCommand($sql)->queryAll();
        $main_data = [];
        foreach ($rawData as $data) {
            $main_data[] = [
                'name' => $data['DNAME'],
                'y' => $data['AMOUNT'] * 1,
                    //'drilldown' => $data['location_riks_id']
            ];
        }

        $main = json_encode($main_data);


        return $this->render('report5', [
                    'sql' => $sql,
                    'main' => $main,
        ]);
    }

    public function actionReport6() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04688' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report6', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport7() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04689' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report7', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport8() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04690' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report8', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport9() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04691' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report9', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport10() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04692' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report10', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport11() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04693' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report11', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport12() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04694' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report12', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport13() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04695' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report13', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport14() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04696' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report14', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport15() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04697' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report15', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport16() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04698' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report16', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport17() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04699' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report17', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport18() {

        $sql = "SELECT dname,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' AND d.AMOUNT<>'' THEN 1 ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE date_serv BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE = '04700' 
		AND HOSPCODE NOT IN ('11031')
                GROUP BY dname";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);

        return $this->render('report18', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport100() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                GROUP BY DNAME
                ORDER BY AMOUNT DESC LIMIT 10";

        $rawData = Yii::$app->db->createCommand($sql)->queryAll();
        $main_data = [];
        foreach ($rawData as $data) {
            $main_data[] = [
                'name' => $data['DNAME'],
                'y' => $data['AMOUNT'] * 1,
                    //'drilldown' => $data['location_riks_id']
            ];
        }

        $main = json_encode($main_data);


        return $this->render('report5', [
                    'sql' => $sql,
                    'main' => $main,
        ]);
    }

}
