<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m200205_120456_create_books_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100),
            'pages' => $this->integer(4)->defaultValue(null),
            'date_of_issue' => $this->integer(11)->defaultValue(null),
        ]);
        $this->createIndex('books_title', '{{%books}}', 'title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
