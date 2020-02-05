<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

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
		$this->load->view('admin/block');
	}
	
	 public function home()
	{
		$this->load->view('admin/home');
	}
	
	 public function inventory()
	{
		$this->load->view('admin/inventory');
	}
	
	 public function student()
	{
		$this->load->view('admin/student');
	}
	
	 public function subdealer()
	{
		$this->load->view('admin/subdealer');
	}
	
	public function user()
	{
		$this->load->view('admin/user');
	}
	
	public function promo()
	{
		$this->load->view('admin/promo');
	}

	public function csv()
	{
		$row = 1;
		if (($handle = fopen(getcwd() . "\application\controllers\Book2.csv", "r")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			  $num = count($data);
				echo "<p> $num fields in line $row: <br /></p>\n";
				for ($c=0; $c < $num; $c++) {
					echo "(" . $c . ") " . $data[$c] . " | ";
				}
				echo "<br />\n";
				
			  if($row > 1) {
				  
				
				$student = new Students((int)$data[0]);
				$students = $student->where("`_id` = ".(int)$data[0]." LIMIT 1");
				
				var_dump($student);
				
				if(!$student){
					$student = new Students();
					$student->_id = (int)$data[0];
				}
				
				var_dump($student);
				
				$student->family_id = (int)$data[1];
				$student->first_name = $data[5];
				$student->middle_name = $data[6];
				$student->last_name = $data[7];
				$student->nationality = $data[14];
				$student->residence_country = $data[15];
				$student->residence_city = $data[17];
				$student->gender = $data[12];
				$student->ismaili = $data[13] == 'Y' ? true : false ;
				$student->jk = $data[3];
				$student->email	 = $data[19];
				$student->phone	 = $data[18];
				$student->income = $data[8];
				$student->dob = date("Y-m-d",strtotime($data[9]));
				$student->data = $data[16] == 'Y' ? true : false ;
				$student->computer = $data[20] == 'Y' ? true : false ;
				$student->english = $data[21] == 'Y' ? true : false ;
				$student->created = date("Y-m-d H:i:s");
				$student->save();
				
				if(!$student->_id){ 
					$student->_id = $student->id;
					$student->save();
				}
				
				var_dump($student);
				
				$education = new Educations;
				$education->student_id = $student->id;
				$education->from;
				$education->to;
				$education->level;
				$education->course;
				$education->institution;
				$education->school_category;
				
				
				
			  }
			$row++;
		  }
		  fclose($handle);
		}
	}
	
	 
	
}