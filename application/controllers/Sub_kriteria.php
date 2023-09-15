<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('MSub_kriteria');
        $this->load->model(array ('MSub_kriteria', 'MKriteria'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/sub_kriteria/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/sub_kriteria/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/sub_kriteria/';
            $config['first_url'] = base_url() . 'index.php/sub_kriteria/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MSub_kriteria->total_rows($q);
        $sub_kriteria = $this->MSub_kriteria->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sub_kriteria_data' => $sub_kriteria,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'sub_kriteria/sub_kriteria_list';
        $this->load->view('template', $data);
        //$this->load->view('sub_kriteria/sub_kriteria_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MSub_kriteria->get_by_id($id);
        if ($row) {
            $data = array(
		'id_subkriteria' => $row->id_subkriteria,
		'id_kriteria' => $row->id_kriteria,
		'nama_subkriteria' => $row->nama_subkriteria,
		'jenis_subkriteria' => $row->jenis_subkriteria,
        'nilai_maks' => $row->nilai_maks,
	    );
            $data['page'] = 'sub_kriteria/sub_kriteria_read';
            $this->load->view('template', $data);
            //$this->load->view('sub_kriteria/sub_kriteria_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_kriteria'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_kriteria/create_action'),
	    'id_subkriteria' => set_value('id_subkriteria'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'nama_subkriteria' => set_value('nama_subkriteria'),
	    'jenis_subkriteria' => set_value('jenis_subkriteria'),
        'nilai_maks' => set_value('nilai_maks'),
	);
        $data['list_kriteria'] =  $this->MKriteria->get_all();
        $data['page'] = 'sub_kriteria/sub_kriteria_form';
        $this->load->view('template', $data);
       // $this->load->view('sub_kriteria/sub_kriteria_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nama_subkriteria' => $this->input->post('nama_subkriteria',TRUE),
		'jenis_subkriteria' => $this->input->post('jenis_subkriteria',TRUE),
        'nilai_maks' => $this->input->post('nilai_maks',TRUE),
	    );

            $this->MSub_kriteria->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sub_kriteria'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MSub_kriteria->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_kriteria/update_action'),
		'id_subkriteria' => set_value('id_subkriteria', $row->id_subkriteria),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'nama_subkriteria' => set_value('nama_subkriteria', $row->nama_subkriteria),
		'jenis_subkriteria' => set_value('jenis_subkriteria', $row->jenis_subkriteria),
        'nilai_maks' => set_value('nilai_maks',$row->nilai_maks),
	    );
        $data['list_kriteria'] =  $this->MKriteria->get_all();
            $data['page'] = 'sub_kriteria/sub_kriteria_form';
            $this->load->view('template', $data);
            //$this->load->view('sub_kriteria/sub_kriteria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_kriteria'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_subkriteria', TRUE));
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nama_subkriteria' => $this->input->post('nama_subkriteria',TRUE),
		'jenis_subkriteria' => $this->input->post('jenis_subkriteria',TRUE),
        'nilai_maks' => $this->input->post('nilai_maks',TRUE),
	    );

            $this->MSub_kriteria->update($this->input->post('id_subkriteria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sub_kriteria'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MSub_kriteria->get_by_id($id);

        if ($row) {
            $this->MSub_kriteria->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sub_kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_kriteria'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'trim|required');
	$this->form_validation->set_rules('nama_subkriteria', 'nama subkriteria', 'trim|required');
	$this->form_validation->set_rules('jenis_subkriteria', 'jenis subkriteria', 'trim|required');
    $this->form_validation->set_rules('nilai_maks', 'nilai_maks', 'trim|required');

	$this->form_validation->set_rules('id_subkriteria', 'id_subkriteria', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sub_kriteria.php */
/* Location: ./application/controllers/Sub_kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-12 06:05:18 */
/* http://harviacode.com */