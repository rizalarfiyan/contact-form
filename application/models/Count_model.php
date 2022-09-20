<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Count_model extends CI_Model
{
	private $_user = 'user';

	public function count_users()
	{
		return $this->db->count_all($this->_user);
	}
}
