<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Question $model
 */
$this->title = 'Новый вопрос';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-create panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>
		</h3>
	</div>
	<div class="panel-body">
		<?php
		echo $this->render('_form', [
			'model' => $model,
		]);
		?>
	</div>
</div>
