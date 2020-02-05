<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m200205_115646_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'surname' => $this->string(100)->defaultValue(null),
            'name' => $this->string(100)->defaultValue(null),
            'patronymic' => $this->string(100)->defaultValue(null),
            'date_of_birth' => $this->integer(11)->defaultValue(null),
        ]);
        $this->createIndex('authors_surname', '{{%authors}}', 'surname');
        $this->createIndex('authors_name', '{{%authors}}', 'name');
        $this->createIndex('authors_patronymic', '{{%authors}}', 'patronymic');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%authors}}');
    }
}
