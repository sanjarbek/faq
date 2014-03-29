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

	<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'content:ntext',
			'answer:ntext',
			[
				'name' => 'tags',
				'format' => 'html',
				'value' => $model->getTagsLinks(),
			],
		],
	]);
	?>
</div>
<div class="related-questions">
	<?php
	echo $this->render('/question/_related', [
		'tags' => $model->tags,
		'count' => 10]
	);
	?>
</div>
