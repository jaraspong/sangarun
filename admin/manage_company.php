<?php include('header.php'); ?>
<?php include_once './libs/Company.php'; ?>
<?php
$entity = "";
$company = new Company();
$url = "";
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'edit') {

        $entity = $company->selectByid($_GET['id']);
        $hideImage = ($entity[0]['hide_image'] == 1)?"checked='true'":"" ;
        $url = "controller/companyImpl.php?type=edit";
    } else {
        $entity = $company->EntityEmptry();
        $url = "controller/companyImpl.php?type=add";
    }
}
?>
<div class="row-fluid">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-home"></i>Company - หน้าหลัก</h2>
            <div class="box-icon">
                            <!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>-->
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="<?= $url ?>" method="POST" enctype="multipart/form-data">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="name1">หัวข้อ - ภาษาอังกฤษ</label>
                        <div class="controls">
                            <input name="title_en" class="input-xlarge focused span10" id="name1" type="text" value="<?= $entity[0]['title_en'] ?>" required="required">
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
                            <input name="title_jp" class="input-xlarge focused span10" id="name2" type="text" value="<?= $entity[0]['title_jp'] ?>">
                        </div>
                    </div>



                    <div class="control-group">
                        <label class="control-label" for="textarea2">คำบรรยาย - ภาษาญี่ปุ่น</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="desc_jp" rows="3"><?= $entity[0]['desc_jp'] ?></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">รูปประกอบ</label>
                        <div class="controls">
                            <input name="image" type="file">
                            <input type="hidden" name="image_old" value="<?= $entity[0]['image'] ?>"/>
                        </div>
                    </div>

					<div class="control-group">
						<label class="control-label" for="hidePic">ซ่อนรูปประกอบ</label>
						<div class="controls">
						  <label class="checkbox">
							<input type="checkbox" id="hidePic" name="hide_image" <?=$hideImage?> />
							เลือกเมื่อต้องการซ่อนรูปประกอบ
						  </label>
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
