<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "service_company".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $service_id
 */
class ServiceCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'service_id'], 'required'],
            [['company_id', 'service_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'service_id' => 'Service ID',
        ];
    }

    /**
     * @inheritdoc
     * @return ServiceCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceCompanyQuery(get_called_class());
    }
}
