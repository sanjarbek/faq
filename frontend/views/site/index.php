<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
$this->title = 'Консультант';
?>
<div class="site-index">

	<?php
	$model = new \common\models\QuestionQuery;
	echo $this->render('/question/_filter', ['model' => $model]);
	?>
	<div class="body-content">

		<div class="row">
			<div class="col-lg-12">
				<h1 style="text-align: center">Добро пожаловать на наш сайт!</h1>
				<div class="well-sm well"><h4>Здесь Вы можете получить актуальные и полезные ответы на интересующие Вас вопросы. Для этого Вам необходимо всего лишь ввести свой вопрос или ключевые слова. Система поиска сама поможет Вам найти ответы.</h4>
					<h4>Также Вы можете <a href="mailto:office@norma.kg">оставить свой вопрос</a> на который непременно получите ответ.</h4>
				</div>
			</div>
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
