<?php

require_once 'PDOAdapter.php';

class Membership {
	
	/**
	* @var object  Store current Class object
	*/
	private static $_objInstance;
	
	/**
	* @var object  Store current DB object
	*/
	private static $_dbInstance;
	
	function __construct() {
		/**
		 * Get DB
		 */		
		if (null === self::$_dbInstance) {	
			self::$_dbInstance  = PDOAdpter::getInstance();
		}
	}
	
	/**
	* Singleton Pattern
	*
	* Auto Create Object Instance.
	*
	*/
	public static function getInstance(){
		if (null === self::$_objInstance) {
			self::$_objInstance = new Membership();
		}
		return self::$_objInstance;
	}
	
	
	function validate_user($un, $pwd) {

		$ensure_credentials = $this->verify($un, $pwd);
		
		if($ensure_credentials) {
			$_SESSION['status'] 	= 'authorized';
			$_SESSION['username'] 	= $un;
			$this->redirect("index.php");
		} else {
			return false;
		}
		
	} 
	/**
	 * Validate user
	 *
	 * @return bool
	 */
	function verify($un, $pwd) {

        $username 	 	= filter_var(urldecode($un), FILTER_SANITIZE_STRING);
        $password 		= filter_var($pwd, FILTER_SANITIZE_STRING);

	    //get applicant from database
	    $result = $this->getUser(null, $username, $password);

	    if(isset($result[0]) && isset($result[0]['valid']) && $result[0]['valid'] != 0 ) {         	
	        return true;
	    }
		
		return false;
		
	}
	
	/**
     * Get User Applicants data from database
     *
     * @return applicant data
     */
	private function getUser($id=null,$username=null,$pwd=null){
		//db table		
		$table 		     = 'user';
		$field			 = 'count(id) as valid,user_name';

		//Sql statement
	    $sql     = "SELECT $field FROM $table ";

	    /*
	    *Treats array as a stack prevent bug&errors when binding to prepare statment
	    *Set value by push args into stack
	    */
	    $where = array();
	    $params = array();	  

	    //user identity criteria
		if (isset($username) && isset($pwd) ) {

			//sql for pwd criteria			
			array_push($where, "user_name = ? ");
			array_push($params,$username);
			
			array_push($where, "password = ? ");
			array_push($params,$pwd);
		}
		
		if(isset($id)){
			//sql for id criteria
			array_push($where, "id = ? ");
			array_push($params,$id);			
		}
		
		
		//merge where conditions
		if(isset($where)){
			$sql 	 .= PDOAdpter::getInstance()->whereQuery($where);
		}

	    //Fetch result into arrays
		$result  = PDOAdpter::getInstance()->select($sql, $params,false);	    	
		
		return $result;
	}
	
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			session_destroy();
		}
		
		$this->redirect("login.php");
		
	}
	
	function confirm_Member() {
		if($_SESSION['status'] !='authorized') 
		$this->redirect("login.php");
	}
	
	function changePWD($username,$newPwd) {
	   return PDOAdpter::getInstance()->updateQuick( 'user' , array('password' => $newPwd) , ' where user_name = ?', array('user_name'=>$username),true);
	}
	
	function redirect( $page ) {
		echo "<script> window.location = \"".$page."\"; </script>";
		//echo "<meta http-equiv='refresh' content='=2;login.php' />";
	}
	
}