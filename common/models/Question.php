<?php

namespace common\models;

/**
 * This is the model class for table "questions".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $fio
 * @property string $email
 * @property string $answer
 * @property string $type
 * @property string $status
 * @property string $tags
 * @property string $created_at
 * @property string $updated_at
 */
class Question extends \yii\db\ActiveRecord
{

	const TYPE_AUTHOR = 0;
	const TYPE_GUEST = 1;
	const STATUS_NOT_PUBLISHED = 0;
	const STATUS_PUBLISHED = 1;
	const STATUS_ARCHIVED = 2;

	private $_oldTags;

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'questions';
	}

	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					\yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					\yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'content'], 'required'],
			[['content', 'answer', 'tags'], 'string'],
			[['created_at', 'updated_at'], 'safe'],
			[['title'], 'string', 'max' => 100],
			[['fio'], 'string', 'max' => 40],
			[['email'], 'string', 'max' => 30]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Заголовок',
			'content' => 'Вопрос',
			'fio' => 'ФИО',
			'email' => 'E-mail',
			'answer' => 'Ответ',
			'tags' => 'Теги',
			'created_at' => 'Создан',
			'updated_at' => 'Редактирован',
		];
	}

	/**
	 * @return array a list of links that point to the post list filtered by every tag of this post
	 */
	public function getTagLinks()
	{
		$links = [];
		foreach (Tag::string2array($this->tags) as $tag)
		{
			$links[] = \yii\helpers\Html::a('<span style="background-color:#F5F5F5; font-size: 11px; padding: 0px 2px;">' . \yii\helpers\Html::encode($tag) . '</span>', ['question/index', 'QuestionQuery[tags]' => $tag]);
//			$links[] = \yii\helpers\Html::a(\yii\helpers\Html::encode($tag), [ 'question/index', 'tag' => $tag], [ 'border' => '1 solid black']);
		}
		return $links;
	}

	/**
	 * Normalizes the user-entered tags.
	 */
	public function normalizeTags($attribute, $params)
	{
		$this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	public function afterSave($insert)
	{
		parent::afterSave($insert);
		(new Tag())->updateFrequency($this->_oldTags, $this->tags);
	}

	public function afterDelete()
	{
		parent::afterDelete();
		(new Tag())->updateFrequency($this->tags, '');
	}

	public function afterFind()
	{
		parent::afterFind();
		$this->_oldTags = $this->tags;
	}

	public function getTagsList()
	{
		$tags = Tag::find()->select(['name'])->all();
		$tagsList = [];
		foreach ($tags as $tag)
		{
			$tagsList[] = $tag->name;
		}
		return $tagsList;
	}

	public static function getAutoCompletion()
	{
		$titles = Question::find()->select(['title'])->all();
		$titlesList = [];
		foreach ($titles as $title)
		{
			$titlesList[] = $title->title;
		}
		return $titlesList;
	}

	public function getTagsLinks()
	{
		$links = explode(',', $this->tags);
		$output = [];
		foreach ($links as $link)
		{
			$output[] = \yii\helpers\Html::a($link, \ yii::$app->controller->createUrl([
								'index',
								'QuestionQuery[tags]' => $link,
			]));
		}
		return implode(', ', $output);
	}

	public function getUrl()
	{
		$url = \yii::$app->controller->createUrl([ '/question/view'
			, 'title' => $this->title]);
		return $url;
	}

}
