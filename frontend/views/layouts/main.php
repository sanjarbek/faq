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
					'url' => ['/question'],
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
				<p class="pull-right"><!-- WWW.NET.KG , code for http://norma.kg -->
					<script language="javascript" type="text/javascript">
						java = "1.0";
						java1 = "" + "refer=" + escape(document.referrer) + "&amp;page=" + escape(window.location.href);
						document.cookie = "astratop=1; path=/";
						java1 += "&amp;c=" + (document.cookie ? "yes" : "now");
					</script>
					<script language="javascript1.1" type="text/javascript">
						java = "1.1";
						java1 += "&amp;java=" + (navigator.javaEnabled() ? "yes" : "now");
					</script>
					<script language="javascript1.2" type="text/javascript">
						java = "1.2";
						java1 += "&amp;razresh=" + screen.width + 'x' + screen.height + "&amp;cvet=" +
								(((navigator.appName.substring(0, 3) == "Mic")) ?
										screen.colorDepth : screen.pixelDepth);
					</script>
					<script language="javascript1.3" type="text/javascript">java = "1.3"</script>
					<script language="javascript" type="text/javascript">
						java1 += "&amp;jscript=" + java + "&amp;rand=" + Math.random();
						document.write("<a href='http://www.net.kg/stat.php?id=3259&amp;fromsite=3259' target='_blank'>" +
								"<img src='http://www.net.kg/img.php?id=3259&amp;" + java1 +
								"' border='0' alt='WWW.NET.KG' width='88' height='66' /></a>");
					</script>
					<noscript>
					<a href='http://www.net.kg/stat.php?id=3259&amp;fromsite=3259' target='_blank'><img
							src="http://www.net.kg/img.php?id=3259" border='0' alt='WWW.NET.KG' width='88'
							height='66' /></a>
					</noscript>
					<!-- /WWW.NET.KG -->
				</p>
				<p>&copy; <?= date('Y') ?>, ОсОО "БизнесПравоИнфо"</p>
				<p>Использование любых материалов, размещенных на сайте, разрещается при условии ссылки на сайт <a href="http://www.norma.kg">www.norma.kg</a></p>
				<div class="clearfix"> </div>
			</div>
		</footer>

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
