<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%authors}}".
 *
 * @property int $id
 * @property string|null $surname
 * @property string|null $name
 * @property string|null $patronymic
 * @property int|null $date_of_birth
 *
 * @property BookRelationAuthor[] $bookRelationAuthors
 * @property Books[] $books
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%authors}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['date_of_birth'], 'integer'],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 100],
            [['surname', 'name', 'patronymic', 'date_of_birth'], 'required'],
            [['date_of_birth'], 'filter', 'filter' => function ($value) {
                if(!preg_match("/^[\d\+]+$/",$value) && $value > 0){
                    return strtotime($value);
                }
                else{
                    return $value;
                }
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'date_of_birth' => 'Date Of Birth',
        ];
    }

    /**
     * Gets query for [[BookRelationAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookRelationAuthors()
    {
        return $this->hasMany(BookRelationAuthor::className(), ['id_author' => 'id']);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['id' => 'id_book'])->viaTable('{{%book_relation_author}}', ['id_author' => 'id']);
    }
}
