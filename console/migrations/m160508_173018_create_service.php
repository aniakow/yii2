<?php

use yii\db\Migration;

/**
 * Handles the creation for table `service`.
 */
class m160508_173018_create_service extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100),
            'add_date' => $this->date(),
            'description' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('service');
    }
}
