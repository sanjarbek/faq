<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var common\models\LoginForm $model
 */
$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-offset-4 col-lg-4">
	<div class="site-login panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<?= Html::encode($this->title) ?>
			</h3>
		</div>
		<div class="panel-body">

			<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
			<?= $form->field($model, 'username') ?>
			<?= $form->field($model, 'password')->passwordInput() ?>
			<?= $form->field($model, 'rememberMe')->checkbox() ?>
			<div class="form-group">
				<?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>