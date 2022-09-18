<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $user;
	public $isLogin;
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->getUser();
		$this->setData();
	}

	private function getUser()
	{
		$this->user = $this->auth_model->current_user();
		$this->isLogin = (bool) $this->user;
	}

	private function setData()
	{
		$this->data = [
			'isLogin' => $this->isLogin,
			'user' => $this->user,
		];
	}

	public function shouldBeLogin()
	{
		if (!$this->isLogin) {
			return redirect('/login');
		}
	}

	public function shouldBeAdmin()
	{
		$this->shouldBeLogin();
		if ($this->user->role !== Auth_model::$ADMIN) {
			show_403();
		}
	}

	public function shouldBeAjaxRequest() {
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
	}
}
