<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Books;

/**
 * BooksSearch represents the model behind the search form of `backend\models\Books`.
 */
class BooksSearch extends Books
{   
    public $authorId;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pages', 'date_of_issue'], 'integer'],
            [['title', 'authorId'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Books::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pages' => $this->pages,
            'date_of_issue' => $this->date_of_issue,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->joinWith('authors', true)->andFilterWhere(['like', Authors::tableName().'.id', $this->authorId]);

        return $dataProvider;
    }
}
