<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

	public function CountMyEvents()
	{
		$this->db->where('created_by', $this->session->userdata('id_eo'));
		$query = $this->db->get('form_event');
		return $query->num_rows();
	}

	public function CountPeserta()
	{
        $this->db->join('user_participant', 'user_participant.id_peserta=form_pendaftaran.id_peserta', 'left');
        $this->db->join('form_event', 'form_event.kode_events=form_pendaftaran.kode_events', 'left');
        $this->db->join('form_minat', 'form_minat.id_minat=user_participant.id_minat', 'left');

        $this->db->group_by('user_participant.email');  

        $this->db->where('form_event.created_by', $this->session->userdata('id_eo'));
		$query = $this->db->get('form_pendaftaran');
		return $query->num_rows();
	}

	public function CountJadwal()
	{
		$this->db->where('status', 1);
		$this->db->where('created_by', $this->session->userdata('id_eo'));
		$query = $this->db->get('form_event');
		return $query->num_rows();
	}

	public function CountInvoice()
	{
		$this->db->where('created_by', $this->session->userdata('id_eo'));
		$query = $this->db->get('form_invoice');
		return $query->num_rows();
	}

	public function profile()
	{
		$this->db->where('ID_EO', $this->session->userdata('id_eo'));
		$query = $this->db->get('user_eo');
		return $query->row();
	}

	public function update_profile($update, $id_eo)
	{
		if ($this->db->update('user_eo', $update, ['id_eo' => $id_eo])) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function CheckEmail($id_pembayaran)
	{
		$this->db->join('form_pendaftaran', 'form_pendaftaran.ID_PENDAFTARAN=form_pembayaran.ID_PENDAFTARAN', 'left');
		$this->db->join('user_participant', 'user_participant.ID_PESERTA=form_pendaftaran.ID_PESERTA', 'left');
		$this->db->where('form_pembayaran.id_pembayaran', $id_pembayaran);
		$query = $this->db->get('form_pembayaran');
		$row = $query->row();
		return $row->EMAIL;
	}

	public function UpdateBayar($id_pembayaran, $bayar)
	{
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->update('form_pembayaran', $bayar);
	}

	public function CheckIdPendaftaran($id_pembayaran)
	{
		$this->db->join('form_pendaftaran', 'form_pendaftaran.ID_PENDAFTARAN=form_pembayaran.ID_PENDAFTARAN', 'left');
		$this->db->where('form_pembayaran.id_pembayaran', $id_pembayaran);
		$query = $this->db->get('form_pembayaran');
		$row = $query->row();
		return $row->ID_PENDAFTARAN;
	}

	public function UpdateDaftar($id_pendaftaran, $daftar)
	{
		$this->db->where('id_pendaftaran', $id_pendaftaran);
		$this->db->update('form_pendaftaran', $daftar);
		return TRUE;
	}

	public function CheckKodeEvents($id_pendaftaran)
	{
		$this->db->where('id_pendaftaran', $id_pendaftaran);
		$query = $this->db->get('form_pendaftaran');
		$row = $query->row();
		return $row->KODE_EVENTS;
	}

	public function CheckNamaEvents($id_pendaftaran)
	{
		$this->db->join('form_event', 'form_event.KODE_EVENTS=form_pendaftaran.KODE_EVENTS', 'left');
		$this->db->where('id_pendaftaran', $id_pendaftaran);
		$query = $this->db->get('form_pendaftaran');
		$row = $query->row();
		return $row->JUDUL_ACARA;
	}

	public function CheckNama($id_pembayaran)
	{
		$this->db->join('form_pendaftaran', 'form_pendaftaran.ID_PENDAFTARAN=form_pembayaran.ID_PENDAFTARAN', 'left');
		$this->db->join('user_participant', 'user_participant.ID_PESERTA=form_pendaftaran.ID_PESERTA', 'left');
		$this->db->where('form_pembayaran.id_pembayaran', $id_pembayaran);
		$query = $this->db->get('form_pembayaran');
		$row = $query->row();
		return $row->NAMA;
	}

	public function MyEvent()
	{
		$this->db->from('form_event');
    	$this->db->order_by('kode_events', 'ASC');
    	$this->db->where('created_by', $this->session->userdata('id_eo'));
    	return $this->db->get()->result();
	}

	public function tambahInvoice($data)
	{
		$this->db->insert('form_invoice', $data);
		return TRUE;
	}

	public function DeleteInvoice($id_invoice)
	{
		$_id = $this->db->get_where('form_invoice',['id_invoice' => $id_invoice])->row();
        $query = $this->db->delete('form_invoice',['id_invoice'=>$id_invoice]);
        return TRUE;
	}
}
