<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

	public function profile()
	{
		$this->db->join('form_minat', 'form_minat.ID_MINAT=user_participant.ID_MINAT', 'left');
		$this->db->where('ID_PESERTA', $this->session->userdata('id_peserta'));
		$query = $this->db->get('user_participant');
		return $query->row();
	}

	public function CheckKelengkapan()
	{
		$this->db->where('id_peserta', $this->session->userdata('id_peserta'));
		$query = $this->db->get('user_participant');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			if (!empty($row->JENIS_KELAMIN) & !empty($row->TGL_LAHIR) & !empty($row->STATUS_PERNIKAHAN) & !empty($row->PEKERJAAN) & !empty($row->PENDAPATAN) & !empty($row->ID_MINAT)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function update_profile($update, $id_peserta)
	{
		if ($this->db->update('user_participant', $update, ['id_peserta' => $id_peserta])) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function CheckKeikutsertaan($id_peserta, $kode_events)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->where('kode_events', $kode_events);
		$query = $this->db->get('form_pendaftaran');
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function DaftarEvent($daftar)
	{
		$this->db->insert('form_pendaftaran', $daftar);

		return $this->db->insert_id();
	}

	public function BayarEvent($bayar)
	{
		$query = $this->db->insert('form_pembayaran', $bayar);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function DeletePendaftaran($id_pendaftaran)
	{
		$this->db->delete('form_pendaftaran', ['id_pendaftaran' => $id_pendaftaran]);
	}
}
