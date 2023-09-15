<?php
class MK extends CI_Model{
 
    function get_kriteria(){
        $hasil=$this->db->query("SELECT * FROM kriteria");
        return $hasil;
    }
 
    function get_subkriteria($id){
        $hasil=$this->db->query("SELECT * FROM sub_kriteria WHERE id_subkriteria='$id'");
        return $hasil->result();
    }
}