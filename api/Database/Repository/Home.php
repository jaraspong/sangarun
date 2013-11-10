<?php 

require_once '../api/Database/libs/PDOAdapter.php';

class Home{

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
			self::$_objInstance = new Home();
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
	
	function getHomeData() {
		
		$request = self::$_appInstance->request();
		$lang = $request->get('lang');
		
		/**
		*  Preparing data
		*/
		//db table		
		$table 		     = 'Home';

		//Sql statement
	    $sql     = "SELECT desc_".$lang." as description,title_".$lang." as title,video_url,keyvisual,image,hide_image FROM $table";			

	    //Fetch result into arrays
		$results  = PDOAdpter::getInstance()->select($sql, null,false);
		
		if(isset($results)){
			//remove \ from url string
			$results[0]['description'] = str_replace('\\', '', $results[0]['description']);
		}
		
		//send response to client
		echo json_encode($results);
	}
	
	function getHeyvisual() {

		/**
		*  Preparing data
		*/
		//db table		
		$table 		     = 'Home';

		//Sql statement
	    $sql     = "SELECT keyvisual FROM $table";			

	    //Fetch result into arrays
		$results  = PDOAdpter::getInstance()->select($sql, null,false);
		
		if(isset($results)){
			$filecheck = $results[0]['keyvisual'];
			$results[0]['flash'] = false;
			if(strtolower(substr($filecheck, strrpos($filecheck, '.') + 1)) == 'swf'){
				$results[0]['flash'] = true;
			}
		}
		
		//send response to client
		echo json_encode($results);
	}
}

?>