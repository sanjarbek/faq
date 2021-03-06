<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * Class User
 * @package common\models
 *
 * @property integer $id
 * @property string $firstname
 * @property string $secondname
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{

	/**
	 * @var string the raw password. Used to collect password input and isn't saved in database
	 */
	public $password;

	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;
	const ROLE_ADMIN = 0;
	const ROLE_MODERATOR = 1;
	const ROLE_USER = 2;

	public static function tableName()
	{
		return 'users';
	}

	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
				],
			],
		];
	}

	/**
	 * Finds an identity by the given ID.
	 *
	 * @param string|integer $id the ID to be looked for
	 * @return IdentityInterface|null the identity object that matches the given ID.
	 */
	public static function findIdentity($id)
	{
		return static::find($id);
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return null|User
	 */
	public static function findByUsername($username)
	{
		return static::find(['username' => $username, 'status' => static::STATUS_ACTIVE]);
	}

	/**
	 * @return int|string|array current user ID
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}

	/**
	 * @return string current user auth key
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
	 * @param string $authKey
	 * @return boolean if auth key is valid for current user
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * @param string $password password to validate
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return Security::validatePassword($password, $this->password_hash);
	}

	public function rules()
	{
		return [
			['status', 'default', 'value' => self::STATUS_ACTIVE],
			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
			['role', 'default', 'value' => self::ROLE_USER],
			['role', 'in', 'range' => [
					self::ROLE_USER,
					self::ROLE_MODERATOR,
					self::ROLE_ADMIN
				]
			],
			['username', 'filter', 'filter' => 'trim'],
			['username', 'required'],
			['username', 'string', 'min' => 2, 'max' => 255],
			['email', 'filter', 'filter' => 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'unique', 'message' => 'Этот электронный адрес уже занят.', 'on' => 'signup'],
			['email', 'exist', 'message' => 'Нету пользователя с таким электронным адресом.', 'on' => 'requestPasswordResetToken'],
			['password', 'required'],
			['password', 'string', 'min' => 6],
		];
	}

	public function scenarios()
	{
		return [
			'default' => [],
			'registration' => ['username', 'firstname', 'secondname', 'password', 'email', 'role', 'status'],
			'updating' => ['username', 'email', 'firstname', 'secondname', 'status', 'role'],
			'resetPassword' => ['password'],
			'requestPasswordResetToken' => ['email'],
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
			'secondname' => 'Фамилия',
			'username' => 'Логин',
			'password' => 'Пароль',
			'email' => 'Электронный адрес',
			'status' => 'Статус',
			'role' => 'Роль',
			'created_at' => 'Создан',
			'updated_at' => 'Редактирован',
		];
	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert))
		{
			if (($this->isNewRecord || $this->getScenario() === 'resetPassword') && !empty($this->password))
			{
				$this->password_hash = Security::generatePasswordHash($this->password);
			}
			if ($this->isNewRecord)
			{
				$this->auth_key = Security::generateRandomKey();
			}
			return true;
		}
		return false;
	}

	public static function getRoleOptions()
	{
		return [
			self::ROLE_ADMIN => 'Администратор',
			self::ROLE_MODERATOR => 'Модератор',
			self::ROLE_USER => 'Пользователь',
		];
	}

	public function getRoleText()
	{
		$roleOptions = self::getRoleOptions();
		return isset($roleOptions[$this->role]) ? $roleOptions[$this->role] : 'Нету такой роли ' . $this->role;
	}

	public static function getStatusOptions()
	{
		return [
			self::STATUS_DELETED => 'Удален',
			self::STATUS_ACTIVE => 'Активен',
		];
	}

	public function getStatusText()
	{
		$statusOptions = self::getStatusOptions();
		return isset($statusOptions[$this->status]) ? $statusOptions[$this->status] : 'Нету такого статуса ' . $this->status;
	}

	public function getFullname()
	{
		return $this->secondname . ' ' . $this->firstname;
	}

}
