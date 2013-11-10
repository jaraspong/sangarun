<?php 
/* 
----------------------------------------------------------------------------------------------
PHP (Repository library)
Name: FindHistory.php
---------------------------------------------------------------------------------------------- 
Created by: Jaraspong Chokchaisiri (Soft. Engineer & Web Developer)
Email:jaraspong@codigosoftware.net
Create Date: 23 November 2012
-------------------------------------------------- --------------------------------------------
Require File : PDOAdapter.php,Util.php
----------------------------------------------------------------------------------------------
*/

require_once '../api/Database/libs/PDOAdapter.php';

class Products{

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
			self::$_objInstance = new Products();
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
	
	
	function getAllProductCategories(){
		$request = self::$_appInstance->request();
		$lang = $request->get('lang');
		
		/**
		*  Preparing data
		*/
		//db table		
		$table 		     = 'Category';

		//pagging
		$start 			 = 0;
		$end             = 20;

		//Sql statement
	    $sql     = "SELECT id,name_".$lang." as name FROM $table";			
	    /*
	    *Treats array as a stack prevent bug&errors when binding to prepare statment
	    *Set value by push args into stack
	    */

		//Order By row lastest create date
		$sql     .=" ORDER BY `name` ASC " ;

		//Fetch row from pagging params
	    $sql     .=" LIMIT $start , $end" ;
	   
	    //Fetch result into arrays
		$results  = PDOAdpter::getInstance()->select($sql, null,false);
		
		//send response to client
		echo json_encode($results);
	}
	
	
	function getAllProductByCategoryID($id) {
		$request = self::$_appInstance->request();
		$lang = $request->get('lang');
		
		/**
		*  Preparing data
		*/
		//db table		
		$table 		     = 'Product';

		//Sql statement
	    $sql     = "SELECT id,desc_".$lang." as description,title_".$lang." as title,thumbnail FROM $table";			
	    /*
	    *Treats array as a stack prevent bug&errors when binding to prepare statment
	    *Set value by push args into stack
	    */
	    $where = array();
	    $params = array();		    
	
		//sql for name criteria
		array_push($where, "category_id = ? ");
		//name param args
		array_push($params,$id);
		
		//build where condition
		if(isset($where)){
			$sql .= PDOAdpter::getInstance()->whereQuery($where);
		}
		//Order By row lastest create date
		//$sql     .=" ORDER BY title ASC " ;

	    //Fetch result into arrays
		$results  = PDOAdpter::getInstance()->select($sql, $params,false);
		
		if(isset($results)){
			foreach ($results as $index => $val ) {
				$results[$index]['description'] = str_replace('\\', '', $results[$index]['description'] );
			}
		}
		
		//send response to client
		echo json_encode($results);
	}
}//end class
