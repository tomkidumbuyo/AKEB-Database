<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends MY_Model
{
	
	const DB_TABLE = 'groups';
    const DB_TABLE_PK = 'id';
	
	
	public $id;
	public $name;
	public $description;


	function __construct($id = null)
	{
		if($id){
			return $this->load($id);
		}
		
	}
	
	function json(){
		
		$result_array  = to_array($this);
		return $result_array;
		
	}
	
	
}

/* End of file login_attempts.php */
/* Location: ./application/models/auth/login_attempts.php */