<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserQuery represents the model behind the search form about User.
 */
class UserQuery extends Model
{
	public $id;
	public $firstname;
	public $second;
	public $username;
	public $auth_key;
	public $password_hash;
	public $password_reset_token;
	public $email;
	public $role;
	public $status;
	public $created_at;
	public $updated_at;

	public function rules()
	{
		return [
			[['id', 'role', 'status', 'created_at', 'updated_at'], 'integer'],
			[['firstname', 'second', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'firstname' => 'Имя',
			'second' => 'Second',
			'username' => 'Логин',
			'auth_key' => 'Auth Key',
			'password_hash' => 'Password Hash',
			'password_reset_token' => 'Password Reset Token',
			'email' => 'Электронный адрес',
			'role' => 'Роль',
			'status' => 'Статус',
			'created_at' => 'Создан',
			'updated_at' => 'Редактирован',
		];
	}

	public function search($params)
	{
		$query = User::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'firstname', true);
		$this->addCondition($query, 'second', true);
		$this->addCondition($query, 'username', true);
		$this->addCondition($query, 'auth_key', true);
		$this->addCondition($query, 'password_hash', true);
		$this->addCondition($query, 'password_reset_token', true);
		$this->addCondition($query, 'email', true);
		$this->addCondition($query, 'role');
		$this->addCondition($query, 'status');
		$this->addCondition($query, 'created_at');
		$this->addCondition($query, 'updated_at');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
