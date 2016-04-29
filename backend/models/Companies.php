<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
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
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'add_date', 'name', 'nip', 'address_street', 'address_city', 'address_zip', 'active', 'comments'], 'required'],
            [['category_id', 'active'], 'integer'],
            [['add_date'], 'safe'],
            [['comments'], 'string'],
            [['name'], 'string', 'max' => 40],
            [['nip'], 'string', 'max' => 13],
            [['address_street', 'address_city'], 'string', 'max' => 50],
            [['address_zip'], 'string', 'max' => 6],
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
            'add_date' => 'Add Date',
            'name' => 'Name',
            'nip' => 'Nip',
            'address_street' => 'Address Street',
            'address_city' => 'Address City',
            'address_zip' => 'Address Zip',
            'active' => 'Active',
            'comments' => 'Comments',
        ];
    }

    /**
     * @inheritdoc
     * @return CompaniesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompaniesQuery(get_called_class());
    }
}
