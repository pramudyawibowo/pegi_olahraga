<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

	private $_table = "kategori";

	public function get_kategori()
	{
		return $this->db->get($this->_table)
			->result();
	}

	public function get_data_kategori_by_id($id)
	{
		return $this->db->where('id', $id)
			->get($this->_table)
			->row();
	}

	public function tambah()
	{
		$this->db->insert($this->_table, [
			'name' => $this->input->post('name'),
		]);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$this->db->where('id', $this->input->post('id'))
			->update($this->_table, [
				'name' => $this->input->post('name')
			]);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id', $this->input->post('id'))
			->delete($this->_table);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */
