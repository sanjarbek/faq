<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;

/**
 * @var yii\web\View $this
 * @var common\models\QuestionQuery $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="question-search">
	<?php
	$form = ActiveForm::begin([
				'id' => 'question-search-form',
				'action' => ['/question/index'],
				'method' => 'get',
				'type' => ActiveForm::TYPE_INLINE,
				'enableClientValidation' => false,
	]);
	?>
	<?php
	echo $form->field($model, 'title')->widget(Typeahead::classname(), [
		'options' => ['placeholder' => 'Поиск вопросов ...'],
		'dataset' => [
			[
				'local' => ['a', 'b', 'c'],
				'limit' => 20
			]
		]
	]);
	?>
	<div class="form-group">
		<?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>
</div>
