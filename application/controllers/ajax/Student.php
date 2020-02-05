<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {
	
	public function create_student(){
		
		$student = new Students();
		// $student->id = $this->input->post('id');
		$student->family_id = $this->input->post('family_id');
		$student->first_name = $this->input->post('first_name');
		$student->middle_name = $this->input->post('middle_name');
		$student->last_name = $this->input->post('last_name');
		$student->nationality = $this->input->post('nationality');
		$student->residence_country = $this->input->post('residence_country');
		$student->residence_city = $this->input->post('residence_city');
		$student->gender = $this->input->post('gender');
		$student->ismaili = $this->input->post('ismaili');
		$student->jk = $this->input->post('jk');
		$student->email = $this->input->post('email');
		$student->phone = $this->input->post('phone');
		$student->income = $this->input->post('income');
		$student->dob = date("Y-m-d", strtotime($this->input->post('dob')));
		$student->data = $this->input->post('data');
		$student->computer = $this->input->post('computer');
		$student->english = $this->input->post('english');
		$student->created = date("Y-m-d H:i:s");
		$student->save();
		
		if(!$student->_id){ 
			$student->_id = $student->id;
			$student->save();
		}
		
		
		$r = $student->json();
		echo json_encode($r);
		
	}
	
	public function create_education(){
		$education = new Educations;
		$education->student_id = $this->input->post('student_id');
		$education->from = $this->input->post('from');
		$education->to = $this->input->post('to');
		$education->level = $this->input->post('level');
		$education->course = $this->input->post('course');
		$education->institution = $this->input->post('institution');
		$education->school_category = $this->input->post('school_category');
		$education->country = $this->input->post('country');
		$education->save();
		
		echo json_encode($education->json());
	}
	
	public function getUserStudents(){
		
		$result = array();
		$students = new Students();
		$students = $students->where('user_id = '.$this->ion_auth->get_user_id());
		foreach($students as $student){
			$result[] = $student->json();
		}
		
		echo json_encode($result);
		
	}
	
	public function getSellerStudents(){
		
		$result = array();
		$students = new Students();
		$students = $students->where('seller_id = '.$this->ion_auth->get_user_id());
		foreach($students as $student){
			$result[] = $student->json();
		}
		
		echo json_encode($result);
		
	}
	
	public function getStudents(){
		
		$result = array();
		$students = new Students();
		$students = $students->where('1=1 ORDER BY id DESC');
		foreach($students as $student){
			$result[] = $student->json();
		}
		
		echo json_encode($result);
		
	}
	
	public function student_called(){
		$student = new Students($this->input->post('id'));
		if($student->called){
			$student->called = false;
		}else{
			$student->called = true;
		}
		$student->save();
		echo json_encode($student);
	}
	
	public function check_student(){
		$id =  ltrim($this->input->post('id'), '0');
		$student = new Students($id);
		if($student->id && !$student->used){
			
			$student->used = true;
			$student->seller_id = $this->ion_auth->get_user_id();
			$student->use_time = date("Y-m-d H:i:s");
			$student->save();
			
			$r = $this->SendMessage($student->number, "Hongera ndugu mteja , umetumia namba yako ya ".sprintf("%04d", $student->id)."  kununua mtungi kwa nusu bei. karibu kwenye familia ya AKEB.\nGESI BORA, MAPISHI MURUA.");
			
			$result = array("message"=>"Success","smsStatus"=>json_decode($r));
			
			echo json_encode($result);
			
		}else if($student->id && $student->used){
			echo '{"message":"This student is already used"}';
		}else{
			echo '{"message":"This student dont existing"}';
		}
	}
	
	public function check_code(){
		$promo_codes = new Promo_codes();
		$promo_codes = $promo_codes->where("code = '".$this->input->post('code')."'");
		if(count($promo_codes) > 0){
			$promo_code = array_shift($promo_codes);
			
			$promo_code_sales = new Promo_code_sales();
			$promo_code_sales->promo_code = $promo_code->id;
			$promo_code_sales->time = date("Y-m-d H:i:s");
			$promo_code_sales->seller_id = $this->ion_auth->get_user_id();
			
			$promo_code_sales->save();
			
			$user = new users($this->ion_auth->get_user_id());
			
			$student = new Students();
			$student->first_name = $promo_code->name;
			$student->last_name = "(promo code)";
			$student->product_id  = 0;
			$student->number = 0;
			$student->region = $user->region ? $user->region : 0 ;
			$student->location = $user->location ? $user->location : 0 ;
			$student->used = true;
			$student->seller_id = $this->ion_auth->get_user_id();
			$student->user_id = $this->ion_auth->get_user_id();
			$student->offer_time = date("Y-m-d H:i:s");
			$student->save();
			
			echo '{"message":"Success. This promo code belongs to '.$promo_code->name.'"}';
		
		}else{
			echo '{"message":"This promo code don\'t existing"}';
		}
	}
	
	function SendEmail($email, $message){
		$postData = array(
			'channel' => array(
				'channel' => 118314,
				'password' => "NzExNzYwNmRjODgxYWY5NmQ4Y2JhNjgzOWU3YjVlYjZmMzIwOGI4Nzc1ODJjNzhhMGFiMjg0ZmViMDhhYjA3NQ=="),
			'messages' => array(
				array(
					'text' => $message,
					'msisdn' => $number,
					'source' => 'AKEB')
					//'source' => 'SMSAuth')
			)
		);
		
		// Setup cURL
		$ch = curl_init('https://secure-gw.fasthub.co.tz/fasthub/messaging/json/api');
		$certificate = FCPATH."cacert.pem";
		
		curl_setopt($ch, CURLOPT_CAINFO, $certificate);
		curl_setopt($ch, CURLOPT_CAPATH, $certificate);
		
		curl_setopt_array($ch, array(
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_CAINFO => $certificate,
			CURLOPT_CAPATH => $certificate,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
			CURLOPT_POSTFIELDS => json_encode($postData)
		));
		
		// Send the request
		$responseData = curl_exec($ch);
		
		if (curl_error($ch)) {
			return json_encode(array("isSuccessful"=>false,"error"=>curl_error($ch)));
		}else{
			//echo 'Response from FastHub: '.$responseData;
			return $responseData;
		}



	}
	
	
	

	
}

