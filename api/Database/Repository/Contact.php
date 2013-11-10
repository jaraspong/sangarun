<?php 

require_once '../api/Database/libs/PDOAdapter.php';

class Contact{

	/**
	* @var object  Store current Class object
	*/
	private static $_objInstance;

	/**
	* @var object  Store current Application object
	*/
	private static $_appInstance;
	
	/**
	* @var string  Store table name
	*/
	private $table = 'Contact';
	
	/**
	* Singleton Pattern
	*
	* Auto Create Object Instance.
	*
	*/
	public static function getInstance(){
		if (null === self::$_objInstance) {
			self::$_objInstance = new Contact();
		}
		return self::$_objInstance;
	}

    /**
     * Constructor
     *
     * Initialize things.
     *
     */
	function __construct() {

		/**
		 * Get Slim application instance
		 */
		self::$_appInstance = Slim::getInstance();

	}//end constructor
	
	function getContactData() {
			
		$request = self::$_appInstance->request();
		$lang = $request->get('lang');
		
		/**
		*  Preparing data
		*/
		//Sql statement
	    $sql     = "SELECT desc_".$lang." as description,title_".$lang." as title,image FROM $this->table";			

	    //Fetch result into arrays
		$results  = PDOAdpter::getInstance()->select($sql,null,false);
		
		if(isset($results)){
			//remove \ from url string
			$results[0]['description'] = str_replace('\\', '', $results[0]['description']);
		}
		
		//send response to client
		echo json_encode($results);		
	}
}