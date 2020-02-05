<?php

namespace backend\controllers;

use Yii;
use backend\models\BookRelationAuthor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookRelationAuthorController implements the CRUD actions for BookRelationAuthor model.
 */
class BookRelationAuthorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Creates a new BookRelationAuthor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_book)
    {
        $model = new BookRelationAuthor();
        $model->id_book = $id_book;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['books/view', 'id' => $id_book]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BookRelationAuthor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_book
     * @param integer $id_author
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_book, $id_author)
    {
        $this->findModel($id_book, $id_author)->delete();

        return $this->redirect(['books/view', 'id' => $id_book]);
    }

    /**
     * Finds the BookRelationAuthor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_book
     * @param integer $id_author
     * @return BookRelationAuthor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_book, $id_author)
    {
        if (($model = BookRelationAuthor::findOne(['id_book' => $id_book, 'id_author' => $id_author])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
