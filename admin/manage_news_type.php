<?php include('header.php'); ?>
<?php include_once './libs/NewsType.php'; ?>
<?php
$entity = "";
$news = new NewsType();

$url = "";
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'edit') {
        
        $entity = $news->selectByid($_GET['id']);
        $url = "controller/newsTypeImpl.php?type=edit";
        $hideImage = ($entity[0]['hide_image'] == 1)?"checked='true'":"" ;
    }else
    {
        $entity = $news->EntityEmptry();
        $url="controller/newsTypeImpl.php?type=add";
    }
}
?>

<div class="row-fluid">
    <div class="box span12">
        <!--Header Title-->
        <div class="box-header well" data-original-title>
            <h2><i class="icon-picture"></i>
                <?php
                if (isset($_GET['type'])) {
                    if ($_GET['type'] == 'add') {
                        echo "เพิ่มสินค้า";
                    } elseif ($_GET['type'] == 'edit') {
                        echo "แก้ไขสิ้นค้า";
                    }
                }
                ?>
            </h2>
            
        </div>
        <!--Content-->
     
        <div class="box-content">
            <form class="form-horizontal" action="<?=$url?>" method="POST"  enctype="multipart/form-data">
                <fieldset>
                 
                    <div class="control-group">
                        <label class="control-label" for="name1">หัวข้อ - ภาษาอังกฤษ</label>
                        <div class="controls">
                            <input id="name_en" name="name_en" class="input-xlarge focused span10" type="text" value="<?= $entity[0]['name_en'] ?>" required="required">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="name2">หัวข้อ - ภาษาญี่ปุ่น</label>
                        <div class="controls">
                            <input name="name_jp" class="input-xlarge focused span10" id="title_jp"  type="text" value="<?= $entity[0]['name_jp'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <input type="hidden" name="id" value="<?= $entity[0]['id'] ?>">
                        <button type="submit" class="btn btn-primary">บันทีกค่า</button>
                    </div>
                </fieldset>

            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->


<?php include('footer.php'); ?>
