<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'Консультант';
?>
<div class="site-index">
	<div class="body-content">

		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
					<h1>Добро пожаловать на наш сайт!</h1>
					<p>Здесь Вы можете найти ответы на часто задаваемые и актуальные вопросы. </p>
					<p>Система поиска поможет Вам найти ответы.</p>
					<p>Также Вы можете <a href="mailto:office@norma.kg">оставить свой вопрос</a> на который непременно получите ответ.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$model = new \common\models\QuestionQuery;
			echo $this->render('/question/_filter', ['model' => $model]);
			?>
			<br />
			<br />
		</div>
		<div class="row">
			<?php
			echo $this->render('/question/_highrated', ['count' => 10]);
			?>
		</div>
		<div class="row">
			<?php
			echo $this->render('/question/_lastadded', ['count' => 10]);
			?>
		</div>
	</div>
</div>
