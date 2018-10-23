<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_login extends CI_Controller 
{

	public function __construct()
	{
		parent:: __construct();

		date_default_timezone_set('Asia/Jakarta');
		//$this->load->model('admin/cabangmd');
		$this->load->model('admin/M_login');

	}
 
	public function index() 
	{
		//$data['setting_lain'] = $this->M_login->get_setting()->row();
		$data['username'] 	  = $this->session->userdata("username");
		$data['tipe'] 	      = $this->session->userdata("tipe");
		
		$this->load->view("admin/login",$data);

	}

	public function cek_login()
	{
		$data =  array('password'=>md5($this->input->post('password', TRUE)),
						'username'=>$this->input->post('username', TRUE));
		$datakolektor =  array('passwordkolektor'=>$this->input->post('password', TRUE),
						'namakolektor'=>$this->input->post('username', TRUE));
		$this->load->model('admin/M_login');
		$hasiluser = $this->M_login->cek_user($data)->result();
		
		//echo count($hasiluser);
		
		if (count($hasiluser)==1)
		{			
			foreach ($hasiluser as $sess) 
			{
				$sess_data['logged_in'] = 'Sudah Login';
				$sess_data['id'] = $sess->id;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = "USER";
				$this->session->set_userdata($sess_data);
			}
			redirect('admin/dashboardct');
			
		}
		

		else
		{
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
	//START LOGOUT
	public function logout(){
		$this->session->unset_userdata('username');
		
		session_destroy();
		redirect('admin/C_login');
	}
	//END LOGOUT

	  
}
