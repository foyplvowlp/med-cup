<?php

namespace app\controllers;

use Yii;
use app\models\DrugOpd;
use app\models\DrugOpdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DrugOpdController implements the CRUD actions for DrugOpd model.
 */
class DrugOpdController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all DrugOpd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DrugOpdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DrugOpd model.
     * @param string $HOSPCODE
     * @param string $PID
     * @param string $SEQ
     * @param string $DIDSTD
     * @return mixed
     */
    public function actionView($HOSPCODE, $PID, $SEQ, $DIDSTD)
    {
        return $this->render('view', [
            'model' => $this->findModel($HOSPCODE, $PID, $SEQ, $DIDSTD),
        ]);
    }

    /**
     * Creates a new DrugOpd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DrugOpd();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'HOSPCODE' => $model->HOSPCODE, 'PID' => $model->PID, 'SEQ' => $model->SEQ, 'DIDSTD' => $model->DIDSTD]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DrugOpd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $HOSPCODE
     * @param string $PID
     * @param string $SEQ
     * @param string $DIDSTD
     * @return mixed
     */
    public function actionUpdate($HOSPCODE, $PID, $SEQ, $DIDSTD)
    {
        $model = $this->findModel($HOSPCODE, $PID, $SEQ, $DIDSTD);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'HOSPCODE' => $model->HOSPCODE, 'PID' => $model->PID, 'SEQ' => $model->SEQ, 'DIDSTD' => $model->DIDSTD]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DrugOpd model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $HOSPCODE
     * @param string $PID
     * @param string $SEQ
     * @param string $DIDSTD
     * @return mixed
     */
    public function actionDelete($HOSPCODE, $PID, $SEQ, $DIDSTD)
    {
        $this->findModel($HOSPCODE, $PID, $SEQ, $DIDSTD)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DrugOpd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $HOSPCODE
     * @param string $PID
     * @param string $SEQ
     * @param string $DIDSTD
     * @return DrugOpd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($HOSPCODE, $PID, $SEQ, $DIDSTD)
    {
        if (($model = DrugOpd::findOne(['HOSPCODE' => $HOSPCODE, 'PID' => $PID, 'SEQ' => $SEQ, 'DIDSTD' => $DIDSTD])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
