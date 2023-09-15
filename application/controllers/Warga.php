<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MWarga');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/warga/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/warga/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/warga/';
            $config['first_url'] = base_url() . 'index.php/warga/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MWarga->total_rows($q);
        $warga = $this->MWarga->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'warga_data' => $warga,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'warga/warga_list';
        $this->load->view('template', $data);
        //$this->load->view('warga/warga_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MWarga->get_by_id($id);
        if ($row) {
            $data = array(
		'id_warga' => $row->id_warga,
		'nama' => $row->nama,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'alamat' => $row->alamat,
	    );
            $data['page'] = 'warga/warga_read';
            $this->load->view('template', $data);
            //$this->load->view('warga/warga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warga/create_action'),
	    'id_warga' => set_value('id_warga'),
	    'nama' => set_value('nama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'alamat' => set_value('alamat'),
	);
        $data['page'] = 'warga/warga_form';
        $this->load->view('template', $data);
        //$this->load->view('warga/warga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->MWarga->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('warga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MWarga->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warga/update_action'),
		'id_warga' => set_value('id_warga', $row->id_warga),
		'nama' => set_value('nama', $row->nama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $data['page'] = 'warga/warga_form';
            $this->load->view('template', $data);
            //$this->load->view('warga/warga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_warga', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->MWarga->update($this->input->post('id_warga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MWarga->get_by_id($id);

        if ($row) {
            $this->MWarga->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warga'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id_warga', 'id_warga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "warga.xls";
        $judul = "warga";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");

	foreach ($this->MWarga->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=warga.doc");

        $data = array(
            'warga_data' => $this->MWarga->get_all(),
            'start' => 0
        );
        
        $this->load->view('warga/warga_doc',$data);
    }

}

/* End of file Warga.php */
/* Location: ./application/controllers/Warga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-12 05:57:33 */
/* http://harviacode.com */