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

<div class="question-search col-sm-12">
	<?php
	$form = ActiveForm::begin([
				'id' => 'question-search-form',
				'action' => ['/question/index'],
				'method' => 'get',
				'type' => ActiveForm::TYPE_INLINE,
				'enableClientValidation' => FALSE,
	]);
	?>
	<?php
	echo $form->field($model, 'title', ['options' => ['class' => 'form-group field-questionquery-title col-sm-offset-1 col-sm-8']])->widget(Typeahead::classname(), [
		'options' => [
			'placeholder' => 'Поиск вопросов ...',
		],
		'dataset' => [
			[
				'local' => common\models\Question::getAutoCompletion(),
				'template' => '<hr style="white-space: normal; margin: 1px">
					<p>{{value}}</p>',
				'engine' => 'Hogan',
				'limit' => 10,
			]
		]
	]);
	?>

	<div class="form-group col-sm-1">
		<button class="btn btn-primary" type="submit">
			<span class="glyphicon glyphicon-search"></span> Поиск
		</button>
	</div>

	<?php ActiveForm::end(); ?>
</div>
<div class="clearfix"></div>
