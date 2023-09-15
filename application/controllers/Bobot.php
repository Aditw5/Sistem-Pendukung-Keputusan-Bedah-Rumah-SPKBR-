<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bobot extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('MBobot');
        $this->load->model(array ('MBobot', 'MSub_kriteria', 'MKriteria'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/bobot/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/bobot/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/bobot/';
            $config['first_url'] = base_url() . 'index.php/bobot/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MBobot->total_rows($q);
        $bobot = $this->MBobot->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bobot_data' => $bobot,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'bobot/bobot_list';
        $this->load->view('template', $data);
        //$this->load->view('bobot/bobot_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MBobot->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bobot' => $row->id_bobot,
		'id_kriteria' => $row->id_kriteria,
		'id_subkriteria' => $row->id_subkriteria,
		'nilai_bobot' => $row->nilai_bobot,
		'keterangan' => $row->keterangan,
	    );
            $data['page'] = 'bobot/bobot_read';
            $this->load->view('template', $data);
            //$this->load->view('bobot/bobot_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobot'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bobot/create_action'),
	    'id_bobot' => set_value('id_bobot'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'id_subkriteria' => set_value('id_subkriteria'),
	    'nilai_bobot' => set_value('nilai_bobot'),
	    'keterangan' => set_value('keterangan'),
	);
        $data['list_kriteria'] =  $this->MKriteria->get_all();
        $data['list_subkriteria'] =  $this->MSub_kriteria->get_all();
        $data['page'] = 'bobot/bobot_form';
        $this->load->view('template', $data);
        //$this->load->view('bobot/bobot_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'id_subkriteria' => $this->input->post('id_subkriteria',TRUE),
		'nilai_bobot' => $this->input->post('nilai_bobot',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->MBobot->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bobot'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MBobot->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bobot/update_action'),
		'id_bobot' => set_value('id_bobot', $row->id_bobot),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'id_subkriteria' => set_value('id_subkriteria', $row->id_subkriteria),
		'nilai_bobot' => set_value('nilai_bobot', $row->nilai_bobot),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
        $data['list_kriteria'] =  $this->MKriteria->get_all();
        $data['list_subkriteria'] =  $this->MSub_kriteria->get_all();
            $data['page'] = 'bobot/bobot_form';
            $this->load->view('template', $data);
            //$this->load->view('bobot/bobot_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobot'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bobot', TRUE));
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'id_subkriteria' => $this->input->post('id_subkriteria',TRUE),
		'nilai_bobot' => $this->input->post('nilai_bobot',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->MBobot->update($this->input->post('id_bobot', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bobot'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MBobot->get_by_id($id);

        if ($row) {
            $this->MBobot->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bobot'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobot'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'trim|required');
	$this->form_validation->set_rules('id_subkriteria', 'id_subkriteria', 'trim|required');
	$this->form_validation->set_rules('nilai_bobot', 'nilai bobot', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_bobot', 'id_bobot', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bobot.php */
/* Location: ./application/controllers/Bobot.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-12 06:14:01 */
/* http://harviacode.com */