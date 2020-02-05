<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="book-relation-author-index">

    <p>
        <?= Html::a('Добавить автора  ', ['book-relation-author/create', 'id_book' => $id_book], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Автор',
                'format' => 'html',
                'value' => function($model) {
                    return $model->author->name . ' ' . $model->author->surname . ' ' . $model->author->patronymic;
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', yii\helpers\Url::to(['book-relation-author/delete', 'id_book' => $model->id_book, 'id_author' => $model->id_author]), ['title' => 'Авторы',]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
