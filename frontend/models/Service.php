<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property integer $id
 * @property string $title
 * @property string $add_date
 * @property string $description
 *
 * @property ServiceCompany[] $serviceCompanies
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_date'], 'safe'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Usługa',
            'add_date' => 'Data dodania',
            'description' => 'Opis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceCompanies()
    {
        return $this->hasMany(ServiceCompany::className(), ['service_id' => 'id']);
    }
}
