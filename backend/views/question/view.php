<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Question $model
 */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class=" panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>

			<?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary pull-right']) ?>
			<?php
			echo Html::a('Удалить', ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger pull-right',
				'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
				'data-method' => 'post',
			]);
			echo " ";
			?>
			<div class="clearfix"></div>
		</h3>
	</div>

	<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'title',
			'content:ntext',
			'fio',
			'email:email',
			'answer:ntext',
			'tags',
			[
				'name' => 'created_at',
				'value' => date('d.m.Y', $model->created_at)
			],
			[
				'name' => 'updated_at',
				'value' => date('d.m.Y', $model->updated_at)
			],
		],
	]);
	?>

</div>
