<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('MBobot', 'MHasil'));
	}

	public function index()
	{
        $data['page'] = 'hasil_view';
		$this->load->view('template', $data);

	}

	
	public function hitung()
	{
		$data['mahasiswa'] = $this->M_Alternatif->lihatdata();
		$data['pm'] = $this->M_Gap->hitung($data['mahasiswa']);
		$data['page'] = 'V_perhitungan';
		$this->load->view('template',$data);
	}

}

/* End of file Perhitungan.php */
/* Location: ./application/controllers/Perhitungan.php */