<?php

use yii\db\Migration;

/**
 * Handles the creation for table `service_company`.
 * Has foreign keys to the tables:
 *
 * - `company`
 * - `service`
 */
class m160508_173732_create_service_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service_company', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `company_id`
        $this->createIndex(
            'idx-service_company-company_id',
            'service_company',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-service_company-company_id',
            'service_company',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );

        // creates index for column `service_id`
        $this->createIndex(
            'idx-service_company-service_id',
            'service_company',
            'service_id'
        );

        // add foreign key for table `service`
        $this->addForeignKey(
            'fk-service_company-service_id',
            'service_company',
            'service_id',
            'service',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-service_company-company_id',
            'service_company'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-service_company-company_id',
            'service_company'
        );

        // drops foreign key for table `service`
        $this->dropForeignKey(
            'fk-service_company-service_id',
            'service_company'
        );

        // drops index for column `service_id`
        $this->dropIndex(
            'idx-service_company-service_id',
            'service_company'
        );

        $this->dropTable('service_company');
    }
}
