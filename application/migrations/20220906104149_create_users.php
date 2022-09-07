<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 32
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 32
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 64
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => 64
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			)
		));

		$this->dbforge->add_field('created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->dbforge->add_field('last_login TIMESTAMP');
		$this->dbforge->add_key('id', TRUE);

		if ($this->dbforge->create_table('user')) {
			$first_data = [
				'id' => generateId(),
				'name' => 'Administrator',
				'email' => 'admin@mail.com',
				'username' => 'admin',
				'password' => password_hash('password', PASSWORD_DEFAULT)
			];
			$this->db->insert('user', $first_data);
			printf("✅ Table `user` created\n");
		}
	}

	public function down()
	{
		if ($this->dbforge->drop_table('user')) {
			printf("❌ Table `user` deleted\n");
		}
	}
}
