	<div class="col_12">	
		<form name="C" id="webpay" method="POST" action="index.php">
				<blockquote id="" style="display: block"><center>
				<?php  echo _s("Pleace introduce the username and password to <br><span class='r'>Login</span> .");	?>
				</center>
				</blockquote>
				<fieldset>
					<span>
						<legend id=""  style="display: block"><?php echo _s("Login Form");?></legend>
					</span>
					<p>
						<label for="txtUsername" id="" style="display: block"><?php echo _s("User:") ?></label>
						<input type="text" name="txtUsername" id="text1" maxlength="40">
					</p>
					<p>
						<label for="txtPassword" id="" style="display: block"><?php echo _s("Password:");?></label>
						<input type="text"  name="txtPassword" value="" maxlength="40" >
					</p>
				</fieldset>
				<div id="espanol32" style="display: block">
					<p class="boton">
						<input class="boton_pago" type="submit" name="button" id="button" value="<?php echo _s('Login'); ?>">
					</p>
				</div>
		</form>
	</div>