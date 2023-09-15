<?php 
class MHasil extends CI_Model
{
	function lihatdata()
	{
		return $this->db->get('penilaian')->result();
	}
		
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function hapus($id,$table)
	{
		$this->db->where($id);
		$this->db->delete($table);
	}

	function edit($id,$table)
	{
		return $this->db->get_where($table,$id);
	}
	
}

 ?>