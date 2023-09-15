<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function nama_warga($id)
{
  $ci= get_instance();
  $ci->load->model('MWarga');

  $ci->db->where('id_warga',$id);
  $query = $ci->db->get('warga');
  $data = $query->row_array();
  return $data['nama'];
}

