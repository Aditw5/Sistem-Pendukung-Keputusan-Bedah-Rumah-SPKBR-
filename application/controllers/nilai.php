<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MNilai');
        //$this->load->model(array ('MPenilaian', 'MWarga', 'MSub_kriteria', 'MKriteria', 'MBobot'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $getdata =$this->MNilai->getdatakriteria();
        $data['datakriteria']=$getdata;
        //$data['page'] = 'nilai/nilai_form';
        //$this->load->view('template', $data);
        $this->load->view('nilai/nilai_form', $data);
    }
    
}