<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	private $_table = "user";
	public function get_user()
	{
		return $this->db->select('user.*, level.name as level')
			->join('level', 'level.id = user.level_id')
			->get($this->_table)
			->result();
	}

	public function tambah()
	{
		$this->db->insert($this->_table, [
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'name' => $this->input->post('name'),
			'level_id' => $this->input->post('level_id'),
		]);

		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	public function get_data_user_by_id($id)
	{
		return $this->db->where('id', $id)
			->get($this->_table)
			->row();
	}

	public function ubah()
	{
		$user = $this->db->where('id', $this->input->post('id'))
			->get($this->_table)
			->row();
		$this->db->where('id', $this->input->post('id'))
			->update($this->_table, [
				'username' => $this->input->post('username') ?? $user->username,
				'name' => $this->input->post('name') ?? $user->name,
				'password' => $this->input->post('password') ? password_hash($this->input->post('password'), PASSWORD_DEFAULT) : $user->password,
				'level_id' => $this->input->post('level_id') ?? $user->level_id,
			]);

		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
}
                        
/* End of file User.php */
