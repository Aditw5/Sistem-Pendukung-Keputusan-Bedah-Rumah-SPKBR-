<?php
class K extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('MK');
    }
    function index(){
        $x['data']=$this->MK->get_kriteria();
        $this->load->view('nilai',$x);
    }
 
    function get_subkriteria(){
        $id=$this->input->post('id');
        $data=$this->MK->get_subkriteria($id);
        echo json_encode($data);
    }
}