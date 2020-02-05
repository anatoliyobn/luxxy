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
            'title' => 'Title',
            'pages' => 'Pages',
            'date_of_issue' => 'Date Of Issue',
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
}
