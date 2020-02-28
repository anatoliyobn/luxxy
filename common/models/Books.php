<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%books}}".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $pages
 * @property int|null $date_of_issue
 *
 * @property BookRelationAuthor[] $bookRelationAuthors
 * @property Authors[] $authors
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%books}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pages', 'date_of_issue'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['title', 'pages', 'date_of_issue'], 'required'],
        ];
    }

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
     * Gets query for [[BookRelationAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookRelationAuthors()
    {
        return $this->hasMany(BookRelationAuthor::className(), ['id_book' => 'id']);
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['id' => 'id_author'])->viaTable('{{%book_relation_author}}', ['id_book' => 'id']);
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
