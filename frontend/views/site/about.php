<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info site-about">
	<div class="panel-heading">
		<div class="panel-title">
			<h3><?= Html::encode($this->title) ?></h3>
		</div>
	</div>
	<table class="table table-responsive table-striped table-bordered">
		<tr>
			<th>Наш адрес:</th>
			<td>Кыргызская Республика, г. Бишкек, ул. Лермонтова 2, офис 108.</td>
		</tr>
		<tr>
			<th>Телефон/Факс:</th>
			<td>+996 (312) 365 930</td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><a href="mailto:office@norma.kg"> office@norma.kg</a></td>
		</tr>
		<tr>
			<th>Сайт:</th>
			<td><a href="http://www.norma.kg">www.norma.kg</a></td>
		</tr>
	</table>
</div>
