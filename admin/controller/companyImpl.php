<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/Company.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

$companys = new Company();
$beginname = 'company';
$util = new Util();
$page = '../company.php';

switch ($type) {
    case 'add':
        if (!empty($_FILES['image']['name'])){
            $_POST['image'] = $util->upload($_FILES, $beginname, 'image');
        }
        unset($_POST['id']);
        unset($_POST['image_old']);
        if(isset($_POST['hide_image']) && $_POST['hide_image'] == "on"){
        	$_POST['hide_image'] = 1;
        }else{
        	$_POST['hide_image'] = 0;
        }
        $companys->insert($_POST);
        $companys->redirect($page, $type);
        break;
    case 'edit':
        if (!empty($_FILES['image']['name'])) {
        
            if (!isset($_POST['image_old'])) {
                $util->deleteFile($_POST['image_old']);
            }
            $_POST['image'] = $util->upload($_FILES, $beginname, 'image');
        }
        
        unset($_POST['image_old']);
        if(isset($_POST['hide_image']) && $_POST['hide_image'] == "on"){
        	$_POST['hide_image'] = 1;
        }else{
        	$_POST['hide_image'] = 0;
        }
        $companys->update($_POST);
        $companys->redirect($page, $type);
        break;
    case 'del':
        $result = $companys->selectByid($_GET['id']);
        if(!isset($result['image']) && strtolower($result['image']) != 'null')
        $util->deleteFile($result[0]['image']);
        $companys->delete($_GET['id']);
        $companys->redirect($page, $type);
        break;
    default:
        break;

    
}

/**
		*  Database Persistance for applicant data
		*/
		//db table		
		$table 		     	= "applicant";
		$updateddate		= date('Y-m-d H:i:s');
		//row data				
		$applicantRow = array(
						//firstname value
						'firstname' 	=> $saveData["home"]["first_name"],
						//middle name value
						'mi' 	=> $saveData["home"]["mi"],
						//last name value
						'lastname' 		=> $saveData["home"]["last_name"],
						//name suffix
						'suffix' 		=> $saveData["home"]["suffix"],
						//email
						'email'		 	=> $saveData["home"]["email"],
						//created date
						'lastupdated'			=> $updateddate
					);		
		if(isset($password) && $password != ""){
			$applicantRow['password'] = $saveData["home"]["password"];
		}
		//condition for update row
		$where = array( 'id = ? ' );
		//build where condition
		$where_condition = self::$_dbInstance->whereQuery($where);
		//get cookie data
		$cookies = json_decode($cookiesData);
		//build where param
		$whereBinding = array( 'id' => $cookies->uid);
		//update an applicant to database
		$updatedAplicantRow = self::$_dbInstance->updateQuick($table,$applicantRow,$where_condition,$whereBinding);
?>
