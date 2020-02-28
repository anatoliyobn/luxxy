<?php

use yii\db\Migration;

/**
 * Class m200228_081011_insert_books
 */
class m200228_081011_insert_books extends Migration
{
    public function up()
    {
        $this->batchInsert('{{%authors}}', ['id','surname', 'name', 'patronymic', 'date_of_birth'], [
            ['1', 'Иванов', 'Иван', 'Иванович', '478137600'],
            ['2', 'Петров', 'Петр', 'Петрович', '577929600'],
            ['3', 'Сидоров', 'Алексей', 'Сидорович', '639878400'],
            ['4', 'Иванова', 'Марфа', 'Прокопьевна', '797558400'],
            ['5', 'Конева', 'Анастасия', 'Петровна', '955411200'],
        ]);
        
        $this->batchInsert('{{%books}}', ['id','title', 'pages', 'date_of_issue'], [
            ['1', 'Книга 1', '50', '1995'],
            ['2', 'Книга 2', '123', '2010'],
            ['3', 'Книга 3', '12', '2003'],
            ['4', 'Книга 4', '32', '1999'],
            ['5', 'Книга 5', '115', '1988'],
        ]);
        
        $this->batchInsert('{{%book_relation_author}}', ['id_book','id_author'], [
            ['1', '1'],
            ['1', '2'],
            ['2', '2'],
            ['2', '3'],
            ['2', '5'],
            ['3', '1'],
            ['3', '4'],
            ['4', '1'],
            ['5', '3'],
            ['5', '4'],            
        ]);
    }

    public function down()
    {
        $this->delete('{{%authors}}', ['id' => ['1', '2', '3', '4', '5']]);
        $this->delete('{{%books}}', ['id' => ['1', '2', '3', '4', '5']]);
    }

}