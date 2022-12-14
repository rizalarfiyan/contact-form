<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Base extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->shouldBeLogin();
		$this->output->set_template('dashboard');
	}

	public function index()
	{
		$this->data = array_merge(
			$this->data,
			[],
		);

		$this->load->view('pages/dashboard/base', $this->data);
	}
}
