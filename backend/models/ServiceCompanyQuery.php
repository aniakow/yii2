<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[ServiceCompany]].
 *
 * @see ServiceCompany
 */
class ServiceCompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ServiceCompany[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ServiceCompany|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
