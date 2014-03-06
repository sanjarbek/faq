<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Question $model
 */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
//			'title',
			'content:ntext',
//			'fio',
//			'email:email',
			'answer:ntext',
//			[
//				'name' => 'created_at',
//				'value' => date('d.m.Y', $model->created_at)
//			],
//			[
//				'name' => 'updated_at',
//				'value' => date('d.m.Y', $model->updated_at)
//			],
		],
	]);
	?>

</div>
