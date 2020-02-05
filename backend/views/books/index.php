<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Authors;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'pages',
            'date_of_issue',
            [
                'attribute' => 'authorId',
                'format' => 'html',
                'filter' => Authors::authorsListName(),
                'value' => function($model) {
                    return $model->getAuthorsInStr();
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{authors} {view} {update} {delete}',
                'buttons' => [
                    'authors' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', yii\helpers\Url::to(['book-relation-author/create', 'id_book' => $model->id]), ['title' => 'Авторы',]);
                    },
                ],
            ],
        ],
                    
    ]); ?>

    <?php Pjax::end(); ?>

</div>
