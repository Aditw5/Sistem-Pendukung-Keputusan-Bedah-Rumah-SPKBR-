<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 function nama_user($id)
{
	$ci = get_instance();

	$username=$ci->db->query("SELECT username from user1 where id_user1=$id")->row();
	$username= $username->username;

	return $username;

}