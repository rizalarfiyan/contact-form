<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->set_template('default');
	}

	public function index()
	{
		$this->load->view('pages/home');
	}
}
