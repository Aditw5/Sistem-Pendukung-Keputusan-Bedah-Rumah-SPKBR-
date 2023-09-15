<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MUser');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/user/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/user/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/user/';
            $config['first_url'] = base_url() . 'index.php/user/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MUser->total_rows($q);
        $user = $this->MUser->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'user/user1_list';
        $this->load->view('template', $data);
        // $this->load->view('user/user1_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MUser->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user1' => $row->id_user1,
		'username' => $row->username,
		'password' => $row->password,
		'hak_akses' => $row->hak_akses,
	    );
            $data['page'] = 'user/user1_read';
            $this->load->view('template', $data);
            // $this->load->view('user/user1_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id_user1' => set_value('id_user1'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'hak_akses' => set_value('hak_akses'),
	);
        $data['page'] = 'user/user1_form';
        $this->load->view('template', $data);
        // $this->load->view('user/user1_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'hak_akses' => $this->input->post('hak_akses',TRUE),
	    );

            $this->MUser->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MUser->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id_user1' => set_value('id_user1', $row->id_user1),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'hak_akses' => set_value('hak_akses', $row->hak_akses),
	    );
            $data['page'] = 'user/user1_form';
            $this->load->view('template', $data);
            // $this->load->view('user/user1_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user1', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'hak_akses' => $this->input->post('hak_akses',TRUE),
	    );

            $this->MUser->update($this->input->post('id_user1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MUser->get_by_id($id);

        if ($row) {
            $this->MUser->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');

	$this->form_validation->set_rules('id_user1', 'id_user1', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-19 05:44:54 */
/* http://harviacode.com */