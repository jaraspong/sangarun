<?php include('header.php'); ?>
<?php include_once './libs/Awards.php'; ?>
<?php
$entity = "";
$awards = new Awards();
$url = "";
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'edit') {
        
        $entity = $awards->selectByid($_GET['id']);
        $hideImage1 = ($entity[0]['hide_image1'] == 1)?"checked='true'":"" ;
        $hideImage2 = ($entity[0]['hide_image2'] == 1)?"checked='true'":"" ;
        $hideImage3 = ($entity[0]['hide_image3'] == 1)?"checked='true'":"" ;
        $url = "controller/awardsImpl.php?type=edit";
    }else
    {
        $entity = $awards->EntityEmptry();
        $url="controller/awardsImpl.php?type=add";
    }
}
?>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-awards"></i>Awards - หน้าหลัก</h2>
						<div class="box-icon">
								<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?=$url?>" method="POST" enctype="multipart/form-data">
							<fieldset>
							  
							  <div class="control-group">
								<label class="control-label" for="name1">หัวข้อ - ภาษาอังกฤษ</label>
								<div class="controls">
                                                                    <input name="title_en" class="input-xlarge focused span10" id="name1" type="text" value="<?=$entity[0]['title_en']?>" required="required">
								</div>
							  </div>
                                                            
							  <div class="control-group">
							    <label class="control-label" for="textarea1">คำบรรยาย - ภาษาอังกฤษ</label>
							    <div class="controls">
                                                                <textarea class="cleditor" id="textarea1" name="desc_en" rows="3" required="required"><?=$entity[0]['desc_en']?></textarea>
							    </div>
							  </div>
							  <div class="control-group">
							  	<label class="control-label" for="name2">หัวข้อ - ภาษาญี่ปุ่น</label>
							  	<div class="controls">
							  	  <input name="title_jp" class="input-xlarge focused span10" id="name2" type="text" value="<?=$entity[0]['title_jp']?>">
							  	</div>
							  </div>
							  
							  
							  
							  <div class="control-group">
							    <label class="control-label" for="textarea2">คำบรรยาย - ภาษาญี่ปุ่น</label>
							    <div class="controls">
                                                                <textarea class="cleditor" id="textarea2" name="desc_jp" rows="3"><?=$entity[0]['desc_jp']?></textarea>
							    </div>
							  </div>
							  
                              <div class="control-group">
							  	<label class="control-label">รูปประกอบ 1</label>
							  	<div class="controls">
							  	  <input name="image1" type="file">
                                  <input type="hidden" name="image1_old" value="<?=$entity[0]['image1']?>"/>
							  	</div>
							  </div>
							  
							  <div class="control-group">
							  	<label class="control-label" for="hidePic1">ซ่อนรูปประกอบ 1</label>
							  	<div class="controls">
							  	  <label class="checkbox">
							  		<input type="checkbox" id="hidePic1" name="hide_image1" <?=$hideImage1?> />
							  		เลือกเมื่อต้องการซ่อนรูปประกอบ 1
							  	  </label>
							  	</div>
							  </div>
							  
							  <div class="control-group">
							  	<label class="control-label">รูปประกอบ 2</label>
							  	<div class="controls">
							  	  <input name="image2" type="file">
                                                                  <input type="hidden" name="image2_old" value="<?=$entity[0]['image2']?>"/>
							  	</div>
							  </div>
                                          
							<div class="control-group">
								<label class="control-label" for="hidePic2">ซ่อนรูปประกอบ 2</label>
								<div class="controls">
								  <label class="checkbox">
									<input type="checkbox" id="hidePic2" name="hide_image2" <?=$hideImage2?> />
									เลือกเมื่อต้องการซ่อนรูปประกอบ 2
								  </label>
								</div>
							</div>                
                             
                             <div class="control-group">
							  	<label class="control-label">รูปประกอบ 3</label>
							  	<div class="controls">
							  	  <input name="image3" type="file">
                                                                  <input type="hidden" name="image3_old" value="<?=$entity[0]['image3']?>"/>
							  	</div>
							 </div>  
							  
							<div class="control-group">
								<label class="control-label" for="hidePic3">ซ่อนรูปประกอบ 3</label>
								<div class="controls">
								  <label class="checkbox">
									<input type="checkbox" id="hidePic3" name="hide_image3" <?=$hideImage3?> />
									เลือกเมื่อต้องการซ่อนรูปประกอบ 3
								  </label>
								</div>
							</div>   
							                          
							  <div class="form-actions">
                                                              <input type="hidden" name="id" value="<?=$entity[0]['id']?>"/>
								<button type="submit" class="btn btn-primary">บันทีกค่า</button>
							  </div>
							</fieldset>
							
						  </form>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

    
<?php include('footer.php'); ?>
