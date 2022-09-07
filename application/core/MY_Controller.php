<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $user;
	public $isLogin;

	function __construct()
	{
		parent::__construct();
		$this->getUser();
	}

	private function getUser()
	{
		$this->user = $this->auth_model->current_user();
		$this->isLogin = (bool) $this->user;
	}

	public function shouldBeLogin() {
		if (!$this->isLogin) {
            return redirect('/login');
        }
	}
}
