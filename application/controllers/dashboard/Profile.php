<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller
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
			[
				'form' => [
					'total' => 10,
					'submit' => 1289,
				]
			],
		);

		$this->load->view('pages/dashboard/profile', $this->data);
	}
}
