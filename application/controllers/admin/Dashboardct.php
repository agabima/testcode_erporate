<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboardct extends CI_Controller 
{

	public function index()
	{
		//$this->load->model("admin/customermd");
$this->load->model('admin/Usersinmd');
		$data['username'] = $this->session->userdata("username");
		//var_dump($data['username']);
		//die();
		$username = $this->session->userdata("username");  
		

		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}
} 
 