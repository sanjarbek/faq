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

echo $this->render('_filter', ['model' => $searchModel]);
?>
<div class="question-index panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>
	</div>

	<?php
	echo GridView::widget([
		'dataProvider' => $dataProvider,
//		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'id',
			'title',
			'content:ntext',
			'fio',
			'email:email',
			// 'answer:ntext',
			// 'created_at',
			// 'updated_at',
			['class' => 'yii\grid\ActionColumn'],
		],
	]);
	?>

</div>
