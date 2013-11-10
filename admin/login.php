<?php

	$no_visible_elements=true;
	include('header.php'); 

	if(isset($_POST['username']) && isset($_POST['password'])){
		$valid = Membership::getInstance()->validate_user($_POST['username'],$_POST['password']);
	}
?>

			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome to Polyplast Backend</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						<?php
	
							if( isset($valid)){
								if(!$valid){
									echo('ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้องกรุณาลองใหม่อีกครั้ง');
								}
							}else{
								echo('กรุณาเข้าสู่ระบบด้วย ชื่อผู้ใช้ และ รหัสผ่าน.');
							}
						?>
						
					</div>
					<form class="form-horizontal" action="#" method="post">
						<fieldset>
							<div class="input-prepend" title="ชื่อผู้ใช้" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="รหัสผ่าน" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="" />
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>
