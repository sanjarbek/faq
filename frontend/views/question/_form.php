<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Question $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="question-form">

	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'fio')->textInput(['maxlength' => 40]) ?>
	<?= $form->field($model, 'email')->textInput(['maxlength' => 30]) ?>
	<?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

	<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
