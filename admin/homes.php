<?php include('header.php'); ?>
<?php include_once './libs/Product.php'; ?>
<?php
    $product = new Product();
    $entity = $product->getDataTable();
?>
<div class="row-fluid">
    <div class="box span12">
        <!--Header Title-->
<!--        <div class="box-header well" data-original-title>
            <h2><i class="icon-shopping-cart"></i>Product - สินค้า</h2>
            <div class="box-icon">
                <a class="button-icon" href="manage_product.php?type=add"><span class="btn"><i class="icon-plus"></i> เพิ่มสินค้า</span></a>
            </div>
        </div>-->
        <!--Content-->
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>หมวดสินค้า (ภาษาอังกฤษ | ภาษาญี่ปุ่น)</th>
                        <th>หัวข้อ - ภาษาอังกฤษ</th>
                        <th>หัวข้อ - ภาษาญี่ปุ่น</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    foreach ($entity as $index => $item) {
                        $edit = "manage_product.php?type=edit&id=" . $item['id'];
                        $del = "./controller/productImpl.php?type=del&id=" . $item['id'];
                        ?>
                        <tr>
                            <td><?= $item['cat_name'] ?></td>
                            <td class="center"><?= $item['title_en'] ?></td>
                            <td class="center"><?= $item['title_jp'] ?></td>
                            <td class="center"> 
                                <a class="btn btn-info" href="<?= $edit ?>">
                                    <i class="icon-edit icon-white"></i>  
                                    Edit                                            
                                </a>
                                <a class="btn btn-danger" href="<?= $del ?>">
                                    <i class="icon-trash icon-white"></i> 
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table> 
        </div><!--Content-->
    </div><!--/span-->

</div><!--/row-->


<?php include('footer.php'); ?>
