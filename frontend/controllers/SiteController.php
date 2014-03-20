<?php

namespace frontend\controllers;

use yii\web\Controller;

class SiteController extends Controller
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => \yii\web\AccessControl::className(),
				'only' => ['about'],
				'rules' => [
					[
						'actions' => ['about'],
						'allow' => true,
						'roles' => ['?'],
					],
				],
			],
		];
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionAbout()
	{
		return $this->render('about');
	}

}

