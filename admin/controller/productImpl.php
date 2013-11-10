<?php echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" ?>
<?php include_once '../libs/Product.php'; ?>
<?php include_once '../libs/Util.php'; ?>
<?php

isset($_GET['type']) ? $type = $_GET['type'] : $type = '';

$products = new Product();
$util = new Util();
$page = '../products.php';
$beginname = 'product';

switch ($type) {
    case 'add':
        unset($_POST['thumbnail_old']);
        $_POST['thumbnail'] = $util->upload($_FILES, 'product', 'thumbnail');
        $products->insert($_POST);
        $products->redirect($page, $type);
        break;
    case 'edit':
        if (!empty($_FILES['thumbnail']['name'])) {
                //edl file old
                if (!isset($_POST['thumbnail_old'])) {
                    $util->deleteFile($_POST['thumbnail_old']);
                }
                $_POST['thumbnail'] = $util->upload($_FILES, $beginname, 'thumbnail');
        }
        unset($_POST['thumbnail_old']);
        $products->update($_POST);
//        $products->redirect($page, $type);
        break;
    case 'del':
        $result = $products->selectByid($_GET['id']);
        $util->deleteFile($result[0]['thumbnail']);
        $products->delete($_GET['id']);
        $products->redirect($page, $type);
        break;
    default:
        break;
}
?>
