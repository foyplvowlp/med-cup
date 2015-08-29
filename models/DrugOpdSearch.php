<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DrugOpd;

/**
 * DrugOpdSearch represents the model behind the search form about `app\models\DrugOpd`.
 */
class DrugOpdSearch extends DrugOpd {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'SEQ', 'DATE_SERV', 'CLINIC', 'DIDSTD', 'DNAME', 'UNIT', 'UNIT_PACKING', 'PROVIDER', 'D_UPDATE'], 'safe'],
            [['AMOUNT'], 'integer'],
            [['DRUGPRICE', 'DRUGCOST'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        //$query = DrugOpd::find();

        $query = DrugOpd::find()
          ->orderBy('date_serv DESC');
          //->all();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'DNAME' => $this->DNAME,
            'DATE_SERV' => $this->DATE_SERV,
            'AMOUNT' => $this->AMOUNT,
            'DRUGPRICE' => $this->DRUGPRICE,
            'DRUGCOST' => $this->DRUGCOST,
            'D_UPDATE' => $this->D_UPDATE,
        ]);

        $query->andFilterWhere(['like', 'HOSPCODE', $this->HOSPCODE])
                ->andFilterWhere(['like', 'PID', $this->PID])
                ->andFilterWhere(['like', 'SEQ', $this->SEQ])
                ->andFilterWhere(['like', 'CLINIC', $this->CLINIC])
                ->andFilterWhere(['like', 'DIDSTD', $this->DIDSTD])
                ->andFilterWhere(['like', 'DNAME', $this->DNAME])
                ->andFilterWhere(['like', 'UNIT', $this->UNIT])
                ->andFilterWhere(['like', 'UNIT_PACKING', $this->UNIT_PACKING])
                ->andFilterWhere(['like', 'PROVIDER', $this->PROVIDER]);

        return $dataProvider;
    }

}
