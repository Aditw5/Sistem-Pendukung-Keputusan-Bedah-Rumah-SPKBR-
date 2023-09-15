<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MSub_kriteria extends CI_Model
{

    public $table = 'sub_kriteria';
    public $id = 'id_subkriteria';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_kriteria($id)
    {
        $this->db->where("id_kriteria",$id);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_subkriteria', $q);
	$this->db->or_like('id_kriteria', $q);
	$this->db->or_like('nama_subkriteria', $q);
	$this->db->or_like('jenis_subkriteria', $q);
    $this->db->or_like('nilai_maks', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->select('s.*,k.nama_kriteria');
    $this->db->from('sub_kriteria s');
    $this->db->join('kriteria k', 'k.id_kriteria = s.id_kriteria');

        $this->db->order_by('s.id_subkriteria', $this->order);
        $this->db->like('s.id_subkriteria', $q);
	$this->db->or_like('s.id_kriteria', $q);
	$this->db->or_like('s.nama_subkriteria', $q);
	$this->db->or_like('s.jenis_subkriteria', $q);
    $this->db->or_like('s.nilai_maks', $q);
	$this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file MSub_kriteria.php */
/* Location: ./application/models/MSub_kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-12 06:05:18 */
/* http://harviacode.com */