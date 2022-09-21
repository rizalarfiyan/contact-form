<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form_model extends CI_Model
{
	static $table = 'forms';

	public function insert($data)
	{
		return $this->db->insert(self::$table, $data);
	}

	public function getAllTotal()
	{
		return $this->db->count_all(self::$table);
	}

	public function getAll($next, $byUser, $limit)
	{
		$this->load->model('submit_model');

		$form = self::$table;
		$submit = Submit_model::$table;

		$this->db->select("$form.*, count($submit.id) AS total")
			->from($form)
			->join($submit, "$submit.form_id = $form.id", 'left');

		if ($byUser != '') $this->db->where("$form.user_id", $byUser);
		if ($next != '') $this->db->where("$form.created_at >=", $next);

		$this->db->group_by("$form.id")
			->order_by("$form.created_at")
			->limit($limit);

		$query = $this->db->get();
		if ($query->num_rows() !== 0) {
			return $query->result_array();
		}
		return [];
	}
}
