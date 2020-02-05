<?php
namespace backend\models;

class Books extends \common\models\Books
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'pages' => 'Количество Страниц',
            'date_of_issue' => 'Год выпуска',
            'authorId' => 'Авторы'
        ];
    }
    
    /**
     * Select authors for book.
     * If not authors return null
     * @return null|string
     */
    public function getAuthorsInStr()
    {
        $authors = $this->authors;
        if (!$authors) {
            return null;
        }
        
        $authorsList = [];
        foreach ($authors as $author) {
            $authorsList[] = $author->surname . ' ' . $author->name;
        }
        
        return implode("<br>", $authorsList);        
    }
}
