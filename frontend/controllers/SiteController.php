<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Books;

/**
 * Site controller
 */
class SiteController extends Controller
{
   
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],            
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'books' => Books::find()->all(),
        ]);
    }
}
