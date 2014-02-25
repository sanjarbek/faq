<?php

namespace common\models;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends \yii\db\ActiveRecord
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tags';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['frequency'], 'integer'],
			[['name'], 'string', 'max' => 128]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Название',
			'frequency' => 'Частота',
		];
	}

	/**
	 * @return array a list of links that point to the post list filtered by every tag of this post
	 */
	public function getTagLinks()
	{
		$links = array();
		foreach (Tag::string2array($this->tags) as $tag)
			$links[] = \yii\helpers\Html::a(\yii\helpers\Html::encode($tag), ['post/index', 'tag' => $tag]);
		return $links;
	}

	/**
	 * Normalizes the user-entered tags.
	 */
	public function normalizeTags($attribute, $params)
	{
		$this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	public static function string2array($tags)
	{
		return preg_split('/\s*,\s*/', trim($tags), -1, PREG_SPLIT_NO_EMPTY);
	}

	public static function array2string($tags)
	{
		return implode(',', $tags);
	}

	public function updateFrequency($oldTags, $newTags)
	{
		$oldTags = self::string2array($oldTags);
		$newTags = self::string2array($newTags);
		$this->addTags(array_values(array_diff($newTags, $oldTags)));
		$this->removeTags(array_values(array_diff($oldTags, $newTags)));
	}

	public function addTags($tags)
	{
		$this->updateAllCounters(['frequency' => 1], ['in', 'name', $tags]);
		foreach ($tags as $name)
		{
			if (!Tag::find()->where('name=:name', [':name' => $name])->one())
			{
				$tag = new Tag;
				$tag->name = $name;
				$tag->frequency = 1;
				$tag->save();
			}
		}
	}

	public function removeTags($tags)
	{
		if (empty($tags))
			return;
		$this->updateAllCounters(['frequency' => -1], ['in', 'name', $tags]);
		$this->deleteAll('frequency<=0');
	}

}
