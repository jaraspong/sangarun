<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";

include_once '../libs/NewsType.php';

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

$news = new NewsType();
$page = '../news_type.php';
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
