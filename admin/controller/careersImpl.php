<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/Careers.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

    $careers = new Careers();
$util = new Util();
$page = '../careers.php';
$table = 'careers';
switch ($type) {
    case 'add':
        $_POST['created_date'] = date('Y-m-d');
        $careers->insert($_POST);
        $careers->redirect($page, $type);
        break;
    case 'edit':
        $careers->update($_POST);
        $careers->redirect($page, $type);
        break;
    case 'del':
        $careers->delete($_GET['id']);
        $careers->redirect($page, $type);
        break;
    default:
        break;

    
}
?>
