<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class AddForm extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index_post()
	{
		if (!$this->isLogin) {
			return $this->response([
				'error' => true,
				'message' => 'Unauthorized user!',
				'data' => null,
			], REST_Controller::HTTP_UNAUTHORIZED);
		}

		$this->load->service('form_service');
		$this->load->library('form_validation');

		$rule = $this->form_service->nameRules();
		$this->form_validation->set_rules($rule);
		if ($this->form_validation->run() == FALSE) {
			return $this->response([
				'error' => true,
				'message' => 'Error Validation!',
				'data' => [
					"name" => strip_tags(form_error('name')),
				],
			], REST_Controller::HTTP_BAD_REQUEST);
		}

		$name = $this->input->post('name');
		try {
			$this->form_service->createForm($this->user->id, $name);
		} catch (\Exception $e) {
			return $this->response([
				'error' => true,
				'message' => 'Some Error in database!',
				'data' => null,
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}

		$this->response([
			'error' => false,
			'message' => 'Add Form successfully',
			'data' => null,
		], REST_Controller::HTTP_OK);
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
