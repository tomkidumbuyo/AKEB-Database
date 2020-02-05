<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends MY_Model
{
	
	const DB_TABLE = 'leads';
    const DB_TABLE_PK = 'id';
	
	
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $phone;


	function __construct($id = null)
	{
		if($id){
			return $this->load($id);
		}
		
	}
	
	function json(){
		
		$result_array  = to_array($this);
		$result_array['fullname'] = ucfirst(strtolower($this->first_name))." ".ucfirst(strtolower($this->last_name));
			
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