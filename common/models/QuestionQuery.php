<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Question;

/**
 * QuestionQuery represents the model behind the search form about Question.
 */
class QuestionQuery extends Model
{

	public $id;
	public $title;
	public $content;
	public $fio;
	public $email;
	public $answer;
	public $created_at;
	public $updated_at;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['title', 'content', 'fio', 'email', 'answer', 'created_at', 'updated_at'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'fio' => 'Fio',
			'email' => 'Email',
			'answer' => 'Answer',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	public function search($params)
	{
		$query = Question::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate()))
		{
			return $dataProvider;
		}

		$values = explode(' ', $this->title);
		foreach ($values as $value)
		{
			$query->orWhere(['like', 'title', $value]);
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'content', true);
		$this->addCondition($query, 'fio', true);
		$this->addCondition($query, 'email', true);
		$this->addCondition($query, 'answer', true);
		$this->addCondition($query, 'created_at');
		$this->addCondition($query, 'updated_at');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '')
		{
			return;
		}
		if ($partialMatch)
		{
			$query->andWhere(['like', $attribute, $value]);
		} else
		{
			$query->andWhere([$attribute => $value]);
		}
	}

}
