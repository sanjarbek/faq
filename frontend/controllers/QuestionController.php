<?php

namespace frontend\controllers;

use Yii;
use common\models\Question;
use common\models\QuestionQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
{

	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	/**
	 * Lists all Question models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new QuestionQuery;
		$dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
		$posts = $dataProvider->getModels();
		if (count($posts) == 1)
		{
			return $this->redirect([
						'view',
						'title' => $posts[0]->title,
			]);
		}
		return $this->render('index', [
					'dataProvider' => $dataProvider,
					'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Question model.
	 * @param string $id
	 * @return mixed
	 */
	public function actionView($title)
	{
//		$model = $this->findModel($id);
		$model = $this->findModelByTitle($title);
		$model->viewed = $model->viewed + 1;
		$model->save(false);
		return $this->render('view', [
					'model' => $model,
		]);
	}

	/**
	 * Creates a new Question model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
//	public function actionCreate()
//	{
//		$model = new Question;
//
//		if ($model->load($_POST) && $model->save())
//		{
//			return $this->redirect(['view', 'id' => $model->id]);
//		} else
//		{
//			return $this->render('create', [
//						'model' => $model,
//			]);
//		}
//	}

	/**
	 * Updates an existing Question model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
//	public function actionUpdate($id)
//	{
//		$model = $this->findModel($id);
//
//		if ($model->load($_POST) && $model->save()) {
//			return $this->redirect(['view', 'id' => $model->id]);
//		} else {
//			return $this->render('update', [
//				'model' => $model,
//			]);
//		}
//	}

	/**
	 * Deletes an existing Question model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
//	public function actionDelete($id)
//	{
//		$this->findModel($id)->delete();
//		return $this->redirect(['index']);
//	}

	/**
	 * Finds the Question model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Question the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if ($id !== null && ($model = Question::find($id)) !== null)
		{
			return $model;
		} else
		{
			throw new NotFoundHttpException('Запращиваемая страница не найдена.');
		}
	}

	protected function findModelByTitle($title)
	{
		if ($title !== null && ($model = Question::find()->where(['title' => $title])->one()) !== null)
		{
			return $model;
		} else
		{
			throw new NotFoundHttpException('Запращиваемая страница не найдена.');
		}
	}

}
