<?php include_once('../admin/header.php'); ?>
<?php include_once '../admin/libs/Home.php'; ?>
<?php

$home = new Home();
$entity = $home->getDataTable();

?>
<div class="row-fluid">
    <div class="box span12">
        <!--Header Title-->
<!--        <div class="box-header well" data-original-title>
            <h2><i class="icon-shopping-cart"></i>Home - หน้าหลัก</h2>
            <div class="box-icon">
                <a class="button-icon" href="manage_home.php?type=add"><span class="btn"><i class="icon-plus"></i> เพิ่มสินค้า</span></a>
            </div>
        </div>-->
        <!--Content-->
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>หัวข้อ - ภาษาอังกฤษ</th>
                        <th>หัวข้อ - ภาษาญี่ปุ่น</th>
                        <th>รูปประกอบ</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    if(sizeof($entity)>0){
                    foreach ($entity as $index => $item) {
                        $edit = "manage_home.php?type=edit&id=" . $item['id'];
                        $del = "./controller/homeImpl.php?type=del&id=" . $item['id'];
                        ?>
                        <tr>
                            <td class="center"><?= $item['title_en'] ?></td>
                            <td class="center"><?= $item['title_jp'] ?></td>
                            <td class="center">
                                <img src="../images/upload/<?= $item['image'] ?>" width="39" height="39"/>

                            </td>
                            <td class="center"> 
                                <a class="btn btn-info" href="<?= $edit ?>">
                                    <i class="icon-edit icon-white"></i>  
                                    Edit                                            
                                </a>
<!--                                <a class="btn btn-danger" href="<?= $del ?>">
                                    <i class="icon-trash icon-white"></i> 
                                    Delete
                                </a>-->
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
