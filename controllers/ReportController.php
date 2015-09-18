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
                WHERE DATE_SERV BETWEEN '$date1' AND '$date2' AND HOSPCODE NOT IN  ('11031')";


        if ($hospcode != '') {
            $sql = "SELECT HOSPCODE,DNAME,SUM(AMOUNT) AS TOTAL
                FROM drug_opd
                WHERE DATE_SERV BETWEEN '$date1' AND '$date2'
                AND HOSPCODE = $hospcode AND HOSPCODE NOT IN  ('11031')
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
                    'date1' => $date1,
                    'date2' => $date2,
                    'hospcode' => $hospcode,
        ]);
    }

    public function actionReport2() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30'
                AND HOSPCODE NOT IN  ('11031')
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
                    'main' => $main,
        ]);
    }

    public function actionReport3() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2013-10-01' AND '2014-09-30'
                AND HOSPCODE NOT IN  ('11031')
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
                    'main' => $main,
        ]);
    }

    public function actionReport4() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2012-10-01' AND '2013-09-30'
                AND HOSPCODE NOT IN  ('11031')
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
                    'main' => $main,
        ]);
    }

    public function actionReport5() {

        $sql = "SELECT DNAME,COUNT(AMOUNT) AS AMOUNT FROM drug_opd
                WHERE DATE_SERV BETWEEN '2011-10-01' AND '2012-09-30'
                AND HOSPCODE NOT IN  ('11031')
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
                    'main' => $main,
        ]);
    }

    public function actionReport6() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04688' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport7() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04689' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport8() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04690' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport9() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04691' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport10() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04692' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport11() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04693' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport12() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04694' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport13() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04695' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport14() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04696' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport15() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04697' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport16() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04698' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport17() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04699' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }

    public function actionReport18() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '04700' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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
        ]);
    }
    
    public function actionReport19() {

        $sql = "SELECT d.HOSPCODE,d.dname,d.DIDSTD,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='10' THEN d.AMOUNT ELSE 0 END) AS Oct,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='11' THEN d.AMOUNT ELSE 0 END) AS Nov,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='12' THEN d.AMOUNT ELSE 0 END) AS Dece,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='01' THEN d.AMOUNT ELSE 0 END) AS Jan,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='02' THEN d.AMOUNT ELSE 0 END) AS Feb,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='03' THEN d.AMOUNT ELSE 0 END) AS Mar,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='04' THEN d.AMOUNT ELSE 0 END) AS Apr,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='05' THEN d.AMOUNT ELSE 0 END) AS May,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='06' THEN d.AMOUNT ELSE 0 END) AS June,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='07' THEN d.AMOUNT ELSE 0 END) AS July,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='08' THEN d.AMOUNT ELSE 0 END) AS Aug,
                SUM(CASE WHEN SUBSTR(d.DATE_SERV,6,2)='09' THEN d.AMOUNT ELSE 0 END) AS Sep
                FROM drug_opd d
                WHERE d.DATE_SERV BETWEEN '2014-10-01' AND '2015-09-30' AND d.DIDSTD<>''
                AND d.HOSPCODE = '13924' 
		AND d.HOSPCODE NOT IN ('11031')
                AND d.dname NOT IN ('')
                GROUP BY d.DIDSTD";

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

        return $this->render('report19', [
                    'dataProvider' => $dataProvider,
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
