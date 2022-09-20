<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->set_template('default');
		$this->load->service('analytic_service');
	}

	public function index()
	{
		$this->data = array_merge(
			$this->data,
			[
				'count' => $this->analytic_service->getTotal(),
			]
		);

		$this->load->js(base_url('assets/js/home.min.js'));
		$this->load->view('pages/home', $this->data);
	}
}
