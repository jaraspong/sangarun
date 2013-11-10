<?php include('header.php'); ?>
<?php include_once './libs/Product.php'; ?>
<?php include_once './libs/Category.php'; ?>
<?php
$entity = "";
$product = new Product();
$category = new Category();
$catEntity = $category->getCategory();
$url = "";
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'edit') {
        
        $entity = $product->selectByid($_GET['id']);
        $url = "controller/productImpl.php?type=edit";
    }else
    {
        $entity = $product->EntityEmptry();
        $url="controller/productImpl.php?type=add";
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
                        <label class="control-label" for="name1">หมวดสินค้า :</label>
                        <div class="controls">
                            <select id="category_id" name="category_id" class="span5">
                                    <?php
                                    foreach ($catEntity as $key => $value) {
                                        
                                        $name_jp = !empty($value['name_jp'])?" || ".$value['name_jp']:"";
                                        
                                        if ($_GET[type]=='edit' && $_GET['id'] == $value['id']) {
                                            echo "<option value='" . $value['id'] . "' selected='selected' >" . $value['name_en'] .$name_jp.   "</option>";
                                        } else {
                                            echo "<option value='" . $value['id'] . "'>" . $value['name_en'] .$name_jp. "</option>";
                                        }
                                    
                                    }
                                    ?>
                            </select> 
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="name1">หัวข้อ - ภาษาอังกฤษ</label>
                        <div class="controls">
                            <input id="title_en" name="title_en" class="input-xlarge focused span10" type="text" value="<?= $entity[0]['title_en'] ?>" required="required">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="textarea1">คำบรรยาย - ภาษาอังกฤษ</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea1" name="desc_en" rows="3" required="required"><?= $entity[0]['desc_en'] ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="name2">หัวข้อ - ภาษาญี่ปุ่น</label>
                        <div class="controls">
                            <input name="title_jp" class="input-xlarge focused span10" id="title_jp"  type="text" value="<?= $entity[0]['title_jp'] ?>">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="textarea2">คำบรรยาย - ภาษาญี่ปุ่น</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="desc_jp" rows="3"><?= $entity[0]['desc_jp'] ?></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">รูป1(กว้างสูงสุด300)</label>
                        <div class="controls">
                            <input id="thumbnail" name="thumbnail" type="file">
                            <input type="hidden" name="thumbnail_old" value="<?= $entity[0]['thumbnail'] ?>"
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
