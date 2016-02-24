<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache');

include ("../includes/connect.php");
include ("../includes/function.php");

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }
$concepto=$_POST["concepto"];
$nominst=$_POST["ANombreInstitucion"];
$datoinst=$_POST["ADatosInstitucion"];
$telinst=$_POST["ATelefonoInstitucion"];
$pais=$_POST["Apais"];
$ciudad=$_POST["Aciudad"];
$CP=$_POST["ACP"];
$int1=$_POST["Anombre"];
$app1=$_POST["Aap_paterno"];
$apm1=$_POST["Aap_materno"];
$emailint1=$_POST["ecorreo"];
$tel1=$_POST["rTelefono1"];
$mov1=$_POST["rCelular1"];
$fecha=date("Ymd");
$impresion=0;
$pago=0;
$queryimp="SELECT nombreInstitucion,correoIntegrante FROM equipos2,integrantes2 WHERE equipos2.idEquipo=integrantes2.idEquipo and correoIntegrante like '$emailint1';";
$resultimp=mysql_query($queryimp);
$impreso= mysql_num_rows($resultimp);
if (!$impreso){
	if ($accion=="alta"){
				$consultaprevia = "SELECT max(idEquipo) as maximo FROM equipos2";
				$rs_consultaprevia=mysql_query($consultaprevia);
				$plusid=mysql_result($rs_consultaprevia,0,"maximo");
				if ($plusid=="") {$plusid=1;}
				else{$plusid++;}
		$sql="insert into equipos2 values('$plusid','$pais','$ciudad','$CP','$nominst', '$datoinst', '$telinst','$fecha');";
		$sql1="insert into integrantes2 values ('$plusid','$int1','$app1','$apm1','$emailint1','$tel1','$mov1','$concepto','$pago');";
		mysql_query($sql,$db);
		mysql_query($sql1,$db);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TURISMO Y GASTRONOM&Iacute;A</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<title>Principal</title>
<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<div id="dheader"></div>
<div id="wrapper">
	<div id="cIzq">

        <a class="bLink" href="../info.html">Incripci&oacute;n al Congreso</a>

		<a class="bLink" href="../bases.html">Bases del concurso de Im&aacute;genes Alternativas</a>

		<a class="bLink" href="../../index.php">Salir</a>
	</div>
		<div id="cContenido">

	<div align="center">
  	<table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
		<tr>
		    <td colspan="2" ><div align="center">
			<form action="http://www.utcancun.edu.mx/SPEL/jCryption-1.2/index.php" method="post">
            <h5> Usted se ha registrado exitosamente, para generar su ficha de pago, favor de hacer clic en el bot&oacute;n </h5>
            <input type="hidden" name="nombre" value="<?php echo $Anombre ?>">
            <input type="hidden" name="ap_paterno" value="<?php echo $app1 ?>">
            <input type="hidden" name="ap_materno" value="<?php echo $apm1 ?>">
            <input type="hidden" name="correo" value="<?php echo $emailint1 ?>">
			<input type="hidden" name="concepto" value="<?php echo $concepto ?>">
            <input type="hidden" name="tipousuario" value="5">
            <input type="hidden" name="user" value="<?php echo $plusid ?>">
            <input name="im value=" type="submit" value="Generar ficha" class="bLinkimp" />
            </form>
            </div>
			</td>
	    </tr>
		<tr>
		    <td colspan="2" width="80%" align="center">
            <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
				 <tr>
    				<td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Participante n&uacute;mero <?php echo $plusid ?></strong></font></td>
                </tr>
                <tr>
                <td class="itemImparTabla"><h4><strong>Pa&iacute;s:</strong></h4></td>
                <td class="itemParTabla"><?php echo htmlentities($pais)  ?></td>
                <td width="95" class="itemImparTabla"><h4><strong>Ciudad:</strong></h4></td>
                <td width="188" class="itemParTabla"><?php echo htmlentities($ciudad)?></td>
              </tr>
              <tr bgcolor="aaaaaa">
			    <td width="72" class="itemImparTabla"><h4><strong>Nombre de la Instituci&oacute;n:</strong></h4></td>
			    <td  colspan="3" class="itemParTabla"><?php echo htmlentities($nominst)?></td>
				</tr>
			  <tr>
		        <td  width="72"class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
			    <td width="153" class="itemParTabla"><h5><?php echo htmlentities($telinst) ?></h5></td>
                <td class="itemImparTabla"><h4><strong>C.P:</strong></h4></td>
                <td class="itemParTabla"><?php echo htmlentities($CP) ?></td>
   			  </tr>
			  <tr>
			    <td width="72" class="itemImparTabla"><h4><strong>Direcci&oacute;n:</strong></h4></td>
			    <td class="itemParTabla" colspan="3"><h5><?php echo htmlentities($datoinst) ?></h5></td>
  				</tr>
				</table>
                </td>
		</tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
		<td width="80%" colspan="2">
		<table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
			<tr>
				<td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del participante</strong></font></td>
			</tr>
			<tr bgcolor="aaaaaa">
				<td width="89" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
				<td  colspan="3" class="itemParTabla"><?php echo htmlentities("$Anombre $app1 $apm1")?></td>
			</tr>
			<tr>
				<td  width="89"class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
				<td width="178" class="itemParTabla"><h5><?php echo htmlentities($rTelefono1)?></h5></td>
				<td width="20%" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
				<td width="205" class="itemParTabla"><h5><?php echo htmlentities($rCelular1)?></h5></td>
			</tr>
			<tr>
				<td width="89" class="itemImparTabla"><h4><strong>C&oacute;rreo:</strong></h4></td>
				<td class="itemParTabla" colspan="3"><h5><?php echo htmlentities($emailint1)?></h5></td>
			</tr>
		</table>
		</td>
		</tr>
       	<tr>
			<td colspan="2"><div align="center">&nbsp;</div></td>
        </tr>
		<tr>
		<td colspan="2"><div align="center">
                     <p>
                        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
                     </p>
                      <form action="http://www.utcancun.edu.mx/SPEL/jCryption-1.2/index.php" method="post">
			            <h5> Usted se ha registrado exitosamente, para generar su ficha de pago, favor de hacer clic en el bot&oacute;n </h5>
			            <input type="hidden" name="nombre" value="<?php echo $Anombre ?>">
			            <input type="hidden" name="ap_paterno" value="<?php echo $app1 ?>">
			            <input type="hidden" name="ap_materno" value="<?php echo $apm1 ?>">
			            <input type="hidden" name="correo" value="<?php echo $emailint1 ?>">
						<input type="hidden" name="concepto" value="<?php echo $concepto ?>">
			            <input type="hidden" name="tipousuario" value="5">
			            <input type="hidden" name="user" value="<?php echo $plusid ?>">
			            <input name="im value=" type="submit" value="Generar ficha" class="bLinkimp" />
		            </form>
	  </div>
		</td>
		</tr>
        </table>
        <br /><br />
</div>
</td>
</tr>
</table>
    <br />
    <br />
	<div id="dfeet"></div>
        </div>
		</div>
      </body>
</html>
<?php
$destinatario=$emailint1;
$asunto="Registro al Concurso de IMAGENES ALTERNATIVAS";
$cuerpo = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TURISMO Y GASTRONOM&Iacute;A</title>
<style type="text/css">
@charset "utf-8";
/* CSS Document */
root {
    display: block;
}
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p,
blockquote, pre, a, abbr, acronym, address, big,
cite, code, del, dfn, em, font, img,
ins, kbd, q, s, samp, small, strike,
sub, sup, tt, var, dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
center, u, b, i {
     margin: 0;
     padding: 0;
     border: 0;
     outline: 0;
     font-weight: normal;
     font-style: normal;
     font-size: 100%;
     font-family: inherit;
}
body {
     line-height: 1;
     color: #666;
     text-align:center;
}
:focus {
     outline: 0
}
ol, ul {
     margin-left: 1em;
     width: 90%;
}
table {
     border-collapse: collapse;
     border-spacing: 0
}
input, textarea {
     margin: 0;
     padding: 0
}
hr {
     margin: 0;
     padding: 0;
     border: 0;
     color: #000;
     background-color: #000;
     height: 1px
}
img {
    border: 0;
}
/*---------------------------------------------*/
body {
	color: #555;
	background-color: #FFFFFF;
	font-family: Verdana,Arial,sans-serif;
}
p {
	text-align:justify;
	margin:1em;
	line-height:1.35em;
	padding:1em;
}
li,td{
line-height:1.35em;
text-align:left;
}
li{
margin-left:1.5em;
}
#dheader {
	width:1000px;
	height:200px;
	background:url("http://www.utcancun.edu.mx/concursogastronomia2011/imagenes/header.jpg") no-repeat left #FFF;
}
#cIzq {
	width:148px;
	height:2500px;
	float:left;
	display:block;
	background:url("http://www.utcancun.edu.mx/concursogastronomia2011/imagenes/col_left.jpg") repeat-y top left #FFFFFF;
}
#cIzq2 {
	width:40px;
	height:auto;
	float:left;
}
#wrapper {
	height:auto;
	overflow:auto;
}
#cContenido, #cContenido2 {
	float:left;
	width:850px;
	position:absolute left:0,rigt:0;
	text-align:center;
	display:block;
	}
#cContenido2 {
	margin-left:150px;
}
#botonBusqueda {
	position:relative;
	top:5%;
	left:1%;
	width:80%;
	text-align:right;
	margin-top:.5em;
	padding-top:1em;
/*	border-top:solid 1px #696969;	*/
}
#tituloForm {
	text-align:center;
	font-size:1.35em;
	font-weight: bold;
}
.tdTitulo
{
	font-size:1.05em;
	color:#222222;
	border-bottom:1px solid #aaa;
}
#lista-errores {
	color:red;
	font-size:0.7em;
}
.bLink {
	padding:0.5em;
	display:block;
	border: 2px solid #90e3df;
	width:120px;
	margin:1em auto;
	background: #00baa9;
	color:#FFF;
	text-decoration: none;
	text-align:center;
}
.bLinkimp {
	padding:0.5em;
	display:block;
	border: 2px solid #0964B7;
	width:120px;
	margin:1em auto;
	background:#0AC183;
	color:#FFF;
	text-decoration:none;
	text-align:center;
	font-style:normal;
}
a:hover {
	text-decoration: underline;
}
.itemTituloTabla{
background-color:#a3abf6;
text-align:center;
border:#fd6b3d;
}
.itemParTabla {
	background-color:#a3f6e8;
	text-align:center;
	border:#fd6b3d;
}
.itemImparTabla {
	background-color:#8ccbd3;
	text-align:center;
	border:#fd6b3d;
}
#dfeet {
     width:1000px;
     height:100px;
     background:url("http://www.utcancun.edu.mx/concursogastronomia2011/imagenes/foot.jpg") no-repeat left #FFF;
}
</style>
</head>

<body>
<div id="dheader"><img src="http://www.utcancun.edu.mx/concursogastronomia2011/imagenes/header.jpg" width="1000" height="200"/></div>
<div id="wrapper">
	<div id="cIzq"></div>
		<div id="cContenido">

	<div align="center">
  	<table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>

	  <tr>
		<td colspan="2" width="80%" align="center">
		<table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
				 <tr>
    				<td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Participante n&uacute;mero '.$plusid .'</strong></font></td>
                </tr>
                <tr>
                <td class="itemImparTabla"><h4><strong>Pa&iacute;s:</strong></h4></td>
                <td class="itemParTabla">'.$pais.'</td>
                <td width="95" class="itemImparTabla"><h4><strong>Ciudad:</strong></h4></td>
                <td width="188" class="itemParTabla">'.$ciudad.'</td>
              </tr>
              <tr bgcolor="aaaaaa">
			    <td width="72" class="itemImparTabla"><h4><strong>Nombre de la Instituci&oacute;n:</strong></h4></td>
			    <td  colspan="3" class="itemParTabla">'.$nominst.'</td>
				</tr>
			  <tr>
		        <td  width="72"class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
			    <td width="153" class="itemParTabla"><h5>'.$telinst.'</h5></td>
                <td class="itemImparTabla"><h4><strong>C.P:</strong></h4></td>
                <td class="itemParTabla">'.$CP.'</td>
   			  </tr>
			  <tr>
			    <td width="72" class="itemImparTabla"><h4><strong>Direcci&oacute;n:</strong></h4></td>
			    <td class="itemParTabla" colspan="3"><h5>'.$datoinst.'</h5></td>
  				</tr>
				</table>
		</td>
	  </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
		<tr>
		<td width="80%" colspan="2">
			   <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
				<tr>
				    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del representante:</strong></font></td>
				</tr>
					<tr bgcolor="aaaaaa">
				    <td width="89" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
				    <td  colspan="3" class="itemParTabla"><h5>'.$Anombre.' '.$app1.' '. $apm1.'</h5></td>
				</tr>
				<tr>
				    <td  width="89"class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
				    <td width="178" class="itemParTabla"><h5>'.$rTelefono1.'</h5></td>
				    <td width="20%" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
				    <td width="205" class="itemParTabla"><h5>'.$rCelular1.'</h5></td>
				</tr>
				<tr>
				    <td width="89" class="itemImparTabla"><h4><strong>Correo:</strong></h4></td>
    				<td class="itemParTabla" colspan="3"><h5>'.$emailint1.'</h5></td>
 				</tr>
				</table>
		  </td>
		</tr>
</table>
<br />
<br />


</div>
			</td>
					</tr>
					</table>
					</div>
                    <br />
                    <br />
					<div align=\"center\">

	  </div>

		</div>
	</body>
	</html>
';




require_once 'class.phpmailer.php';
$micorreo="mrivero@utcancun.edu.mx";
$nombreUT="Congreso Internacional de Gastronomia y Turismo";
$nombreadmin="Manuel Rivero";
$asuntoUt=$asunto;
$sucorreo=$destinatario;

//////////////////////////////////////////////DATOS DE EMAIL DE confirmacion////////////////////////////////////
$mail2= new PHPMailer ();
$mail2->From = $micorreo;
$mail2 ->FromName = $nombreUT;
$mail2-> AddAddress ($sucorreo);//aqui va el nombre del usuario que se le rep
$mail2->AddReplyTo($micorreo,$nombreadmin);//aqui va EL NOMBRE nancy
$mail2-> Subject = "$asuntoUt";
$mail2->IsSMTP();
$mail2->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail2->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail2->Port       = 465;
$mail2->SMTPAuth = true;
$mail2->Username = 'emprendedorut@gmail.com';
$mail2->Password = 'utcancun99';
$mail2->IsHTML(true); // El correo se enva como HTML
$mail2->MsgHTML($cuerpo);


	if(!$mail2->Send()){
	$msg='Error: '.$mail2->ErrorInfo;
	}
	else{
	$msg="<p>Tu informacion se recibio correctamente <br> Se ha enviado una confirmacion al correo <b>$correo</b></p>";
	}
}
else{
	
?>
<!-- DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TURISMO Y GASTRONOM&Iacute;A</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<title>Principal</title>
<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div id="dheader"></div>
<div id="wrapper">
	<div id="cIzq">

        <a class="bLink" href="../info.html">Incripci&oacute;n al Congreso</a>

		<a class="bLink" href="../bases.html">Bases del concurso de Im&aacute;genes Alternativas</a>

		<a class="bLink" href="../../index.php">Salir</a>
	</div>
		<div id="cContenido">

	<div align="center">
  	<table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
    	<tr>
        <td colspan="2" align="center"><div align="center"><p><font color="#FF0000" style="font-size: 1.5em">
        El correo que se intenta dar de alta, ya se hab&iacute;a registrado con anterioridad.</font></p></div>
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
		    <td colspan="2" width="80%" align="center">
	            <table width="80%" align="center" cellpadding="2" cellspacing="2" style="margin:auto">
<tr>
<?php $reg_resultado="SELECT * FROM equipos2,integrantes2 WHERE equipos2.idEquipo = integrantes2.idEquipo And correoIntegrante like '$emailint1'";
 $result=mysql_query($reg_resultado);
 ?>
 <tr><td colspan="2">Datos actualmente registrados con este correo:</tr>
	<tr><td colspan="2">&nbsp;</td></tr>		
  <td>Participante:</td><td><?php echo mysql_result($result,0,"idEquipo") ?></td>
</tr>
<tr>
	<td width="72">Instituci&oacute;n:</td>
	<td><?php echo htmlentities(mysql_result($result,0,"nombreInstitucion"))?></td>
</tr>
<tr>
	<td width="89">Nombre:</td>
	<td  ><?php echo htmlentities(mysql_result($result,0,'nombreIntegrante1') .' '.mysql_result($result,0,'apPaternoIntegrante1').' '.mysql_result($result,0,'apMaternoIntegrante1'))?></td>
</tr>
<tr>
	<td  width="89">Tel&eacute;fono:</td>
	<td width="178"><?php echo htmlentities(mysql_result($result,0,"telefonoIntegrante"))?></td>
</tr>
<tr>
	<td width="20%">M&oacute;vil:</td>
	<td width="205"><?php echo htmlentities(mysql_result($result,0,"movilIntegrante"))?></td>
</tr>
<tr>
	<td width="89" >C&oacute;rreo:</td>
	<td><strong><?php echo htmlentities(mysql_result($result,0,"correoIntegrante"))?></strong></td>
</tr>
		</table>
		</td>
		</tr>
        <tr><td colspan="2">&nbsp;<td></tr>
		<tr>
		<td colspan="2"><div align="center"><input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
                    <p><a href="../form1.php">Regresar al registro</a></p>
</div>
		</td>
		</tr>
        </table>
</div>
<div id="dfeet"></div>
</div>
</div>
	</body>
</html>
<?php
}
?>

