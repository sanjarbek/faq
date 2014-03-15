<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\UserQuery $searchModel
 */
$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">

				<?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], ['class' => 'pull-right']) ?>
				Список пользователей
				<div class="clearfix"></div>
			</div>
		</div>
		<?php // echo $this->render('_search', ['model' => $searchModel]);    ?>

		<?php
		echo GridView::widget([
			'dataProvider' => $dataProvider,
//			'filterModel' => $searchModel,
			'layout' => '{items}{pager}<span class="margin-left: 30px;">{summary}</span><br>',
			'showHeader' => true,
			'pager' => [
				'class' => 'yii\widgets\LinkPager',
				'maxButtonCount' => 5,
				'options' => [
					'class' => 'pagination pagination-sm pull-right',
					'style' => 'margin-right: 10px; margin-top: 0px; margin-bottom: 30px;',
				]
			],
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],
//			'id',
				'firstname',
				'secondname',
				'username',
//			'auth_key',
				// 'password_hash',
				// 'password_reset_token',
				'email:email',
				[
					'attribute' => 'role',
					'value' => function($data)
					{
						return $data->getRoleText();
					}
				],
				[
					'attribute' => 'status',
					'value' => function($data)
					{
						return $data->getStatusText();
					}
				],
				// 'created_at',
				// 'updated_at',
				['class' => 'yii\grid\ActionColumn'],
			],
		]);
		?>
	</div>
</div>
