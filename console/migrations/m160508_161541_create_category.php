<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category`.
 */
class m160508_161541_create_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'description' => $this->text(),
        ]);

        $this->insert('category', [
            'name' => 'Agroturystyka',
            'description' => 'description 1',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('category', ['id' => 1]);
        $this->dropTable('category');
    }
}
