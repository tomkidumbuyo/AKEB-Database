<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function getmainuser(){
		$user = new Users($this->ion_auth->get_user_id());
		echo json_encode($user->json());
	}
	
	public function create_user(){
		
		$this->data['title'] = $this->lang->line('create_user_heading');


		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		//$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'type' => $this->input->post('type'),
				'phone' => $this->input->post('phone'),
				'region' => $this->input->post('region'),
				'location' => $this->input->post('location'),
			];
			
		}
		
		var_dump($identity);
		var_dump($password);
		var_dump($email);
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			
			$user = new Users();
			$user = $user->where('email = "'.$email.'" LIMIT 1');
			$user = array_shift($user);
			
			
		
			
			echo json_encode($user->json());
			
		}
		else
		{
			
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			
			//var_dump(validation_errors());
			
			
			
			http_response_code(500);
			echo json_encode($this->data);



		}
	}
	
	public function update_user(){
		
		$user = new Users($this->input->post('id'));
		$user->first_name = $this->input->post('first_name');
		$user->last_name = $this->input->post('last_name');
		$user->email = $this->input->post('email');
		$user->phone = $this->input->post('phone');
		$user->type = $this->input->post('type');
		$user->region = $this->input->post('region');
		$user->location = $this->input->post('location');
		$user->save();
		
		if($this->input->post('password') != "" && $this->input->post('password') == $this->input->post('password_confirm')){
			$user->password = $this->hash_password($this->input->post('password'));
			echo json_encode(array('status'=>'Success in editing user and and password changing'));
		}elseif($this->input->post('password') == ""){
			echo json_encode(array('status'=>'Success in editing user'));
		}elseif($this->input->post('password') == $this->input->post('password_confirm')){
			echo json_encode(array('status'=>'Success in editing user but error in changing password. Passwords dont match.'));
		}
			
	}
	
	public function delete_user(){
		$user = new Users($this->input->post('id'));
		$user->delete();
	}
	
	public function getusers(){
		
		$results = array();
		$users = new Users();
		$users = $users->where('1=1');
		foreach($users as $user){
			$results[] = $user->json();
		}
		
		echo json_encode($results);
	}
	
	public function get_regions(){
		
		$result = array();
		
		$regions = new Regions();
		$regions = $regions->where('1=1');
		foreach($regions as $region){
			$result[] = $region->json();
		}
		
		echo json_encode($result);
		
	}
	
	public function get_countries(){
		
		$result = array();
		
		$countries = new Countries();
		$countries = $countries->where('1=1');
		foreach($countries as $country){
			$result[] = $country->json();
		}
		
		echo json_encode($result);
		
	}
	
}

