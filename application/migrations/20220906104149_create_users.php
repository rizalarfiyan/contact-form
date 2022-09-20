<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
		$this->load->model(['user_model']);
	}

	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'VARCHAR',
				'constraint' => 32,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 32,
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 64,
				'unique' => TRUE,
				'null' => FALSE,
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 64,
				'unique' => TRUE,
				'null' => FALSE,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'role' => [
				'type' => 'ENUM("' . User_model::$admin . '","' . User_model::$guest . '")',
				'default' => User_model::$guest,
				'null' => FALSE,
			],
		]);

		$this->dbforge->add_field('created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->dbforge->add_field('last_login TIMESTAMP');
		$this->dbforge->add_key('id', TRUE);

		if ($this->dbforge->create_table(User_model::$table)) {
			$first_data = [
				'id' => generateId(),
				'name' => 'Administrator',
				'email' => 'admin@mail.com',
				'username' => 'admin',
				'password' => password_hash('password', PASSWORD_DEFAULT),
				'role' => User_model::$admin,
			];
			$this->db->insert(User_model::$table, $first_data);
			printf("✅ Table `" . User_model::$table . "` created\n");
		}
	}

	public function down()
	{
		if ($this->dbforge->drop_table(User_model::$table)) {
			printf("❌ Table `" . User_model::$table . "` deleted\n");
		}
	}
}
