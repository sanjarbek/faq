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
	public $tags;
	public $answer;
	public $created_at;
	public $updated_at;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['title', 'content', 'fio', 'tags', 'answer', 'created_at', 'updated_at'], 'safe'],
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

		$test = Question::find()->where(['title' => $this->title])->one();

		if ($test)
		{
			$this->addCondition($query, 'title', true);
		} else
		{
			$values = explode(' ', trim($this->title));
			if ($values !== null)
			{
				foreach ($values as $value)
				{
					if (trim($value) != '')
					{
						$query->orWhere(['like', 'title', ' ' . $value . ' ']);
//						$query->orWhere(['like', 'title', $value]);
					}
				}
			}
		}
//		if ($this->tags != '')
//		{
//			$values = explode(' ', trim($this->tags));
//			if ($values !== null)
//			{
//				foreach ($values as $value)
//				{
//					$query->andWhere(['like', 'tags', ' ' . $value . ' ']);
//				}
//			}
//		}
//		$this->addCondition($query, 'id');
//		$this->addCondition($query, 'content', true);
//		$this->addCondition($query, 'fio', true);
		$this->addCondition($query, 'tags', true);
//		$this->addCondition($query, 'answer', true);
//		$this->addCondition($query, 'created_at');
//		$this->addCondition($query, 'updated_at');
		return $dataProvider;
	}

	public static function getHighRated($count = 10)
	{
		$query = Question::find()->orderBy(['viewed' => SORT_DESC])->limit($count);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$dataProvider->setPagination(false);

		return $dataProvider;
	}

	public static function getLastAdded($count = 10)
	{
		$query = Question::find()->orderBy(['updated_at' => SORT_DESC])->limit($count);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$dataProvider->setPagination(false);

		return $dataProvider;
	}

	public static function getRelatedQuestions($tags = '', $count = 10)
	{
		$query = Question::find()->limit($count);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if ($tags != '')
		{
			$values = explode(',', trim($tags));
			if (count($values) > 0)
			{
				foreach ($values as $value)
				{
					$query->orWhere(['like', 'tags', $value]);
				}
			}
		}

		$dataProvider->setPagination(false);

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

