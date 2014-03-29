<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\QuestionQuery $searchModel
 */
$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = $this->title;
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
//			'id',
//			'title',
			'content:ntext',
			[
				'attribute' => 'tags',
				'format' => 'html',
				'value' => function($data)
				{
					$links = explode(',', $data->tags);
					$output = [];
					foreach ($links as $link)
					{
						$output[] = Html::a($link, \yii::$app->controller->createUrl([
											'index',
											'QuestionQuery[tags]' => $link,
						]));
					}
					return implode(', ', $output);
				}
			],
//			'email:email',
			// 'answer:ntext',
			// 'created_at',
			// 'updated_at',
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}',
				'buttons' => [
					'view' => function($url, $model)
					{
						return Html::a('<span class="btn btn-info pull-right">Подробно...</span>', $model->getUrl(), [
									'title' => Yii::t('yii', 'View'),
						]);
//						return Html::a('<span class="btn btn-info pull-right">Подробно...</span>', $url, [
//									'title' => Yii::t('yii', 'View'),
//						]);
					}
				],
			],
		],
	]);
	?>
	<div class="clearfix"></div>

</div>
