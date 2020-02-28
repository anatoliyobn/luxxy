<?php
namespace backend\models;

use yii\helpers\ArrayHelper;

class Authors extends \common\models\Authors
{
    /**
     * Create associative array of the form 'id' => 'author surname'
     * 
     * @return array
     */
    public static function authorsListName()
    {
        return ArrayHelper::map(self::authorsList(), 'id', 'fullName');
    }
    
    /**
     * Find all authors in DB
     * 
     * @return array
     */
    private static function authorsList()
    {
        return self::find()->all();
    }
    
    /**
     * Get full name for authors
     * 
     * @return string
     */
    public function getFullName() {
       return $this->surname . ' ' . $this->name;
    }
    
    /**
     * {@inheritdoc}
     */
     public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'date_of_birth' => 'Дата рождения',
        ];
    }
}
