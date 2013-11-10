<?php 

require_once '../api/Database/libs/PDOAdapter.php';

class News{

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
	private $table = 'News';

	/**
	* Singleton Pattern
	*
	* Auto Create Object Instance.
	*
	*/
	public static function getInstance(){
		if (null === self::$_objInstance) {
			self::$_objInstance = new News();
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

	function getNews(){
	
		$request = self::$_appInstance->request();
		$lang = $request->get('lang');
		$id = $request->get('id');
		
		/**
		*  Preparing data
		*/
                $where = array();
                $params = array();		    

		//sql for name criteria
		array_push($where, "type_id = ? ");
		//name param args
		array_push($params,$id);
		
		//Sql statement
        $sql     = "SELECT desc_".$lang." as description,title_".$lang." as title FROM $this->table";			
		
		//build where condition
		if(isset($where)){
			$sql .= PDOAdpter::getInstance()->whereQuery($where);
		}
	    
	    //Fetch result into arrays
		$results  = PDOAdpter::getInstance()->select($sql,$params,false);

		if(isset($results)){
			//remove \ from url string
			$results[0]['description'] = str_replace('\\', '', $results[0]['description']);
		}
		
		//send response to client
		echo json_encode($results);		
	
	}
	function getNewsType(){
	
		$request = self::$_appInstance->request();
		$lang = $request->get('lang');

		
		//Sql statement
        $sql     = "SELECT name_".$lang." as name,id FROM NewsType";			
	    
	    //Fetch result into arrays
		$results  = PDOAdpter::getInstance()->select($sql,null,false);
		
		//send response to client
		echo json_encode($results);		
	
	}
}