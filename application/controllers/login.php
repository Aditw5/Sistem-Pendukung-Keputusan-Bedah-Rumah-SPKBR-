<?php
class Login extends CI_Controller {
    function __construct()
    {
      	parent::__construct();
        $this->load->model('MUser');
    }
    public function index()
	{
		$this->load->view('login_view');
	}
	function validasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->MUser->CheckUser($username, $password) == true){
            //echo "Echo Username dan Password Benar";
            $row = $this->MUser->get_by_username($username);
            //print_r($row); exit;
            $data_user = array(
                 'username'=>$username,
                 'password'=>$password,
                 'hak_akses'=>$row->hak_akses,
                 'is_login'=>true,
            );
            $this->session->set_userdata($data_user);
            redirect('Dashboard');
            exit;
        } else {
           $this->session->set_flashdata('pesan', 'Username atau Pasword Anda salah');
           redirect('login');
           exit;
        } //exit;
    }
    public function logout()
	{
		$this->session->sess_destroy();
        redirect('login');
	}
}
?>