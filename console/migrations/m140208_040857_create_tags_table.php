<?php

use yii\db\Schema;

class m140208_040857_create_tags_table extends \yii\db\Migration
{

	public function up()
	{
		$this->createTable('tags', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(128) not null',
			'frequency' => Schema::TYPE_INTEGER . ' default 1',
		]);
	}

	public function down()
	{
		$this->dropTable('tags');
	}

}
