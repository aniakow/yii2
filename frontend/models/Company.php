<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $add_date
 * @property string $name
 * @property string $nip
 * @property string $address_street
 * @property string $address_city
 * @property string $address_zip
 * @property integer $active
 * @property string $comments
 *
 * @property Category $category
 * @property ServiceCompany[] $serviceCompanies
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'active'], 'integer'],
            [['add_date'], 'safe'],
            [['comments'], 'string'],
            [['name'], 'string', 'max' => 40],
            [['nip'], 'string', 'max' => 13],
            [['address_street', 'address_city'], 'string', 'max' => 50],
            [['address_zip'], 'string', 'max' => 6],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'add_date' => 'Data dodania',
            'name' => 'Firma',
            'nip' => 'Nip',
            'address_street' => 'Address Street',
            'address_city' => 'Miasto',
            'address_zip' => 'Address Zip',
            'active' => 'Active',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceCompanies()
    {
        return $this->hasMany(ServiceCompany::className(), ['company_id' => 'id']);
    }
}
