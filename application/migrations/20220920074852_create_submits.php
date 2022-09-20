<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_submits extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
		$this->load->model(['form_model', 'submit_model']);
	}

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'VARCHAR',
				'constraint' => 32
			],
			'form_id' => [
				'type' => 'VARCHAR',
				'constraint' => 32
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 32,
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 64,
				'null' => FALSE,
			],
			'message' => [
				'type' => 'VARCHAR',
				'constraint' => 1000,
				'null' => FALSE,
			],
		]);

		$this->dbforge->add_field('created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->dbforge->add_field('modified_at TIMESTAMP');
		$this->dbforge->add_field('CONSTRAINT FOREIGN KEY (form_id) REFERENCES ' . Form_model::$table . '(id)');
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table(Submit_model::$table, TRUE);
		printf("✅ Table `" . Submit_model::$table . "` created\n");
	}

	public function down()
	{
		$this->dbforge->drop_table(Submit_model::$table, TRUE);
		printf("❌ Table `" . Submit_model::$table . "` deleted\n");
	}
}
