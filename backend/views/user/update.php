<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\User $model
 */
$this->title = 'Редактирование: №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getFullname(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="user-update">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<?= Html::encode($this->title) ?>
				<?= Html::a('<span class="glyphicon glyphicon-list"></strong>', ['index', 'id' => $model->id], ['class' => 'pull-right']) ?>
				<?= Html::a('<span class="glyphicon glyphicon-eye-open"></strong>', ['view', 'id' => $model->id], ['class' => 'pull-right', 'style' => 'margin-right: 20px']) ?>
			</div>
		</div>
		<div class="panel-body">
			<?php
			echo $this->render('_form', [
				'model' => $model,
			]);
			?>
		</div>
	</div>
</div>
