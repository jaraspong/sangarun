<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/Awards.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

$awards = new Awards();
$util = new Util();
$page = '../awards.php';
$table = 'awards';
switch ($type) {
    case 'add':
        unset($_POST['image1_old']);   
        unset($_POST['image2_old']);
        unset($_POST['image3_old']);
        
        if (!empty($_FILES['image1']['name'])){
            $_POST['image1'] = $util->upload($_FILES, $table, 'image1');
         }
         
         if (!empty($_FILES['image2']['name'])){
            $_POST['image2'] = $util->upload($_FILES, $table, 'image2'); 
         }
         if (!empty($_FILES['image3']['name'])){
            $_POST['image3'] = $util->upload($_FILES, $table, 'image3'); 
         } 
         
		if(isset($_POST['hide_image1']) && $_POST['hide_image1'] == "on"){
			$_POST['hide_image1'] = 1;
		}else{
			$_POST['hide_image1'] = 0;
		}
		
		if(isset($_POST['hide_image2']) && $_POST['hide_image2'] == "on"){
			$_POST['hide_image2'] = 1;
		}else{
			$_POST['hide_image2'] = 0;
		}
		
		if(isset($_POST['hide_image3']) && $_POST['hide_image3'] == "on"){
			$_POST['hide_image3'] = 1;
		}else{
			$_POST['hide_image3'] = 0;
		}         
		
        $awards->insert($_POST);
        $awards->redirect($page, $type);
        break;
    case 'edit':
        if (!empty($_FILES['image1']['name'])) {
            if (isset($_POST['image1_old'])) {
                $util->deleteFile($_POST['image1_old']);
            }
            $_POST['image1'] = $util->upload($_FILES, $table, 'image1');
        }
        
        if (!empty($_FILES['image2']['name'])) {
            if (isset($_POST['image2_old'])) {
                $util->deleteFile($_POST['image2_old']);
            }
            $_POST['image2'] = $util->upload($_FILES, $table, 'image2');
        }
        
        if (!empty($_FILES['image3']['name'])) {
            if (isset($_POST['image3_old'])) {
                $util->deleteFile($_POST['image3_old']);
            }
            $_POST['image3'] = $util->upload($_FILES, $table, 'image3');
        }
        unset($_POST['image1_old']);
        unset($_POST['image2_old']);
        unset($_POST['image3_old']);
        
        if(isset($_POST['hide_image1']) && $_POST['hide_image1'] == "on"){
        	$_POST['hide_image1'] = 1;
        }else{
        	$_POST['hide_image1'] = 0;
        }
        
        if(isset($_POST['hide_image2']) && $_POST['hide_image2'] == "on"){
        	$_POST['hide_image2'] = 1;
        }else{
        	$_POST['hide_image2'] = 0;
        }
        
        if(isset($_POST['hide_image3']) && $_POST['hide_image3'] == "on"){
        	$_POST['hide_image3'] = 1;
        }else{
        	$_POST['hide_image3'] = 0;
        }
        
        $awards->update($_POST);
        $awards->redirect($page, $type);
        break;
    case 'del':
        $result = $awards->selectByid($_GET['id']);
        
        if (isset($result[0]['image1'])) {
            $util->deleteFile($result[0]['image1']);
        }
        if (isset($result[0]['image2'])) {
            $util->deleteFile($result[0]['image2']);
        }
        if (isset($result[0]['image3'])) {
            $util->deleteFile($result[0]['image3']);
        }
        $awards->delete($_GET['id']);
        $awards->redirect($page, $type);
        break;
    default:
        break;

    
}
?>
