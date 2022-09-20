<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	const SESSION_KEY = 'user_id';

	public function __construct()
	{
		$this->load->model('user_model');
	}

	public function login_rules()
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

	function get_gravatar($email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = [])
	{
		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5(strtolower(trim($email)));
		$url .= "?s=$s&d=$d&r=$r";
		if ($img) {
			$url = '<img src="' . $url . '"';
			foreach ($atts as $key => $val)
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}

	public function login($username, $password)
	{
		$this->db->where('email', $username)->or_where('username', $username);
		$query = $this->db->get(User_model::$table);
		$user = $query->row();

		if (!$user) return FALSE;
		if (!password_verify($password, $user->password)) return FALSE;

		$this->session->set_userdata([self::SESSION_KEY => $user->id]);
		$this->_update_last_login($user->id);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) return null;

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where(User_model::$table, ['id' => $user_id]);
		$user = $query->row();
		if (!$user) return null;
		return $this->user_data($user);
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	public function user_data($user)
	{
		$user->avatar = isset($user->email) ? $this->get_gravatar($user->email) : '';
		return $user;
	}

	private function _update_last_login($id)
	{
		$data = [
			'last_login' => date('Y-m-d H:i:s'),
		];

		return $this->db->update(User_model::$table, $data, ['id' => $id]);
	}
}
