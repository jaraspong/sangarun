<?php include('header.php');

if (isset($_POST['old_pwd']) && !empty($_POST['old_pwd'])) {
	if($_POST["new_pwd"] == $_POST["new_pwd_confirm"]){
		if(!empty($_POST['new_pwd'])){
			
			$valid = Membership::getInstance()->verify($_SESSION['username'],$_POST['old_pwd']);
		
			if($valid){
				
				$result = Membership::getInstance()->changePWD($_SESSION['username'],$_POST['new_pwd']);
				if($result>0){
					print '<script> alert("การแก้ไขรหัสผ่านเสร็จสิ้น.");</script>';
				}
			}else{
				print '<script> alert("กรุณาตรวจสอบอีกครั้ง : รหัสผ่านผิดพลาด.");</script>';
			}
		}
	}else{
		print '<script> alert("กรุณาตรวจสอบอีกครั้ง : การยืนยันรหัสใหม่ผิดพลาด.");</script>';
	}
}
//else{
//	print '<script> alert("กรุณาตรวจสอบอีกครั้ง : รหัสผ่านผิดพลาด.");</script>';
//}
?>

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Blank</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<form class="form-horizontal" action="change.php" method="POST" enctype="multipart/form-data">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Change Admin Password</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<div class="control-group">
							<label class="control-label" for="old_pwd">รหัสผ่านเดิม</label>
							<div class="controls">
							  <input name="old_pwd" class="input-xlarge focused span10" id="name2" type="password" value="">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="new_pwd">รหัสผ่านใหม่</label>
							<div class="controls">
							  <input name="new_pwd" class="input-xlarge focused span10" id="name2" type="password" value="">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="new_pwd_confirm">ยืนยันรหัสผ่านใหม่</label>
							<div class="controls">
							  <input name="new_pwd_confirm" class="input-xlarge focused span10" id="name2" type="password" value="">
							</div>
						</div>
						
						<div class="form-actions">
						    <input type="hidden" name="id" value="">
						    <button type="submit" class="btn btn-primary">บันทีกค่า</button>
						</div>						
					</div>
					
				</div><!--/span-->
			
			</div><!--/row-->

    
<?php include('footer.php'); ?>
