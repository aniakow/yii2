<?php

use yii\db\Migration;

/**
 * Handles the creation for table `company`.
 * Has foreign keys to the tables:
 *
 * - `category`
 */
class m160508_165403_create_company extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'add_date' => $this->date(),
            'name' => $this->string(40),
            'nip' => $this->string(13),
            'address_street' => $this->string(50),
            'address_city' => $this->string(50),
            'address_zip' => $this->string(6),
            'active' => $this->integer(1)->defaultValue(1),
            'comments' => $this->text(),
        ]);

        $this->insert('company', [
            'category_id' => 1,
            'add_date' => '2016-05-08',
            'name' => 'Usługi hotelowe',
            'nip' => '753-15-20-320',
            'address_street' => 'ul. Kolejowa 2',
            'address_city' => 'Mosina',
            'address_zip' => '62-050',
            'active' => 1,
            'comments' => 'comments 1',
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-company-category_id',
            'company',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-company-category_id',
            'company',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-company-category_id',
            'company'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-company-category_id',
            'company'
        );

        $this->delete('company', ['id' => 1]);

        $this->dropTable('company');
    }
}
