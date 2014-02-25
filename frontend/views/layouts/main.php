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
		<div class="container">
			<div class="pull-left">
				<p style="font-family: TimesNewRoman;font-size: 50px; color: #0081B8;">БизнесПравоИнфо</p>
				<p style="font-family: TimesNewRoman;font-size: 17px; color: #0081B8;">КОНСАЛТИНГОВАЯ ЮРИДИЧЕСКАЯ КОМПАНИЯ</p>
			</div>
			<?php
			NavBar::begin([
//				'brandLabel' => 'Главная',
//				'brandUrl' => Yii::$app->homeUrl,
//					color: #0081B8
				'options' => [
					'class' => 'navbar navbar-pull-right',
					'color' => '#0081B8',
				],
			]);
			$menuItems = [
				[
					'label' => 'Главная',
					'url' => ['/site'],
				],
				['label' => 'Контакты', 'url' => ['/site/about']],
			];
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav pull-right'],
				'items' => $menuItems,
			]);
			NavBar::end();
			?>
			<hr />
			<?php
//				Breadcrumbs::widget([
//					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//				])
			echo Alert::widget();
			echo $content;
			?>
		</div>

		<footer class="footer">
			<div class="container">
				<p class="pull-left">&copy; <?= date('Y') ?>, ОсОО "БизнесПравоИнфо"</p>
				<div class="clearfix"> </div>
				<p class="pull-left">Использование любых материалов, размещенных на сайте, разрещается при условии ссылки на сайт <a href="http://www.norma.kg">www.norma.kg</a></p>
				<div class="clearfix"></div>
			</div>
		</footer>

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
