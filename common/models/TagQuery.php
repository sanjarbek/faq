<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tag;

/**
 * QuestionQuery represents the model behind the search form about Question.
 */
class TagQuery extends Model
{

	public $id;
	public $name;
	public $frequency;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['name', 'frequency'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'frequency' => 'Frequency',
		];
	}

}
