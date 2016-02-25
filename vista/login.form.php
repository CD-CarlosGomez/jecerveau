		<style type="text/css">
		    	* { font: normal 10px Verdana, Arial, Helvetica; color:#000000;} /* Seletor universal. Define los generales de la forma. Deshabilitar en caso de presentarse problemas con algun navegador*/
				#webpay { width: 60em;} /* Ancho de la forma */
				#webpay input {width: 18em} /* Define el ancho de los campos input, sustituye a size */
				#webpay input.largo {width: 22em} /* Define un ancho mayor para algunos campos input. Requiere agregar class=largo al campo */
				#webpay input.maslargo{with: 44em}
				#webpay input.corto {width: 6em} /* Define un ancho menor para algunos campos input. Requiere agregar class=corto al campo */
				#webpay input[readonly] {border: 0px solid transparent; background-color: transparent} /* Desaparece la apariencia de los campos marcados readonly */
				#webpay legend {font-size:140%; font-weight:bold; background-color: #fff;} /*Caracter?sticas de los t?tulos de grupos de campos*/
				#webpay label {line-height:150%; border:none; display:block; font-weight:bold;}/*Caracter?sticas de las etiquetas de los campos*/
				#webpay fieldset {font-weight:normal; font-size:100%; margin:10px 0 0 0; border:1px dotted #00659c;} /* Ideal para controlar la l?nea alrededor del grupo de campos*/
				/* Hace que los campos se distribuyan en 2 columnas. Para tres cambiar width:32%  y para una cambiar width: 100%*/
				#webpay fieldset.datos_cliente p {width:49%; float:left; display: block;} 		/* Para secci?n Datos de quien realiza la compra */
				#webpay fieldset.datos_operacion p {width:49%; float:left; display: block;} 	/* Para secci?n Datos de la Operaci?n */
				#webpay fieldset.datos_tarjeta p {width:49%; float:left;} 		/* Para secci?n Datos de la Tarjeta*/
				#webpay fieldset.datos_tarjetahab p {width:49%; float:left; display: block;} 	/* Para seccion Datos del Tarjetahabiente */
				#webpay blockquote {margin:20px 0 20px 0; padding:10px; border:1px solid #f7f3de; background:#558522; line-height:130%; font-size:100%; color:#fff; text-align:center; clear:both; } /* Para usarse cuando se desea resaltar un mensaje*/
				#webpay .r {color:#FF0000; font-weight: bold;} /* Color y tama?o del asterisco para requeridos*/
				#webpay h4 {color:white; font-weight:bold;}
				#webpay br {clear: both;}
				#webpay p.boton {width: 100%; text-align : center;} /* Para la distribucion de botones */
				#webpay input.boton_pago {color: #000000; background: #FFF00; width: 8em;} /* Estilo para el boton de pago */
				#webpay .ttip {border:0px gray solid; padding:0px;  position: relative; background-color: #FFFFFF; margin: 0px;}
				#webpay fieldset.datos_captcha p {width:100%; text-align:center; display: block;} 	/* Para seccion Datos Captcha */
        		#webpay fieldset.datos_captcha blockquote {margin:5px 0 5px 0; padding:2px; border:1px solid #e6e6e6; background:#558522; line-height:130%; font-size:100%; color:#fff; text-align:center; clear:both; } /* Para usarse cuando se desea resaltar un mensaje en Captcha*/
				#webpay a:hover {color:#444; text-decoration:none;}
				#webpay .idioma { line-height:150%; border:none; display:block; font-weight:bold; width:100%; float:left; text-align:right; visibility: hidden;}
				#webpay input.cortoCP {width: 9em} /* Define un ancho menor para algunos campos input. */
		</style>
        <script src="../js/jquery/jquery-1.8.3.framewk.dev.js" type="text/javascript"></script>
		<form name="C" id="webpay" method="POST" action="controlador/checkuser.neg.php">
				<blockquote id="espanol1" style="display: block"><h4>
				<?php  echo _s("Pleace introduce the username and password to <br><span class='r'>Login</span> .");	?>
					</h4>
				</blockquote>
				<fieldset class="loginForm">
					<span>
						<legend id="espanol2"  style="display: block"><?php echo _s("Login Form");?></legend>
					</span>
					<p>
						<label for="cc_name1" id="espanol3" style="display: block"><?php echo _s("User:") ?></label>
						<input type="text" name="txtUsername" id="cc_name1" value=""  maxlength="40">
					</p>
					<p>
						<label id="espanol4" style="display: block"><?php echo _s("Password:");?></label>
						<input type="text" name="txtPassword" value="" maxlength="40" id="paterno1">
					</p>
				</fieldset>
				<div id="espanol32" style="display: block">
					<p class="boton">
						<input class="boton_pago" type="submit" name="button" id="button" value="<?php echo _s('Login'); ?>">
					</p>
				</div>
		</form>
