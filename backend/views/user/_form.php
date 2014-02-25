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

		<?= $form->field($model, 'id')->textInput() ?>

		<?= $form->field($model, 'firstname')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'second')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>

		<?= $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 32]) ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'role')->textInput() ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
