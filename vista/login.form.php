	<!--div class="row"-->
		<div class="col-xs-6 col-md-4"></div>
		<div class="col-xs-6 col-md-4">
			<form name="Login" id="webpay" class="vertical" method="POST" action="index.php" >
				
					<blockquote id="" style="display: block"><center>
					<?php  echo _s("Pleace introduce the username and password to <br><span class='r'>Login</span> .");	?>
					</center>
					</blockquote>
					<fieldset >
						<span>
							<legend id=""  style="display: block"><?php echo _s("Login Form");?></legend>
						</span>
						<p>
							<label for="txtUsername" id="" style="display: block"><?php echo _s("User:") ?></label>
							<input type="text" name="txtUsername" id="" class="col_3" maxlength="40">
						</p>
						<p>
							<label for="txtPassword" id="" style="display: block"><?php echo _s("Password:");?></label>
							<input type="text"  name="txtPassword" id="" class="col_3"  maxlength="40" >
						</p>
					
					<div id="espanol32" style="display: block">
						<p class="boton">
							<input class="boton_pago" type="submit" name="button" id="button" value="<?php echo _s('Login'); ?>">
						</p>
					</div>
					</fieldset>
			</form>
		</div>
		<div class="col-xs-6 col-md-4"></div>
	<!--/div-->