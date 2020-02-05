<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Students extends MY_Model
{
	
	const DB_TABLE = 'students';
    const DB_TABLE_PK = 'id';
	
	
	public $id;
	public $_id;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $nationality;
	public $residence_country;
	public $residence_city;
	public $gender;
	public $ismaili;
	public $jk;
	public $email;
	public $phone;
	public $income;
	public $dob;
	public $data;
	public $computer;
	public $english;


	function __construct($id = null)
	{
		if($id){
			return $this->load($id);
		}
		
	}
	
	function json(){
		
		$result_array = to_array($this);
		$educations = new Educations(); 
		$educations = $educations->where('student_id = '.$this->id);
		
		$result_array['education'] = array();
		
		foreach($educations as $education){
			$result_array['educations'][] = $education->json();
		}
		
		$result_array['fullname'] = ucfirst(strtolower($this->first_name))." ".ucfirst(strtolower($this->middle_name))." ".ucfirst(strtolower($this->last_name));
			
		return $result_array;
		
	}
	
	function get_sales(){
		
		$results = array();
		
		$sales = new Sales();
		$sales = $sales->where('customer_id = '.$this->id);
		foreach($sales as $sale){
			$results[] = $sale;
		}
		return $results; 
		
	}
	
	function get_sales_json(){
		
		$results = array();
		foreach($this->get_sales() as $sale){
			$results[] = $sale->json();
		}
		return $results;
		
	}
	
	
}

/* End of file login_attempts.php */
/* Location: ./application/models/auth/login_attempts.php */