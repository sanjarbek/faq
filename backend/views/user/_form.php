<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\User $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'firstname')->textInput(['maxlength' => 20]) ?>

	<?= $form->field($model, 'secondname')->textInput(['maxlength' => 20]) ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

	<?php
	if ($model->isNewRecord)
		echo $form->field($model, 'password')->passwordInput(['maxlength' => 10]);
	?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

	<?=
	$form->field($model, 'role')->dropDownList(common\models\User::getRoleOptions(), [
		'prompt' => 'Выберите роль ...',
	])
	?>

	<?=
	$form->field($model, 'status')->dropDownList(common\models\User::getStatusOptions(), [
		'prompt' => 'Выберите статус ...',
	])
	?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
