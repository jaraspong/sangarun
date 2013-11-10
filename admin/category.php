<?php include('header.php'); ?>
<?php include_once './libs/Category.php'; ?>
<?php
    $category = new Category();
    $entity = $category->getDataTable();
?>
<div class="row-fluid">
    <div class="box span12">
        <!--Header Title-->
        <div class="box-header well" data-original-title>
            <h2><i class="icon-shopping-cart"></i>Category - ประเภทสินค้า</h2>
            <div class="box-icon">
                <a class="button-icon" href="manage_category.php?type=add"><span class="btn"><i class="icon-plus"></i> เพิ่มประเภทสินค้า</span></a>
            </div>
        </div>
        <!--Content-->
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>ประเภทสินค้า - ภาษาอังกฤษ</th>
                        <th>ประเภทสินค้า - ภาษาญี่ปุ่น</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    if(sizeof($entity)>0){
                    foreach ($entity as $index => $item) {
                        $edit = "manage_category.php?type=edit&id=" . $item['id'];
                        $del = "./controller/categoryImpl.php?type=del&id=" . $item['id'];
                        ?>
                        <tr>
                            <td class="center"><?= $item['name_en'] ?></td>
                            <td class="center"><?= $item['name_jp'] ?></td>
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
                    }}
                    ?>

                </tbody>
            </table> 
        </div><!--Content-->
    </div><!--/span-->

</div><!--/row-->


<?php include('footer.php'); ?>
