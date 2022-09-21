<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form_service extends MY_Service
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

	public function getAll($user, $nextKey = '')
	{
		$limit = 6;
		$this->load->service('auth_service');
		$byUser = $this->auth_service->isAdmin($user->role) ? '' : $user->id;
		$key = $nextKey === '' ? '' : encryptDecrypt($nextKey);
		$getData = $this->form_model->getAll($key, $byUser, $limit + 1);
		$next = count($getData) > $limit ? encryptDecrypt($getData[count($getData) - 1]['created_at'], true) : '';

		$data = array_map(function($val) {
			return [
				'id' => $val["id"],
				'name' => $val["name"],
				'total' => $val["total"],
			];
		}, array_splice($getData, 0, $limit));

		return [
			'content' => $data,
			'total' => count($data),
			'next' => $next,
		];
	}
}
