<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form_model extends CI_Model
{
	static $table = 'forms';

	public function insert($data)
	{
		return $this->db->insert(self::$table, $data);
	}

	public function getAllTotal()
	{
		return $this->db->count_all(self::$table);
	}
}
