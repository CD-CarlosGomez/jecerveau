	<!--div class="row"-->
		<div class="col-xs-6 col-md-4"></div>
		<div class="col-xs-6 col-md-4">
			<form name="frm_Login_h" id="" class="vertical"  method="POST" action="" role="form" >
					<blockquote><center>
					<?php echo _s("Pleace introduce the username and password to <br><span class='r'>Login</span> .");	?>
					</center>
					</blockquote>
					<fieldset >
						<span><legend id=""><?php echo _s("Login Form");?></legend></span>
						<div class="form-group">
							<label for="txtUsername" class="" id=""><?php echo _s("User:") ?></label>
							<input name="txtUsername" class="form-control" id="" type="text" maxlength="40">
						</div>
						<div class="form-group">
							<label for="txtPassword" id="" ><?php echo _s("Password:");?></label>
							<input name="txtPassword" class="form-control" id="" type="password"   maxlength="40" >
						</div>					
						<div class="form-group">
							<input name="button" class="btn btn-default" id="" type="submit"  value="<?php echo _s('Login'); ?>">
						</div>
					</fieldset>
			</form>
		</div>
		<div class="col-xs-6 col-md-4"></div>
	<!--/div-->