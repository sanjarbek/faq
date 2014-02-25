<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

/**
 * @var yii\web\View $this
 * @var common\models\Question $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="question-form">

	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>
	<?= $form->field($model, 'content')->textarea(['rows' => 3]) ?>
	<?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

	<?php
	echo $form->field($model, 'tags')->widget(Select2::classname(), [
		'options' => ['placeholder' => 'Выберите теги ...'],
		'pluginOptions' => [
			'allowClear' => true,
			'tags' => yii\helpers\ArrayHelper::merge([''], $model->getTagsList()),
			'tokenSeparators' => [','],
			'maximumInputLength' => 100
		],
	]);
	?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
