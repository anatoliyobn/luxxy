<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Authors;

/* @var $this yii\web\View */
/* @var $model backend\models\BookRelationAuthor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-relation-author-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_book')->textInput()->label(false)->hiddenInput() ?>
    
    <?= $form->field($model, 'id_author')->dropDownList(Authors::authorsListName(), ['prompt' => 'Выберите автора...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
