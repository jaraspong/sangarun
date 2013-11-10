<?php 

require_once '../api/Database/libs/PDOAdapter.php';

class Awards{

	/**
	* @var object  Store current Class object
	*/
	private static $_objInstance;

	/**
	* @var object  Store current Application object
	*/
	private static $_appInstance;


	/**
	* Singleton Pattern
	*
	* Auto Create Object Instance.
	*
	*/
	public static function getInstance(){
		if (null === self::$_objInstance) {
			self::$_objInstance = new Awards();
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
	
	
	function getAwardsData() {
	
		$request = self::$_appInstance->request();
		$lang = $request->get('lang');
		
		/**
		*  Preparing data
		*/
		//db table		
		$table 		     = 'Awards';

		//Sql statement
	    $sql     = "SELECT desc_".$lang." as description,title_".$lang." as title,image1,image2,image3,hide_image1,hide_image2,hide_image3 FROM $table";			
	
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