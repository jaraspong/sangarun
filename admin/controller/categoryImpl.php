<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/Category.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

    $category = new Category();
$util = new Util();
$page = '../category.php';
$table = 'category';
switch ($type) {
    case 'add':
        $_POST['created_date'] = date('Y-m-d');
        $category->insert($_POST);
        $category->redirect($page, $type);
        break;
    case 'edit':
        $category->update($_POST);
        $category->redirect($page, $type);
        break;
    case 'del':
        $category->delete($_GET['id']);
        $category->redirect($page, $type);
        break;
    default:
        break;

    
}
?>
