<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>

<div class="question-index panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Последние вопросы</h3>
	</div>

	<?php
	echo GridView::widget([
		'dataProvider' => common\models\QuestionQuery::getLastAdded($count),
		'layout' => '{items}',
		'tableOptions' => [
			'class' => 'table',
		],
		'showHeader' => false,
		'columns' => [
			[
				'class' => 'yii\grid\SerialColumn',
			],
			'content:ntext',
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}',
				'buttons' => [
					'view' => function($url, $model)
					{
						return Html::a('<span class="btn btn-info pull-right">Подробно...</span>', $model->getUrl(), [
									'title' => Yii::t('yii', 'View'),
						]);
					}
				],
			],
		],
	]);
	?>
	<div class="clearfix"></div>
</div>
