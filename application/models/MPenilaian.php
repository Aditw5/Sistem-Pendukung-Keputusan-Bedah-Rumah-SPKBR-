<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MPenilaian extends CI_Model
{

    public $table = 'penilaian';
    public $id = 'id_penilaian';
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

    function getdatasub($id_kriteria) 
    {
        $query = $this->db->query("SELECT * FROM sub_kriteria WHERE 
        '$id_kriteria' ORDER BY sub_kriteria ASC");

        return $query->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_penilaian', $q);
	$this->db->or_like('id_warga', $q);
	$this->db->or_like('id_kriteria', $q);
	$this->db->or_like('id_subkriteria', $q);
	$this->db->or_like('nilai_bobot', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function hitung() {
        $sql = "SELECT DISTINCT(pn.id_warga),wg.nama, 
        (SELECT SUM(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Core Factor' AND pn2.id_kriteria=5) total_kriteriacf_rumah,
        (SELECT COUNT(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Core Factor' AND pn2.id_kriteria=5) jumlah_kriteriacf_rumah,
        (SELECT SUM(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Secondary Factor' AND pn2.id_kriteria=5) total_kriteriasf_rumah,
        (SELECT COUNT(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Secondary Factor' AND pn2.id_kriteria=5) jumlah_kriteriasf_rumah,
        
        (SELECT SUM(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Core Factor' AND pn2.id_kriteria=6) total_kriteriacf_pemilik,
        (SELECT COUNT(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Core Factor' AND pn2.id_kriteria=6) jumlah_kriteriacf_pemilik,
        (SELECT SUM(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Secondary Factor' AND pn2.id_kriteria=6) total_kriteriasf_pemilik,
        (SELECT COUNT(pn2.pembobotan) FROM penilaian pn2 LEFT JOIN sub_kriteria sk ON sk.id_subkriteria=pn2.id_subkriteria WHERE pn2.id_warga=pn.id_warga AND sk.jenis_subkriteria='Secondary Factor' AND pn2.id_kriteria=6) jumlah_kriteriasf_pemilik
        FROM penilaian pn 
        LEFT JOIN warga wg ON pn.id_warga=wg.id_warga ";

        $query=$this->db->query($sql);
        return $query->result();

    }

    function lihatdata()
	{
		return $this->db->get('penilaian')->result();
	}
		

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->select('p.*,k.nama_kriteria, s.nama_subkriteria, w.nama');
    $this->db->from('penilaian p');
    $this->db->join('kriteria k', 'k.id_kriteria = p.id_kriteria');
    $this->db->join('sub_kriteria s', 's.id_subkriteria = p.id_subkriteria');
    $this->db->join('warga w', 'w.id_warga = p.id_warga');


    $this->db->order_by('p.id_penilaian', $this->order);
    $this->db->like('p.id_penilaian', $q);
	$this->db->or_like('p.id_warga', $q);
	$this->db->or_like('p.id_kriteria', $q);
	$this->db->or_like('p.id_subkriteria', $q);
	$this->db->or_like('p.nilai_bobot', $q);
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

/* End of file MPenilaian.php */
/* Location: ./application/models/MPenilaian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-12 06:24:18 */
/* http://harviacode.com */