<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\User $model
 */
$this->title = 'Создать нового пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<?= Html::encode($this->title) ?>
				<?= Html::a('<span class="glyphicon glyphicon-list"></strong>', ['index', 'id' => $model->id], ['class' => 'pull-right']) ?>
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
