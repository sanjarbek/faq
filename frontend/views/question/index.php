<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\QuestionQuery $searchModel
 */
$this->title = 'Вопросы';
?>
<p>
	<?php
	echo$this->render('_filter', ['model' => $searchModel])
	?>
</p>

<div class="question-index panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>
		</h3>
	</div>

	<?php
	echo GridView::widget([
		'dataProvider' => $dataProvider,
//		'filterModel' => $searchModel,
		'layout' => '{items}{pager}{summary}',
		'tableOptions' => [
			'class' => 'table',
		],
		'showHeader' => false,
		'pager' => [
			'class' => 'yii\widgets\LinkPager',
			'maxButtonCount' => 5,
			'options' => [
				'class' => 'pagination pagination-sm pull-right',
				'style' => 'margin-right: 10px; margin-top: 0px; margin-bottom: 5px;',
			]
		],
		'columns' => [
			[
				'class' => 'yii\grid\SerialColumn',
			],
			[
				'attribute' => 'content',
				'format' => 'html',
				'value' => function($data)
				{
					$links = $data->content . '<br />' . implode(' ', $data->getTagLinks());
					return $links;
				}
			],
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
