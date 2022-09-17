<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->set_template('default');
	}

	public function index()
	{
		$data = [
			'meta' => [
				'title' => 'Contact Form',
			],
			'count' => [
				'user' => 1029,
				'submit' => 239,
				'form' => 6,
			],
			'isLogin' => $this->isLogin,
			'user' => $this->user,
		];
		$this->load->js(base_url('assets/js/home.min.js'));
		$this->load->view('pages/home', $data);
	}
}
