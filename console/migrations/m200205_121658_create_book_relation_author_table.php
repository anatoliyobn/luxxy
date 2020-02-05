<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_relation_author}}`.
 */
class m200205_121658_create_book_relation_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_relation_author}}', [
            'id_book' => $this->integer(11)->defaultValue(null),
            'id_author' => $this->integer(11)->defaultValue(null),
        ]);
        
        $this->addPrimaryKey('id_relation', '{{%book_relation_author}}', ['id_book', 'id_author']);
        $this->addForeignKey('fk-id_book', '{{%book_relation_author}}', 'id_book', '{{%books}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-id_author', '{{%book_relation_author}}', 'id_author', '{{%authors}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_relation_author}}');
    }
}
