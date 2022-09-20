<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_forms extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
		$this->load->model(['user_model', 'form_model']);
	}

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'VARCHAR',
				'constraint' => 32
			],
			'user_id' => [
				'type' => 'VARCHAR',
				'constraint' => 32
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 32,
				'null' => FALSE,
			],
		]);

		$this->dbforge->add_field('created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->dbforge->add_field('modified_at TIMESTAMP');
		$this->dbforge->add_field('CONSTRAINT FOREIGN KEY (user_id) REFERENCES ' . User_model::$table . '(id)');
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table(Form_model::$table, TRUE);
		printf("✅ Table `" . Form_model::$table . "` created\n");
	}

	public function down()
	{
		$this->dbforge->drop_table(Form_model::$table, TRUE);
		printf("❌ Table `" . Form_model::$table . "` deleted\n");
	}
}
