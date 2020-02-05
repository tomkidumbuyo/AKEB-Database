<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Users extends MY_Model
{
	
	const DB_TABLE = 'users';
    const DB_TABLE_PK = 'id';
	
	public $id;
	public $ip_address;
	public $username;
	public $password;
	public $email;
	public $activation_selector;
	public $activation_code;
	public $forgotten_password_selector;
	public $forgotten_password_code;
	public $forgotten_password_time;
	public $remember_selector;
	public $remember_code;
	public $created_on;
	public $last_login;
	public $active;
	public $first_name;
	public $last_name;
	public $company;
	public $phone;

	
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles

	function __construct($id = null)
	{
		
		parent::__construct();
		
		
		if($id){
			$this->load($id);
			return $this;
		}
		
		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->profile_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->profile_table_name;

	}
	
	function json(){
		
		$result_array  = to_array($this);
		$result_array['fullname'] = $this->get_fullname();
		$result_array['initials'] = $this->get_initials();
		$result_array['password'] = '';
		return $result_array;
		
	}
	
	
	function get_fullname(){
		return ucfirst(strtolower($this->first_name))." ".ucfirst(strtolower($this->last_name));
	}
	
	function get_initials(){
		return ucfirst(substr($this->first_name,0,1)).ucfirst(substr($this->last_name,0,1));
	}
	
	
}

