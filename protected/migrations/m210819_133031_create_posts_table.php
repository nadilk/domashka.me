<?php

class m210819_133031_create_posts_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_posts', array(
            'id' => 'pk',
            'content' => 'string NOT NULL',
            'created_at' => 'timestamp',
        ));
	}

	public function down()
	{
		echo "m210819_133031_create_posts_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}