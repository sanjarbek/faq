<?php

use yii\db\Schema;

class m140201_054445_create_questions_table extends \yii\db\Migration
{

	public function safeUp()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql')
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('questions', [
			'id' => Schema::TYPE_PK,
			'title' => Schema::TYPE_STRING . '(100) UNIQUE NOT NULL',
			'content' => Schema::TYPE_TEXT . ' NOT NULL',
			'fio' => Schema::TYPE_STRING . '(40)',
			'email' => Schema::TYPE_STRING . '(30)',
			'tags' => Schema::TYPE_TEXT,
			'answer' => Schema::TYPE_TEXT,
			'type' => Schema::TYPE_SMALLINT . ' default 0',
			'status' => Schema::TYPE_SMALLINT . ' default 0',
			'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
			'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
			'viewed' => Schema::TYPE_INTEGER . ' default 0',
		]);
	}

	public function safeDown()
	{
		$this->dropTable('questions');
	}

}
