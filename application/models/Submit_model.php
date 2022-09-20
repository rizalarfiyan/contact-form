<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Submit_model extends CI_Model
{
	static $table = 'submits';

	public function getAllTotal()
	{
		return $this->db->count_all(self::$table);
	}
}
