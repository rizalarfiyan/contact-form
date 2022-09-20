<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_service extends CI_Model
{
	public function __construct()
	{
		$this->load->model('user_model');
	}

	public function changePasswordRules()
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

	public function updatePassword($id, $password)
	{
		return $this->user_model->update($id, [
			'password' => password_hash($password, PASSWORD_DEFAULT),
		]);
	}

	public function changeNameRules()
	{
		return [
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			]
		];
	}

	public function updateName($id, $name)
	{
		return $this->user_model->update($id, [
			'name' => $name,
		]);
	}
}
