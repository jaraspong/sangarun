<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/Contact.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

    $contact = new Contact();
$util = new Util();
$page = '../contact.php';
$table = 'contact';
switch ($type) {
    case 'add':
        unset($_POST['image_old']);
	    $_POST['created_date'] = date('Y-m-d');
         if (!empty($_FILES['image']['name'])){
            $_POST['image'] = $util->upload($_FILES, $table, 'image');
         }
		$contact->insert($_POST);
        $contact->redirect($page, $type);
        break;
    case 'edit':
		if (!empty($_FILES['image']['name'])) {
            if (isset($_POST['image_old'])) {
                $util->deleteFile($_POST['image_old']);
            }
            $_POST['image'] = $util->upload($_FILES, $table, 'image');
        }
		unset($_POST['image_old']);

        $contact->update($_POST);
        $contact->redirect($page, $type);
        break;
    case 'del':
        $contact->delete($_GET['id']);
        $contact->redirect($page, $type);
        break;
    default:
        break;

    
}
?>
