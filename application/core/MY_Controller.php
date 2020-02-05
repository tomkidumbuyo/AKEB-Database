<?php
class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
		}
		else 
		{
			redirect('/auth/login/');
		}
	}
}

class AJAX_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
		}
		else 
		{
			
		}
	}
}

class Admin_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			if($user->type == 'seller'){
				redirect('seller/index');
			}elseif($user->type == 'agent'){
				redirect('agent/index');
			}
		}
		else 
		{
			redirect('/auth/login/');
		}
	}
}