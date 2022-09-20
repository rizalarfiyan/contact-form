<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Analytic_service extends MY_Service
{
	public function __construct()
	{
		$this->load->model('user_model');
		$this->load->model('form_model');
		$this->load->model('submit_model');
	}

	public function getTotal() {
		return [
			'user' => $this->user_model->getAllTotal(),
			'form' => $this->form_model->getAllTotal(),
			'submit' => $this->submit_model->getAllTotal(),
		];
	}
}
