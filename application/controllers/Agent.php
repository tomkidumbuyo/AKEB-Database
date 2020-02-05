<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library(['ion_auth', 'form_validation']);
		$user = $this->ion_auth->user()->row();
		if($user->type == 'admin'){
				redirect('admin/index');
		}elseif($user->type == 'seller'){
				redirect('seller/index');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('agent/block');
	}
	
	 public function home()
	{
		$this->load->view('agent/home');
	}
	
	 public function inventory()
	{
		$this->load->view('agent/inventory');
	}
	
	 public function vehicles()
	{
		$this->load->view('agent/vehicles');
	}
	
	 public function driver()
	{
		 
		$this->load->view('agent/driver',$data);
	}
	
	 public function customer()
	{
		$this->load->view('agent/customer');
	}
	
	 public function report()
	{
		$this->load->view('agent/report');
	}
	
}