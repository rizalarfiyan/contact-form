<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class ChangeName extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index_post()
	{
		if (!$this->isLogin) {
			return $this->response([
				'status' => false,
				'message' => 'Unauthorized user!'
			], REST_Controller::HTTP_UNAUTHORIZED);
		}

		$this->response([
			'status' => false,
			'message' => 'Success'
		], 404);
	}

	public function index_get()
	{
		show_404();
	}

	public function index_put()
	{
		show_404();
	}

	public function index_delete()
	{
		show_404();
	}

	public function index_patch()
	{
		show_404();
	}

	public function index_options()
	{
		show_404();
	}
}
