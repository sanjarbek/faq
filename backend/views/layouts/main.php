<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
			<?php
			NavBar::begin([
				'brandLabel' => 'Панель управления',
				'brandUrl' => Yii::$app->homeUrl,
				'options' => [
					'class' => 'navbar-inverse navbar-fixed-top',
				],
			]);
			$menuItems = [
				['label' => 'Вопросы', 'url' => ['/question']],
			];
			if (Yii::$app->user->isGuest)
			{
				$menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
			} else
			{
				$menuItems[] = ['label' => 'Выход (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout']];
			}
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => $menuItems,
			]);
			NavBar::end();
			?>

			<div class="container">
				<?=
				Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				])
				?>
				<?= $content ?>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<p class="pull-left">&copy; <?= date('Y') ?>, ОсОО "БизнесПравоИнфо"</p>
				<div class="clearfix"> </div>
				<p class="pull-left">Использование любых материалов, размещенных на сайте, разрещается при условии ссылки на сайт <a href="http://www.norma.kg">www.norma.kg</a></p>
				<div class="clearfix"></div>
			</div>
		</footer>
		<br />

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
