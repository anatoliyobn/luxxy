<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BookRelationAuthor */

$this->title = 'Добавить автора для книги: ' . $model->book->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['books/index']];
$this->params['breadcrumbs'][] = ['label' => $model->book->title, 'url' => ['books/view', 'id' => $model->id_book]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-relation-author-create">

    <h1 class="text-danger"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
