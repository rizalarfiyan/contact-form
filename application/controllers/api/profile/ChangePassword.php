<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class ChangePassword extends REST_Controller
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
				'message' => 'Unauthorized',
				'data' => null,
			], REST_Controller::HTTP_UNAUTHORIZED);
		}

		$this->load->library('form_validation');
		$this->load->model('profile_model');
		$rule = $this->profile_model->change_password_rules();
		$this->form_validation->set_rules($rule);
		if ($this->form_validation->run() == FALSE) {
			return $this->response([
				'error' => true,
				'message' => 'Error Validation!',
				'data' => [
					"password" => strip_tags(form_error('password')),
					"newPassword" => strip_tags(form_error('newPassword')),
				],
			], REST_Controller::HTTP_BAD_REQUEST);
		}

		$password = $this->input->post('password');
		$newPassword = $this->input->post('newPassword');
		if (!password_verify($password, $this->user->password)) {
			return $this->response([
				'error' => true,
				'message' => 'Password doesn\'t match!',
				'data' => null,
			], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
		}

		try {
			$this->profile_model->update_password($this->user->id, $newPassword);
		} catch (\Exception $e) {
			return $this->response([
				'error' => true,
				'message' => 'Some Error in database!',
				'data' => null,
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}

		return $this->response([
			'error' => false,
			'message' => 'Change password successfully',
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
