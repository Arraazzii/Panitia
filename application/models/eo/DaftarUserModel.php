<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DaftarUserModel extends CI_Model {
 
    var $table = 'form_pendaftaran';
    var $column_order = array(null ,'nama','nohp','email','pekerjaan', 'jenis_kelamin', 'judul'); //set column field database for datatable orderable
    var $column_search = array('nama', 'nohp', 'email', 'judul'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('user_participant.id_peserta' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
        $this->db->join('user_participant', 'user_participant.id_peserta=form_pendaftaran.id_peserta', 'left');
        $this->db->join('form_event', 'form_event.kode_events=form_pendaftaran.kode_events', 'left');
        $this->db->join('form_minat', 'form_minat.id_minat=user_participant.id_minat', 'left');

        $select = [
            'user_participant.NAMA',
            'user_participant.NOHP',
            'user_participant.EMAIL',
            'user_participant.PEKERJAAN',
            'user_participant.JENIS_KELAMIN',
            'form_minat.JUDUL'
        ];
        $this->db->distinct();  

        $this->db->select($select);

        $this->db->where('form_event.created_by', $this->session->userdata('id_eo'));
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
        $this->db->join('user_participant', 'user_participant.id_peserta=form_pendaftaran.id_peserta', 'left');
        $this->db->join('form_event', 'form_event.kode_events=form_pendaftaran.kode_events', 'left');
        $this->db->join('form_minat', 'form_minat.id_minat=user_participant.id_minat', 'left');

        $select = [
            'user_participant.NAMA',
            'user_participant.NOHP',
            'user_participant.EMAIL',
            'user_participant.PEKERJAAN',
            'user_participant.JENIS_KELAMIN',
            'form_minat.JUDUL'
        ];
        $this->db->distinct();  

        $this->db->select($select);

        $this->db->where('form_event.created_by', $this->session->userdata('id_eo'));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
}