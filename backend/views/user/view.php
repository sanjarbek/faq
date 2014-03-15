<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\User $model
 */
$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				Полная информация

				<?php
				echo Html::a('<span class="glyphicon glyphicon-remove"></strong>', ['delete', 'id' => $model->id], [
					'class' => 'pull-right',
					'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
					'data-method' => 'post',
				]);
				?>

				<?= Html::a('<span class="glyphicon glyphicon-edit"></strong>', ['update', 'id' => $model->id], ['class' => 'pull-right', 'style' => 'margin-right: 20px']) ?>
			</div>
		</div>
		<?php
		echo DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'firstname',
				'secondname',
				'username',
				'auth_key',
				'password_hash',
				'password_reset_token',
				'email:email',
				[
					'name' => 'role',
					'value' => $model->getRoleText()
				],
				[
					'name' => 'status',
					'value' => $model->getStatusText()
				],
				[
					'name' => 'created_at',
					'value' => date('d.m.Y h:i:s', $model->created_at)
				],
				[
					'name' => 'updated_at',
					'value' => date('d.m.Y h:i:s', $model->created_at)
				],
			],
		]);
		?>
	</div>
</div>
