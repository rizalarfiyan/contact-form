<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Analytic_service extends MY_Service
{
	public function __construct()
	{
		$this->load->model('user_model');
	}

	public function getTotal() {
		return [
			'user' => $this->user_model->getAllTotal(),
			'submit' => 0,
			'form' => 0,
		];
	}
}
