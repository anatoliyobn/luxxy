<?php

use frontend\assets\my\MyAsset;

MyAsset::register($this);

$this->title = 'Библиотека';
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Книги:</h1>
    </div>
    
    <?php if (!empty($books)):?>
        <?php foreach ($books as $book):?>
            <div class="book">
                <div class="panel panel-default">
                    <div class="panel-heading">Книга: <?=$book->title?><br/>Год выпуска: <?=$book->date_of_issue?></div>
                  <div class="panel-body">
                      <div class="text-primary">Авторы:<br/></div>
                    <?=$book->authorsInStr?>
                  </div>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    
</div>
