<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Educations extends MY_Model
{
	
	const DB_TABLE = 'educations';
    const DB_TABLE_PK = 'id';
	

	public $id;
	public $student_id;
	public $from;
	public $to;
	public $level;
	public $course;
	public $institution;
	public $school_category;
	

	function __construct($id = null)
	{
		if($id){
			return $this->load($id);
		}
		
	}
	
	function json(){
		
		$result_array  = to_array($this);
		
		//$level = new Level($this->level_id);
		//$result_array['level'] = $level->json();
		
		//$school_category = new School_categories($this->school_category_id);
		//$result_array['school_category'] = $school_category->json();
		
		return $result_array;
		
	}
	
	
	
	
}

/* End of file login_attempts.php */
/* Location: ./application/models/auth/login_attempts.php */