<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_service extends MY_Service
{
	const SESSION_KEY = 'user_id';

	public function __construct()
	{
		$this->load->model('user_model');
	}

	public function loginRules()
	{
		return [
			[
				'field' => 'identity',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[64]'
			]
		];
	}

	public function login($username, $password)
	{
		$user = $this->user_model->getByEmailUsername($username);

		if (!$user) return FALSE;
		if (!password_verify($password, $user->password)) return FALSE;

		$this->session->set_userdata([self::SESSION_KEY => $user->id]);
		$this->updateLastLogin($user->id);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	private function updateLastLogin($id)
	{
		return $this->user_model->update($id, [
			'last_login' => date('Y-m-d H:i:s'),
		]);
	}

	public function currentUser()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) return null;

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$user = $this->user_model->getById($user_id);
		if (!$user) return null;

		$user->avatar = isset($user->email) ? getGravatar($user->email) : '';
		return $user;
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}
