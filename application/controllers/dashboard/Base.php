<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Base extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->shouldBeLogin();
		$this->output->set_template('default');
	}

	public function index()
	{
		$this->load->view('pages/dashboard/base');
	}
}
