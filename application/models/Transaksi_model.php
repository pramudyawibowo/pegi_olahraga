<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	private $_table = 'transaksi';

	public function get_transaksi()
	{
		$query = $this->db->select('t.id, t.duration, t.total, t.waktu, t.status, t.renter_name, u.name as user_name, l.kode, l.name as lapangan_name, l.unit as lapangan_unit', false)
			->join('lapangan l', 'l.id = t.lapangan_id')
			->join('user u', 'u.id = t.user_id');

		if (in_array($this->session->userdata('level'), ['admin', 'manager'])) {
			
		} else {
			$query->where('t.user_id', $this->session->userdata('user_id'));
		}
		return $query->get('transaksi t')->result();
	}

	public function get_data_transaksi_by_id($id)
	{
		return $this->db->where('t.id', $id)
			->select('t.id, t.duration, t.total, t.waktu, t.status, t.renter_name, u.name as user_name, l.kode, l.name as lapangan_name, l.unit as lapangan_unit', false)
			->join('lapangan l', 'l.id = t.lapangan_id')
			->join('user u', 'u.id = t.user_id')
			->get('transaksi t')
			->row();
	}

	public function tambah()
	{
		$this->load->model('lapangan_model');
		$lapangan = $this->lapangan_model->get_data_lapangan_by_id($this->input->post('lapangan_id'));
		$total = $lapangan->price * $this->input->post('duration');
		$this->db->insert($this->_table, [
			'lapangan_id'	=> $this->input->post('lapangan_id'),
			'user_id'		=> $this->session->userdata('user_id'),
			'renter_name'	=> $this->input->post('renter_name'),
			'duration'		=> $this->input->post('duration'),
			'waktu'			=> $this->input->post('waktu'),
			'total'			=> $total,
			'status'		=> 1,
			'created_at'	=> date('Y-m-d H:i:s')
		]);

		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	public function update_status($status)
	{
		$this->db->where('id', $this->input->post('id'))
			->update($this->_table, [
				'status' => $status
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

/* End of file transaksi_model.php */
/* Location: ./application/models/transaksi_model.php */
