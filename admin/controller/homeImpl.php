<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/Home.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php
ini_set('display_errors',1);
isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

$home = new Home();
$util = new Util();
$page = '../index.php';
$beginname = 'home';

switch ($type) {
    case 'add':
        $filecheck = $_FILES['keyvisual']['name'];
        if (!empty($_FILES['keyvisual']['name'])){//&& strtolower(substr($filecheck, strrpos($filecheck, '.') + 1)) == 'swf'
            $_POST['keyvisual'] = $util->upload($_FILES, $beginname, 'keyvisual');
        }
        
        if (!empty($_FILES['image']['name'])){
            $_POST['image'] = $util->upload($_FILES, $beginname, 'image');
        }
        unset($_POST['image_old']);
        unset($_POST['keyvisual_old']);
        
        if(isset($_POST['hide_image']) && $_POST['hide_image'] == "on"){
        	$_POST['hide_image'] = 1;
        }else{
        	$_POST['hide_image'] = 0;
        }
        
        $home->insert($_POST);
        $home->redirect($page, $type);
        break;
    case 'edit':
        if (!empty($_FILES['keyvisual']['name'])) {
            //edl file old
            if (!isset($_POST['keyvisual_old'])) {
                $util->deleteFile($_POST['keyvisual_old']);
            }
            $_POST['keyvisual'] = $util->upload($_FILES, $beginname, 'keyvisual');
        }
        if (!empty($_FILES['image']['name'])) {
            if (!isset($_POST['image_old'])) {
                $util->deleteFile($_POST['image_old']);
            }
            $_POST['image'] = $util->upload($_FILES, $beginname, 'image');
        }
        unset($_POST['keyvisual_old']);
        unset($_POST['image_old']);
        
     	if(isset($_POST['hide_image']) && $_POST['hide_image'] == "on"){
     		$_POST['hide_image'] = 1;
     	}else{
     		$_POST['hide_image'] = 0;
     	}
        $home->update($_POST);
        $home->redirect($page, $type);
        break;

    case 'del':
        $home->delete($_GET['id']);

        $home->redirect($page, $type);
        break;
    default:
        break;
}
?>
