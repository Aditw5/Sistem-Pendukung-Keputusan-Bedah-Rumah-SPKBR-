<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPenilaian');
	}
	public function index()
	{
		
		$data['penilaian'] = $this->MPenilaian->lihatdata();
		$data['page'] = 'V_perhitungan';
		$this->load->view('template', $data);
	}
	public function hasil () {
        $data['hasil_hitung'] =$this->MPenilaian->hitung();
        // print_r($data['hasil_hitung']);
        $data['page'] = 'V_perhitungan';
        $this->load->view('template', $data);

    }
	public function gap()
	{
		$data['penilaian'] = $this->MHasil->hitung();
	}
}

/* End of file Perhitungan.php */
/* Location: ./application/controllers/Perhitungan.php */