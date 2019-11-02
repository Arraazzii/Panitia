<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPageModel extends CI_Model {

	public function checkEo($dataEo)
	{
		$query = $this->db->get_where('user_eo', $dataEo);
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}  
	}

	public function checkPeserta($data)
	{
		$query = $this->db->get_where('user_participant', $data);
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}  
	}

	public function registerEo($data)
	{
		$this->load->database();
		$this->db->insert('user_eo', $data);

		return $this->db->insert_id();
	}

	public function registerPeserta($data)
	{
		$this->load->database();
		$this->db->insert('user_participant', $data);

		return $this->db->insert_id();
	}

	function changeActiveStatePeserta($key)
	{
		$this->load->database();
		$data = array(
			'status' => 1
		);

		$this->db->where('md5(id_peserta)', $key);
		$this->db->update('user_participant', $data);

		return TRUE;
	}

	function changeActiveStateEo($key)
	{
		$this->load->database();
		$data = array(
			'status' => 1
		);

		$this->db->where('md5(id_eo)', $key);
		$this->db->update('user_eo', $data);

		return TRUE;
	}

	public function CheckPw($pw_lama, $id)
	{
		if ($this->session->userdata('id_peserta')) {
            $this->db->where('id_peserta', $id);
			$this->db->where('password', $pw_lama);
			$query = $this->db->get('user_participant');
			if ($query->num_rows() > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
        } else {
        	$this->db->where('id_eo', $id);
			$this->db->where('password', $pw_lama);
			$query = $this->db->get('user_eo');
			if ($query->num_rows() > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
        }
		
	}

	public function UpdatePw($data, $id)
	{
		if ($this->session->userdata('id_peserta')) {
			$this->db->update('user_participant', $data, ['id_peserta' => $id]);
			return TRUE;
		} else {
			$this->db->update('user_eo', $data, ['id_eo' => $id]);
			return TRUE;
		}
	}
}
