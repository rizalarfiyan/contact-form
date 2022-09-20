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
		$this->load->model('count_model');
		$this->data = array_merge(
			$this->data,
			[
				'count' => [
					'user' => $this->count_model->count_users(),
					'submit' => 239,
					'form' => 6,
				]
			]
		);

		$this->load->js(base_url('assets/js/home.min.js'));
		$this->load->view('pages/home', $this->data);
	}
}
