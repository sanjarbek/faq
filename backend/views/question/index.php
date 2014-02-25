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

//echo $this->render('_filter', ['model' => $searchModel]);
?>
<div class="question-index panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			<?= Html::encode($this->title) ?>
			<a href="<?= \yii::$app->controller->createUrl('/question/create') ?>" class="pull-right"><span class="glyphicon glyphicon-plus"></span></a>
		</div>
	</div>

	<?php
	echo GridView::widget([
		'dataProvider' => $dataProvider,
		'layout' => '{items}{pager}{summary}<br>',
		'showHeader' => true,
		'pager' => [
			'class' => 'yii\widgets\LinkPager',
			'maxButtonCount' => 5,
			'options' => [
				'class' => 'pagination pagination-sm pull-right',
				'style' => 'margin-right: 10px; margin-top: 0px; margin-bottom: 30px;',
			]
		],
//		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'title',
			[
				'attribute' => 'content',
				'format' => 'ntext',
				'value' => function($data)
				{
					return ($data->content === '') ? 'Нету ответа' : mb_substr($data->content, 0, 25, "UTF-8") . ' ...';
				}
			],
			[
				'attribute' => 'answer',
				'format' => 'ntext',
				'value' => function($data)
				{
					return ($data->answer === '') ? 'Нету ответа' : mb_substr($data->answer, 0, 50, "UTF-8") . ' ...';
				}
			],
			['class' => 'yii\grid\ActionColumn'],
		],
	]);
	?>

</div>
