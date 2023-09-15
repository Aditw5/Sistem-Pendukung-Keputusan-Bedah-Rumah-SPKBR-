<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('MPenilaian');
        $this->load->model(array ('MPenilaian', 'MWarga', 'MSub_kriteria', 'MKriteria', 'MBobot'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/penilaian/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/penilaian/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/penilaian/';
            $config['first_url'] = base_url() . 'index.php/penilaian/';
        }

        
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MPenilaian->total_rows($q);
        $penilaian = $this->MPenilaian->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penilaian_data' => $penilaian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'penilaian/penilaian_list';
        $this->load->view('template', $data);
        // $this->load->view('penilaian/penilaian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MPenilaian->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penilaian' => $row->id_penilaian,
		'id_warga' => $row->id_warga,
		'id_kriteria' => $row->id_kriteria,
		'id_subkriteria' => $row->id_subkriteria,
		'nilai_bobot' => $row->nilai_bobot,
	    );
            $data['page'] = 'penilaian/penilaian_read';
            $this->load->view('template', $data);
            //$this->load->view('penilaian/penilaian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penilaian'));
        }
    }


    public function kurang () 
    {
        $data["nilai_bobot"]=$this->input->post("nilai_bobot");

    }

    function getdatasubkriteria() 
    {
        $id_kriteria = $this->input->post('kriteria');
        $getdatasub = $this->MPenilaian->getdatasub($id_kriteria);

        
        echo json_encode($getdatasub);
    }

     
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penilaian/create_action'),
	    'id_penilaian' => set_value('id_penilaian'),
	    'id_warga' => set_value('id_warga'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'id_subkriteria' => set_value('id_subkriteria'),
	    'nilai_bobot' => set_value('nilai_bobot'),
	);
        $data['list_warga'] =  $this->MWarga->get_all();
        $data['list_kriteria'] =  $this->MKriteria->get_all();
        $data['list_subkriteria'] =  $this->MSub_kriteria->get_all();
        $data['list_bobot'] =  $this->MBobot->get_all();
        $data['page'] = 'penilaian/penilaian_form';
        $this->load->view('template', $data);
        //$this->load->view('penilaian/penilaian_form', $data);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else { 
            $id_kriteria=$this->input->post('nama_kriteria',TRUE);
            $id_subkriteria=$this->input->post('nama_subkriteria',TRUE);
            $nilai_maks=$this->db->query("SELECT nilai_maks FROM sub_kriteria WHERE id_kriteria=$id_kriteria AND id_subkriteria=$id_subkriteria")->row();
            $nilai_maks=$nilai_maks->nilai_maks;
            $nilai_bobot=$this->input->post('nilai_bobot',TRUE);
            $pengurangan=$nilai_bobot - $nilai_maks;

			if ($pengurangan == 0) {
				$hasilPengurangan= 5;
			}  elseif($pengurangan == -1){
				$hasilPengurangan=  4;
			}  elseif($pengurangan == -2){
				$hasilPengurangan= 3;
			}  elseif($pengurangan == -3){
				$hasilPengurangan=  2;
			}  elseif($pengurangan == -4){
				$hasilPengurangan=  1;
			}
            $data = array(
		'id_warga' => $this->input->post('nama',TRUE),
		'id_kriteria' =>$id_kriteria,
		'id_subkriteria' => $id_subkriteria,
		'nilai_bobot' => $nilai_bobot,
        'pengurangan'=>$pengurangan,
        'pembobotan'=>$hasilPengurangan,
	    );

            $this->MPenilaian->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penilaian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MPenilaian->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penilaian/update_action'),
		'id_penilaian' => set_value('id_penilaian', $row->id_penilaian),
		'id_warga' => set_value('id_warga', $row->id_warga),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'id_subkriteria' => set_value('id_subkriteria', $row->id_subkriteria),
		'nilai_bobot' => set_value('nilai_bobot', $row->nilai_bobot),
	    );
        $data['list_warga'] =  $this->MWarga->get_all();
        $data['list_kriteria'] =  $this->MKriteria->get_all();
        $data['list_subkriteria'] =  $this->MSub_kriteria->get_all();
        $data['list_bobot'] =  $this->MBobot->get_all();
            $data['page'] = 'penilaian/penilaian_form';
            $this->load->view('template', $data);
            //$this->load->view('penilaian/penilaian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penilaian'));
        }
    }

    public function hasil () {
        $data['hasil_hitung'] =$this->MPenilaian->hitung();
        // print_r($data['hasil_hitung']);
        $data['page'] = 'penilaian/list';
        $this->load->view('template', $data);

    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penilaian', TRUE));
        } else {
            $data = array(
		'id_warga' => $this->input->post('id_warga',TRUE),
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'id_subkriteria' => $this->input->post('id_subkriteria',TRUE),
		'nilai_bobot' => $this->input->post('nilai_bobot',TRUE),
	    );

            $this->MPenilaian->update($this->input->post('id_penilaian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penilaian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPenilaian->get_by_id($id);

        if ($row) {
            $this->MPenilaian->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penilaian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penilaian'));
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "hasil.xls";
        $judul = "hasil";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Total CF Rumah");
	xlsWriteLabel($tablehead, $kolomhead++, "Total SF Rumah");
	xlsWriteLabel($tablehead, $kolomhead++, "Total CF Pemilik");
	xlsWriteLabel($tablehead, $kolomhead++, "Total SF Pemilik");
    // xlsWriteLabel($tablehead, $kolomhead++, "Nilai Akhir Rumah");
    // xlsWriteLabel($tablehead, $kolomhead++, "Nilai Akhir Pemilik");
    // xlsWriteLabel($tablehead, $kolomhead++, "Nilai Total");

	foreach ($this->hasil->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_kriteriacf_rumah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_kriteriasf_rumah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_kriteriacf_pemilik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_kriteriasf_pemilik);
        // xlsWriteLabel($tablebody, $kolombody++, $data->$nilaiCF1);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'trim|required');
	$this->form_validation->set_rules('nama_subkriteria', 'nama_subkriteria', 'trim|required');
	$this->form_validation->set_rules('nilai_bobot', 'nilai bobot', 'trim|required');

	$this->form_validation->set_rules('id_penilaian', 'id_penilaian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=list.php");

        $data = array(
            'hasil_hitung' => $this->MPenilaian->get_all(),
            'start' => 0
        );
        
        $this->load->view('penilaian/list',$data);
    }

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-12 06:24:18 */
/* http://harviacode.com */