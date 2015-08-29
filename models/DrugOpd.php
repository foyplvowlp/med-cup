<?php

namespace app\models;

use Yii;

class DrugOpd extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'drug_opd';
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'SEQ', 'DATE_SERV','DNAME', 'CLINIC', 'DIDSTD', 'D_UPDATE'], 'required'],
            [['DATE_SERV', 'D_UPDATE'], 'safe'],
            [['AMOUNT'], 'integer'],
            [['DRUGPRICE', 'DRUGCOST'], 'number'],
            [['HOSPCODE', 'CLINIC'], 'string', 'max' => 5],
            [['PID', 'PROVIDER'], 'string', 'max' => 15],
            [['SEQ'], 'string', 'max' => 16],
            [['DIDSTD'], 'string', 'max' => 24],
            [['DNAME'], 'string', 'max' => 255],
            [['UNIT'], 'string', 'max' => 3],
            [['UNIT_PACKING'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'รหัสสถานบริการ',
            'PID' => 'Pid',
            'SEQ' => 'Seq',
            'DATE_SERV' => 'วันที่ให้บริการ',
            'CLINIC' => 'Clinic',
            'DIDSTD' => 'รหัส 24 หลัก',
            'DNAME' => 'ชื่อยา',
            'AMOUNT' => 'จำนวนที่จ่าย',
            'UNIT' => 'Unit',
            'UNIT_PACKING' => 'Unit  Packing',
            'DRUGPRICE' => 'Drugprice',
            'DRUGCOST' => 'Drugcost',
            'PROVIDER' => 'Provider',
            'D_UPDATE' => 'D  Update',
        ];
    }

    /**
     * @inheritdoc
     * @return DrugOpdQuery the active query used by this AR class.
     */
    /*public static function find() {
        return new DrugOpdQuery(get_called_class());
    }*/

}
