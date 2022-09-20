<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->uri->segment(1) == 'auth') show_404();
		$this->output->set_template('default');
	}

	public function login()
	{
		if ($this->isLogin) redirect('dashboard');
		$data = [
			'meta' => [
				'title' => 'Login'
			]
		];

		$this->load->library('form_validation');
		$rules = $this->auth_service->loginRules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('pages/login', $data);
		}

		$identity = $this->input->post('identity');
		$password = $this->input->post('password');
		if ($this->auth_service->login($identity, $password)) redirect('dashboard');

		$this->session->set_flashdata('message_login_error', 'Login failed! The identity or password are incorrect.');
		$this->load->view('pages/login', $data);
	}

	public function logout()
	{
		if (!$this->isLogin) redirect('login');
		$this->auth_service->logout();
		redirect(site_url());
	}
}
