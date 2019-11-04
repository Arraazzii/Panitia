<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventModel extends CI_Model {
    
    public function Minat()
    {
    	$this->db->from('form_minat');
    	$this->db->order_by('id_minat', 'ASC');
    	return $this->db->get()->result();
    }

    public function tambahEvents($data)
    {
        $this->db->insert('form_event', $data);
        return TRUE;
    }

    public function editEvents($data, $kode_event)
    {
        $this->db->update('form_event', $data, ['kode_events' => $kode_event]);
        return TRUE;
    }

    public function countKodeEvents()
    {
    	$query = $this->db->get('form_event');
    	return $query->num_rows();
    }

    public function eventNow()
    {

        if ($this->session->userdata('id_eo')) {
            $this->db->where('created_by', $this->session->userdata('id_eo'));
        }
        if (!$this->session->userdata('id_eo')) {
            $this->db->where('status', 1);
        }
        $this->db->limit(4);
    	$this->db->order_by('kode_events', 'DESC');
    	$this->db->from('form_event');
    	$query = $this->db->get();
    	if ($query->num_rows() > 0) {
    		return $query->result();
    	} else {
    		return FALSE;
    	}
    }

    public function upcoming()
    {

        if ($this->session->userdata('id_eo')) {
            $this->db->where('created_by', $this->session->userdata('id_eo'));
        }
        $this->db->limit(4);
        $this->db->where('status', 2);
        $this->db->order_by('kode_events', 'DESC');
        $this->db->from('form_event');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_current_page($limit, $start) {
        $this->db->limit($limit, $start);
    	if ($this->session->userdata('id_eo')) {
            $this->db->where('created_by', $this->session->userdata('id_eo'));
        }
        if (!$this->session->userdata('id_eo')) {
            $this->db->where('status', 1);
        }
        $this->db->order_by('kode_events', 'DESC');
        $query = $this->db->get('form_event');
        $rows = $query->result();
 
        if ($query->num_rows() > 0) 
        {
            foreach ($rows as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function totalEvents() 
    {
    	if ($this->session->userdata('id_eo')) {
            $this->db->where('created_by', $this->session->userdata('id_eo'));
            $this->db->where('status', 0);
        }
        $this->db->where('status', 1);
        return $this->db->count_all('form_event');
    }

    public function get_current_page_upcoming($limit, $start) {
        $this->db->limit($limit, $start);
        if ($this->session->userdata('id_eo')) {
            $this->db->where('created_by', $this->session->userdata('id_eo'));
        }
        $this->db->where('status', 2);
        $this->db->order_by('kode_events', 'DESC');
        $query = $this->db->get('form_event');
        $rows = $query->result();
 
        if ($query->num_rows() > 0) 
        {
            foreach ($rows as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function totalEventsUpcoming() 
    {
        if ($this->session->userdata('id_eo')) {
            $this->db->where('created_by', $this->session->userdata('id_eo'));
        }
        $this->db->where('status', 0);
        return $this->db->count_all('form_event');
    }

    public function detailEvent($kode)
    {
        $this->db->join('form_minat', 'form_minat.id_minat=form_event.id_minat', 'left');
        $this->db->where('kode_events', $kode);
        $query = $this->db->get('form_event');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return $query->num_rows();
        }
    }

    public function countPeserta($kode)
    {
        $this->db->where('kode_events', $kode);
        $this->db->where('status', 1);
        $query = $this->db->get('form_pendaftaran');
        return $query->num_rows();
    }

    public function nonAktifkan($kode_event, $data)
    {
        $query = $this->db->update('form_event', $data, ['kode_events' => $kode_event]);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Aktifkan($kode_event, $data)
    {
        $query = $this->db->update('form_event', $data, ['kode_events' => $kode_event]);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteEvent($kode_event)
    {
        $_id = $this->db->get_where('form_event',['kode_events' => $kode_event])->row();
        $query = $this->db->delete('form_event',['kode_events'=>$kode_event]);
        return TRUE;
    }
}
