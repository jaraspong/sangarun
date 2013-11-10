<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/News.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

    $news = new News();
$util = new Util();
$page = '../news.php';

switch ($type) {
    case 'add':
        $_POST['created_date'] = date('Y-m-d');
        $news->insert($_POST);
        $news->redirect($page, $type);
        break;
    case 'edit':
        $news->update($_POST);
        $news->redirect($page, $type);
        break;
    case 'del':
        $news->delete($_GET['id']);
        $news->redirect($page, $type);
        break;
    default:
        break;

    
}
?>
