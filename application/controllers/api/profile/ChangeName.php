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
				'error' => true,
				'message' => 'Unauthorized user!',
				'data' => null,
			], REST_Controller::HTTP_UNAUTHORIZED);
		}

		$this->load->library('form_validation');
		$this->load->model('profile_model');
		$rule = $this->profile_model->change_name_rules();
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
			$this->profile_model->update_name($this->user->id, $name);
		} catch (\Exception $e) {
			return $this->response([
				'error' => true,
				'message' => 'Some Error in database!',
				'data' => null,
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}

		$this->response([
			'error' => false,
			'message' => 'Change name successfully',
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
