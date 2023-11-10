<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan_model extends CI_Model
{

	private $_table = 'lapangan';

	public function get_lapangan()
	{
		return $this->db->select('l.name as lapangan_name, k.name as kategori_name, l.id, l.kode, l.duration, l.price, l.unit, l.photo', false)
			->join('kategori k', 'k.id = l.kategori_id')
			->get('lapangan l')
			->result();
	}

	public function get_data_lapangan_by_id($id)
	{
		return $this->db->where('l.id', $id)
			->select('k.id as kategori_id, l.id as lapangan_id, l.name as lapangan_name, k.name as kategori_name, l.id, l.kode, l.duration, l.price, l.unit, l.photo', false)
			->join('kategori k', 'k.id = l.kategori_id')
			->get('lapangan l')
			->row();
	}

	public function tambah($foto)
	{
		$this->db->insert($this->_table, [
			'kode' 			=> $this->input->post('kode'),
			'name' 			=> $this->input->post('name'),
			'kategori_id'	=> $this->input->post('kategori_id'),
			'duration'		=> $this->input->post('duration'),
			'price'			=> $this->input->post('price'),
			'unit'			=> $this->input->post('unit'),
			'photo'			=> $foto['file_name']
		]);

		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	public function ubah()
	{
		$this->db->where('id', $this->input->post('id'))
			->update($this->_table, [
				'kode' 			=> $this->input->post('kode'),
				'name' 			=> $this->input->post('name'),
				'kategori_id'	=> $this->input->post('kategori_id'),
				'duration'		=> $this->input->post('duration'),
				'price'			=> $this->input->post('price'),
				'unit'			=> $this->input->post('unit'),
			]);

		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	public function hapus()
	{
		$this->db->where('id', $this->input->post('id'))
			->delete($this->_table);

		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}
}

/* End of file lapangan_model.php */
/* Location: ./application/models/lapangan_model.php */
