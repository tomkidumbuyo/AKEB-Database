<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class seller extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library(['ion_auth', 'form_validation']);
		$user = $this->ion_auth->user()->row();
		if($user->type == 'admin'){
				redirect('admin/index');
		}elseif($user->type == 'agent'){
				redirect('agent/index');
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
		$this->load->view('seller/block');
	}
	
	 public function home()
	{
		$this->load->view('seller/home');
	}
	
	 public function inventory()
	{
		$this->load->view('seller/inventory');
	}
	
	 public function vehicles()
	{
		$this->load->view('seller/vehicles');
	}
	
	 public function driver()
	{
		 
		$this->load->view('seller/driver',$data);
	}
	
	 public function customer()
	{
		$this->load->view('seller/customer');
	}
	
	 public function report()
	{
		$this->load->view('seller/report');
	}
	
}