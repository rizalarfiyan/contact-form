<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form_service extends CI_Model
{
	public function __construct()
	{
		$this->load->model('form_model');
	}

	public function nameRules()
	{
		return [
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			]
		];
	}

	public function createForm($userId, $name)
	{
		return $this->form_model->insert([
			'id' => generateId(),
			'user_id' => $userId,
			'name' => $name,
		]);
	}
}
