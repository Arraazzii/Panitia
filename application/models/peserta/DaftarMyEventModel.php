<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DaftarMyEventModel extends CI_Model {
 
    var $table = 'form_pendaftaran';
    var $column_order = array(null , 'form_pendaftaran.kode_events', 'judul_acara', 'waktu_mulai', 'waktu_akhir', 'lokasi', null); //set column field database for datatable orderable
    var $column_search = array('form_pendaftaran.kode_events', 'judul_acara', 'lokasi'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_pendaftaran' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
        $this->db->join('user_participant', 'user_participant.ID_PESERTA=form_pendaftaran.ID_PESERTA', 'left');
        $this->db->join('form_event', 'form_event.KODE_EVENTS=form_pendaftaran.KODE_EVENTS', 'left');

        $select = [
            'form_pendaftaran.KODE_EVENTS',
            'form_event.JUDUL_ACARA',
            'form_event.WAKTU_MULAI',
            'form_event.WAKTU_AKHIR',
            'form_event.LOKASI',
            'form_pendaftaran.STATUS',
        ];
        $this->db->select($select);

        $this->db->where($this->table.'.id_peserta', $this->session->userdata('id_peserta'));
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->join('user_participant', 'user_participant.ID_PESERTA=form_pendaftaran.ID_PESERTA', 'left');
        $this->db->join('form_event', 'form_event.KODE_EVENTS=form_pendaftaran.KODE_EVENTS', 'left');
        
        $this->db->where($this->table.'.id_peserta', $this->session->userdata('id_peserta'));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
}