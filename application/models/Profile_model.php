<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model
{
	private $_table = 'user';

	public function change_password_rules()
	{
		return [
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[64]'
			],
			[
				'field' => 'newPassword',
				'label' => 'New Password',
				'rules' => 'required|max_length[64]'
			]
		];
	}

	public function update_password($id, $password)
	{
		$data = [
			'password' => password_hash($password, PASSWORD_DEFAULT),
		];

		return $this->db->update($this->_table, $data, ['id' => $id]);
	}

	public function change_name_rules()
	{
		return [
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			]
		];
	}

	public function update_name($id, $name)
	{
		$data = [
			'name' => $name,
		];

		return $this->db->update($this->_table, $data, ['id' => $id]);
	}
}
