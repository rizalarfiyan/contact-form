<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		shouldBeLogin();
		$this->output->set_template('default');
	}

	public function index()
	{
		$this->load->view('pages/dashboard/base');
	}
}
