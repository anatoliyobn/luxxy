<?php
namespace backend\models;

class BookRelationAuthor extends \common\models\BookRelationAuthor
{   
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_book' => 'Книга',
            'id_author' => 'Автор',
        ];
    }
    
    /**
     * Find authors by id_book
     *
     * @param integer $id_book
     *
     * @return \yii\db\ActiveQuery
     */
    public static function findByIdBook($id_book)
    {
        return static::find()
            ->where(['id_book' => $id_book])
            ->orderBy(['id_author' => SORT_DESC]);
    }    
}
