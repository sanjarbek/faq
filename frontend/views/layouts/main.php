<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
		<?php $this->beginBody() ?>
		<div class="wrap">
			<div>
				<h3></h3>
			</div>
			<div class="row">
				<div class="col-sm-offset-1 col-10">
					<?php
					NavBar::begin([
						'brandLabel' => 'Название сайта',
						'brandUrl' => Yii::$app->homeUrl,
						'options' => [
//					'class' => 'navbar-inverse navbar-fixed-top',
							'class' => 'navbar navbar-nav navbar-default',
						],
					]);
					$menuItems = [
						['label' => 'Главная', 'url' => ['/site/index']],
						['label' => 'О нас', 'url' => ['/site/about']],
//						['label' => 'Contact', 'url' => ['/site/contact']],
					];
					if (Yii::$app->user->isGuest) {
//				$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
						$menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
					} else {
						$menuItems[] = ['label' => 'Выход (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout']];
					}
					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'items' => $menuItems,
					]);
					NavBar::end();
					?>
				</div>
			</div>
			<div class="row">
				<div class="container">
					<?=
					Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					])
					?>
					<?= Alert::widget() ?>
					<?= $content ?>
				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<p class="pull-left">&copy; Название Компании <?= date('Y') ?></p>
			</div>
		</footer>

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
