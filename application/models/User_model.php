<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	static $table = 'users';

	static $admin = 'admin';
	static $guest = 'guest';

	public function getByEmailUsername($username)
	{
		return $this->db->where('email', $username)
			->or_where('username', $username)
			->get(self::$table)
			->row();
	}

	public function getById($id)
	{
		return $this->db->where('id', $id)
			->get(self::$table)
			->row();
	}

	public function update($id, $data) {
		return $this->db->update(self::$table, $data, [
			'id' => $id
		]);
	}

	public function getAllTotal()
	{
		return $this->db->count_all(self::$table);
	}
}
