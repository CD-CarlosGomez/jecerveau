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
$int1=$_POST["Anombre"];
$app1=$_POST["Aap_paterno"];
$apm1=$_POST["Aap_materno"];
$int2=$_POST["AIntegrante2"];
$app2=$_POST["ap_paterno2"];
$apm2=$_POST["ap_materno2"];
$int3=$_POST["AIntegrante3"];
$app3=$_POST["ap_paterno3"];
$apm3=$_POST["ap_materno3"];
$int4=$_POST["AIntegrante4"];
$app4=$_POST["ap_paterno4"];
$apm4=$_POST["ap_materno4"];
$emailint1=$_POST["ecorreo"];
$emailint2=$_POST["eEmail2"];
$emailint3=$_POST["eEmail3"];
$emailint4=$_POST["eEmail4"];
$tel1=$_POST["rTelefono1"];
$tel2=$_POST["rTelefono2"];
$tel3=$_POST["rTelefono3"];
$tel4=$_POST["rTelefono4"];
$mov1=$_POST["rCelular1"];
$mov2=$_POST["rCelular2"];
$mov3=$_POST["rCelular3"];
$mov4=$_POST["rCelular4"];
$fecha=date("Ymd");
$platillo1=$_POST["Aplatillo1"];
$platillo2=$_POST["Aplatillo2"];
$platillo3=$_POST["Aplatillo3"];
$platillo4=$_POST["Aplatillo4"];
$descplatillo1=$_POST["descplatillo1"];
$descplatillo2=$_POST["descplatillo2"];
$descplatillo3=$_POST["descplatillo3"];
$descplatillo4=$_POST["descplatillo4"];
$userfile1=$_FILES["userfile1"];
$userfile2=$_FILES["userfile2"];
$userfile3=$_FILES["userfile3"];
$userfile4=$_FILES["userfile4"];
$pago=0;
$queryimp="SELECT nombreIntitucion, correoIntegrante  FROM equipos,integrantes WHERE equipos.idEquipo=integrantes.idEquipo and correoIntegrante like '$emailint1';";
$resultimp=mysql_query($queryimp);
$impreso= mysql_num_rows($resultimp);
if (!$impreso){
//if (1){
if ($accion=="alta"){
		$consultaprevia = "SELECT max(idEquipo) as maximo FROM equipos";
		$rs_consultaprevia=mysql_query($consultaprevia);
		$plusid=mysql_result($rs_consultaprevia,0,"maximo");
		if ($plusid=="") {$plusid=1;}
		else{$plusid++;}
$sql="insert into equipos values('$plusid','$nominst', '$datoinst', '$telinst','$fecha');";
$sql1="insert into integrantes values (
    $plusid,'$int1','$app1','$apm1',
			'$int2','$app2','$apm2',
			'$int3','$app3','$apm3',
			'$int4','$app4','$apm4',
			'$emailint1','$emailint2','$emailint3','$emailint4',
			'$tel1','$tel2','$tel3','$tel4',
			'$mov1','$mov2','$mov3','$mov4','$concepto','$pago');";
mysql_query($sql,$db);
mysql_query($sql1,$db);

if ($userfile1['name']<>"") {
		   $foto_name1="foto".$Aplatillo1.$plusid.".jpg";
		   if (! copy ($userfile1['tmp_name'], "../imagenes/$foto_name1"))
			{
			  echo "<h2>No se ha podido copiar la foto de $platillo1</h2>\n";
			};
		};
if ($userfile2<>"none") {
		   $foto_name2="foto".$Aplatillo2.$plusid.".jpg";
		   if (! copy ($userfile2['tmp_name'], "../imagenes/$foto_name2"))
			{
			  echo "<h2>No se ha podido copiar la foto de $platillo2</h2>\n";
			};
		};
if ($userfile3<>"none") {
		   $foto_name3="foto".$Aplatillo3.$plusid.".jpg";
		   if (! copy ($userfile3['tmp_name'], "../imagenes/$foto_name3"))
			{
			  echo "<h2>No se ha podido copiar la foto de $platillo3</h2>\n";
			};
		};
if ($userfile4<>"none") {

		   $foto_name4="foto".$Aplatillo4.$plusid.".jpg";
		   if (! copy ($userfile4['tmp_name'], "../imagenes/$foto_name4"))
			{
			  echo "<h2>No se ha podido copiar la foto de $platillo4</h2>\n";
			};
		};

$sql5="insert into menu values ($plusid,'Amouse Bouche','$platillo1','$descplatillo1','$foto_name1');";
$sql6="insert into menu values ($plusid,'Entrada','$platillo2','$descplatillo2','$foto_name2');";
$sql7="insert into menu values ($plusid,'Plato Fuerte','$platillo3','$descplatillo3','$foto_name3');";
$sql8="insert into menu values ($plusid,'Postre','$platillo4','$descplatillo4','$foto_name4');";
mysql_query($sql5,$db);
mysql_query($sql6,$db);
mysql_query($sql7,$db);
mysql_query($sql8,$db);
$strquery="insert into solicitud values ";
$filas=$_POST["filas"];
for ($i=0;$i<=$filas;$i++){
if (!empty($_POST['cantmat'][$i])){
$strquery.="($plusid,'','".$_POST['descmat'][$i]."','".$_POST['cantmat'][$i]."'),";}}
$strquery=substr($strquery,0,(strlen($strquery)-1)).';';
mysql_query($strquery) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TURISMO Y GASTRONOM&Iacute;A</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" media="print"/>
<title>Principal</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="dheader"></div>
<div id="wrapper">
	<div id="cIzq">

        <a class="bLink" href="../info.html">Incripci&oacute;n al Congreso</a>

		<a class="bLink" href="../bases.html">Bases</a>

		<a class="bLink" href="../../index.php">Salir</a>
	</div>
		<div id="cContenido">

	<div align="center">
  	<table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
		<tr>
		  <td colspan="2" ><div align="center"><form action="http://www.utcancun.edu.mx/SPEL/jCryption-1.2/index.php" method="post">
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
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Equipo n&uacute;mero <?php echo $plusid ?></strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="86" class="itemImparTabla"><h4><strong>Nombre de la Instituci&oacute;n:</strong></h4></td>
    <td  colspan="3" class="itemParTabla"><?php echo htmlentities("$nominst")?></td>
</tr>
<tr>
    <td  width="86"class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="504" class="itemParTabla" colspan="3"><h5><?php echo htmlentities($telinst) ?></h5></td>
    </tr>
<tr>
    <td width="86" class="itemImparTabla"><h4><strong>Direcci&oacute;n:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5><?php echo htmlentities($datoinst) ?></h5></td>
  </tr>
</table>
          </td>
		</tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
		<tr>
			<td width="80%" colspan="2">
  <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del representante:</strong></font></td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
		<tr>
				<td width="80%" colspan="2">
				<table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del segundo integrante:</strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="84" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
    <td colspan="3" class="itemParTabla"><h5><?php echo htmlentities("$AIntegrante2 $app2 $apm2")?></h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="174" class="itemParTabla"><h5><?php echo htmlentities($rTelefono2)?></h5></td>
    <td width="109" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
    <td width="194" class="itemParTabla"><h5><?php echo htmlentities($rCelular2)?></h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>C&oacute;rreo:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5><?php echo htmlentities($eEmail2)?></h5></td>
</tr>
</table>
              </td>
		</tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    <tr>
  <td width="80%" colspan="2">
  <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del tercer integrante:</strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="85" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
    <td colspan="3" class="itemParTabla"><h5><?php echo htmlentities("$AIntegrante3 $app3 $apm3")?></h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="179" class="itemParTabla"><h5><?php echo htmlentities($rTelefono3)?></h5></td>
    <td width="103" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
    <td width="194" class="itemParTabla"><h5><?php echo htmlentities($rCelular3)?></h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>C&oacute;rreo:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5><?php echo htmlentities($eEmail3)?></h5></td>
</tr>
</table>
  </td>
		</tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <tr>
    <tr>
  <td width="80%" colspan="2">
  <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del cuarto integrante:</strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="84" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
    <td colspan="3" class="itemParTabla"><h5><?php echo htmlentities("$AIntegrante4 $app4 $apm4")?></h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="182" class="itemParTabla"><h5><?php echo htmlentities($rTelefono4)?></h5></td>
    <td width="103" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
    <td width="192" class="itemParTabla"><h5><?php echo htmlentities($rCelular4)?></h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>C&oacute;rreo:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5><?php echo htmlentities($eEmail4)?></h5></td>
</tr>
</table>
  </td>
		</tr>
		<tr>
			<td width="15%">&nbsp;</td>
			<td width="58%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><div align="center">
            <table cellspacing="4" cellpadding="4" border="1" width="80%" bgcolor=dddddd>
<tr>
    <td width="80%"colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Men&uacute;</strong></font></td>
</tr>
<tr>
    <td width="20%" class="itemImparTabla">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
		    <td class="itemImparTabla" width="20%"><?php echo htmlentities($Aplatillo1) ?></td>
		</tr>
		</table>
		<img src="../imagenes/<?php echo $foto_name1?>" width="160px" height="140px" border="1">
	</td>
    <td width="20%" class="itemImparTabla">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
		    <td class="itemImparTabla" width="20%"><?php echo htmlentities($Aplatillo2) ?></td>
		</tr>
		</table>
		<img src="../imagenes/<?php echo $foto_name2?>" width="160px" height="140px" border="1">
	</td>
    <td width="20%" class="itemImparTabla">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
		    <td class="itemImparTabla" width="20%"><?php echo htmlentities($Aplatillo3) ?></td>
		</tr>
		</table>
		<img src="../imagenes/<?php echo $foto_name3?>" width="160px" height="140px" border="1" />
	</td>
    <td width="20%"class="itemImparTabla">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
			<td class="itemImparTabla" width="20%"><?php echo htmlentities($Aplatillo4) ?></td>
		</tr>
		</table>
		<img src="../imagenes/<?php echo $foto_name4?>" width="160px" height="140px" border="1">
	</td>
</tr>
<tr>
    <td class="itemParTabla" width="20%"><div align="justify"><p><?php echo htmlentities($descplatillo1) ?></p>
    </div></td>
    <td class="itemParTabla" width="20%"><div align="justify"><p><?php echo htmlentities($descplatillo2) ?></p>
    </div></td>
    <td class="itemParTabla" width="20%"><div align="justify"><p><?php echo htmlentities($descplatillo3) ?></p>
    </div></td>
    <td class="itemParTabla" width="20%"><div align="justify"><p><?php echo htmlentities($descplatillo4) ?></p>
    </div></td>
</tr>
</table>
<br />
<div align="center">
<table width="80%" cellspacing=0 cellpadding=3 border=0>
<tr>
<td colspan="3" class="itemTituloTabla"><div align="center" class="Estilo1">Lista de equipo menor solicitado</div></td>
</tr>
<tr>
	<td width="4%" class="itemParTabla">#</td>
	<td width="5%" class="itemParTabla"> Cantidad </td>
	<td width="30%" class="itemParTabla"> Material </td>
</tr>
<?php
 $sel_resultado="SELECT descripcionMaterial,cantidad FROM solicitud WHERE idEquipo=$plusid";
 $res_resultado=mysql_query($sel_resultado);
 $contador=0;
  while ($contador < mysql_num_rows($res_resultado)) {
	if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla";	}?>
	<tr>
		<td width="4%" class="<?php echo $fondolinea?>"><?php echo $contador+1;?></td>
		<td width="5%" class="<?php echo $fondolinea?>"><div align="center"><?php echo mysql_result($res_resultado,$contador,"cantidad")?></div></td>
		<td width="30%" class="<?php echo $fondolinea?>"><div align="left"><?php echo htmlentities(mysql_result($res_resultado,$contador,"descripcionMaterial"))?></div></td>
	</tr>
	<? $contador++;	}
	?>
	</table>
</div>
</div>
			</td>
					</tr>
					</table>
					</div>
                    <br />
                    <br />
					<div align="center">

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


        <div id="dfeet"></div>
		</div>
        </div>
	</body>
</html>
<?php
$destinatario=$emailint1;
$asunto="Registro al Concurso de COCINA MEXICANA";
$cuerpo = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TURISMO Y GASTRONOM&Iacute;A</title>
<title>Principal</title>
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
	background:url(\'http://www.utcancun.edu.mx/concursogastronomia2011/imagenes/header.jpg\') no-repeat left #FFF;
}
#cIzq {
	width:148px;
	height:2500px;
	float:left;
	display:block;
	background:url(\'http://www.utcancun.edu.mx/concursogastronomia2011/imagenes/col_left.jpg\') repeat-y top left #FFFFFF;
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
     background:url(\'http://www.utcancun.edu.mx/concursogastronomia2011/imagenes/foot.jpg\') no-repeat left #FFF;
}
</style>
</head>

<body>
<div id="dheader"></div>
<div id="wrapper">
	<div id="cIzq"></div>
	<div id="cContenido">
		<div align="center">
  			<table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
		<tr>
		<td colspan="2" ><div align="center"><form action="http://www.utcancun.edu.mx/SPEL/jCryption-1.2/index.php" method="post">
         <h5> Usted se ha registrado exitosamente, para generar su ficha de pago, favor de hacer clic en el bot&oacute;n </h5>
         <input type="hidden" name="nombre" value='.$Anombre .'>
         <input type="hidden" name="ap_paterno" value='.$app1.'>
         <input type="hidden" name="ap_materno" value='.$apm1.'>
         <input type="hidden" name="correo" value='.$emailint1.'>
		 <input type="hidden" name="concepto" value='.$concepto.'>
         <input type="hidden" name="tipousuario" value="5">
         <input type="hidden" name="user" value='.$plusid.'>
         <input name="im value=" type="submit" value="Generar ficha" class="bLinkimp" />
         </form>
         </div>
        </td>
	  </tr>
	  <tr>
		<td colspan="2" width="80%" align="center">
			<table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
			<tr>
    			<td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Equipo n&uacute;mero '.$plusid .'</strong>			</font></td>
			</tr>
			<tr bgcolor="aaaaaa">
    		<td width="86" class="itemImparTabla"><h4><strong>Nombre de la Instituci&oacute;n:</strong></h4></td>
    		<td  colspan="3" class="itemParTabla">'.htmlentities($nominst).'</td>
			</tr>
			<tr>
    			<td  width="86"class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    			<td width="504" class="itemParTabla" colspan="3"><h5><'.htmlentities($telinst).'</h5></td>
    		</tr>
			<tr>
    			<td width="86" class="itemImparTabla"><h4><strong>Direcci&oacute;n:</strong></h4></td>
    			<td class="itemParTabla" colspan="3"><h5>'.htmlentities($datoinst).'</h5></td>
  			</tr>
			</table>
	  </tr>
      <tr>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
       </tr>
		<tr>
		<td width="80%" colspan="2">
  <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del representante:</strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="89" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
    <td  colspan="3" class="itemParTabla"><h5>'.htmlentities($Anombre).' '.htmlentities($app1).' '.htmlentities($apm1).'</h5></td>
</tr>
<tr>
    <td  width="89"class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="178" class="itemParTabla"><h5>'.$rTelefono1.'</h5></td>
    <td width="20%" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
    <td width="205" class="itemParTabla"><h5>'.$rCelular1.'</h5></td>
</tr>
<tr>
    <td width="89" class="itemImparTabla"><h4><strong>Correo:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5>'.htmlentities($emailint1).'</h5></td>
 </tr>
</table>
		  </td>
		</tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
		<tr>
			<td width="80%" colspan="2">
			<table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del segundo integrante:</strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="84" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
    <td colspan="3" class="itemParTabla"><h5>'.htmlentities($AIntegrante2).' '.htmlentities($app2).' '.htmlentities($apm2).'</h5></td>

</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="174" class="itemParTabla"><h5>'.$rTelefono2.'</h5></td>
    <td width="109" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
    <td width="194" class="itemParTabla"><h5>'.$rCelular2.'</h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Correo:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5>'.htmlentities($eEmail2).'</h5></td>
</tr>
</table>
        </td>
		</tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    <tr>
  <td width="80%" colspan="2">
  <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del tercer integrante:</strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="85" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
    <td colspan="3" class="itemParTabla"><h5>'.htmlentities(AIntegrante3).' '.htmlentities($app3).' '.htmlentities($apm3).'</h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="179" class="itemParTabla"><h5>'.$rTelefono3.'</h5></td>
    <td width="103" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
    <td width="194" class="itemParTabla"><h5>'.$rCelular3.'</h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Correo:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5>'.htmlentities($eEmail3).'</h5></td>
 </tr>
</table>
  </td>
		</tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    <tr>
		    <!--<td><h3><strong>Datos del cuarto integrante:</strong></h3></td>-->
  <td width="80%" colspan="2">
  <table width="80%" border="1" align="center" cellpadding="2" cellspacing="2" bgcolor=dddddd>
<tr>
    <td colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Datos del cuarto integrante:</strong></font></td>
</tr>
<tr bgcolor="aaaaaa">
    <td width="84" class="itemImparTabla"><h4><strong>Nombre:</strong></h4></td>
    <td colspan="3" class="itemParTabla"><h5>'.htmlentities($AIntegrante4).' '.htmlentities($app4).' '.htmlentities($apm4).'</h5></td>

</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Tel&eacute;fono:</strong></h4></td>
    <td width="182" class="itemParTabla"><h5>'.$rTelefono4.'</h5></td>
    <td width="103" class="itemImparTabla"><h4><strong>M&oacute;vil:</strong></h4></td>
    <td width="192" class="itemParTabla"><h5>'.$rCelular4.'</h5></td>
</tr>
<tr>
    <td class="itemImparTabla"><h4><strong>Correo:</strong></h4></td>
    <td class="itemParTabla" colspan="3"><h5>'.htmlentities($eEmail4).'</h5></td>
</tr>
</table>
  </td>
		</tr>
		<tr>
			<td width="15%">&nbsp;</td>
			<td width="58%" align="center"><h1>Men&uacute;</h1></td>
        </tr>
		<tr>
			<td colspan="2"><div align="center">
            <table cellspacing="4" cellpadding="4" border="1" width="80%" bgcolor=dddddd>
<tr>
    <td width="80%"colspan="4" class="itemTituloTabla"><font color="#FFFFFF"><strong>Men&uacute;</strong></font></td>
</tr>
<tr>
    <td width="20%" class="itemParTabla">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
		    <td class="itemImparTabla" width="20%">'.htmlentities($Aplatillo1).'</td>
		</tr>
		</table>
		</td>
    <td width="20%" class="itemImparTabla">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
		    <td class="itemImparTabla" width="20%">'.htmlentities($Aplatillo2).'</td>
		</tr>
		</table>
		</td>
		<td width="20%" class="itemParTabla">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
		    <td class="itemImparTabla" width="20%">'.htmlentities($Aplatillo3).'</td>
		</tr>
		</table>
		<td class="itemImparTabla" width="20%">
		<table align="right" cellspacing="1" cellpadding="1" border="1">
		<tr>
		    <td class="itemImparTabla" width="20%">'.htmlentities($Aplatillo4).'</td>
		</tr>
		</table>
		</td>
</tr>
<tr>
    <td class="itemParTabla" width="20%"><div align="justify"><p>'.htmlentities($descplatillo1).'</p>
    </div></td>
    <td class="itemParTabla" width="20%"><div align="justify"><p>'.htmlentities($descplatillo2).'</p>
    </div></td>
    <td class="itemParTabla" width="20%"><div align="justify"><p>'.htmlentities($descplatillo3).'</p>
    </div></td>
    <td class="itemParTabla" width="20%"><div align="justify"><p>'.htmlentities($descplatillo4).'</p>
    </div></td>
</tr>
</table>
<br />
<br />
<div align="center">
<table width="80%" cellspacing=0 cellpadding=3 border=0>
<tr>
<td colspan="3" class="itemTituloTabla"><div align="center" class="Estilo1">Lista de equipo menor solicitado</div></td>
</tr>

<tr>
	<td width="4%" class="itemParTabla">#</td>
	<td width="5%" class="itemParTabla"> Cantidad </td>
	<td width="30%" class="itemParTabla"> Material </td>
</tr>
';
 $sel_resultado="SELECT descripcionMaterial,cantidad FROM solicitud WHERE idEquipo=$plusid";
 $res_resultado=mysql_query($sel_resultado);
 $contador=0;
  while ($contador < mysql_num_rows($res_resultado)) {
	if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla";	}
	$cMaterial=$contador+1;
$cuerpo .="
	<tr>
		<td width=\"4%\" class=\"".$fondolinea."\">".$cMaterial."</td>
		<td width=\"5%\" class=\"".$fondolinea."\"><div align=\"center\">".mysql_result($res_resultado,$contador,"cantidad")."</div></td>
		<td width=\"30%\" class=\"".$fondolinea."\"><div align=\"left\">".mysql_result($res_resultado,$contador,"descripcionMaterial")."</div></td>
	</tr>";
$contador++;	}

$cuerpo .= "
	</table>
</div>

</div>
			</td>
					</tr>
					</table>
					</div>
                    <br />
					<div align=\"center\">

	  </div>

		</div>
	</body>
	</html>
";




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


if(!$mail2->Send())
{
	$msg='Error: '.$mail2->ErrorInfo;
}
else
{
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

<link href="../css/style.css" rel="stylesheet" type="text/css" media="print"/>
<title>Principal</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="dheader"></div>
<div id="wrapper">
	<div id="cIzq">

        <a class="bLink" href="../info.html">Incripci&oacute;n al Congreso</a>

		<a class="bLink" href="../bases.html">Bases</a>

		<a class="bLink" href="../../index.php">Salir</a>
	</div>
		<div id="cContenido">

	<div align="center">
  	<table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
    <tr>
        <td colspan="2" align="center"><div align="center"><p><font color="#FF0000" style="font-size:1.5em">
        El correo que se intenta dar de alta, ya se hab&iacute;a registrado con anterioridad.</font></p><div>
        </td>
        </tr>
    <?php $reg_resultado="SELECT * FROM equipos,integrantes WHERE equipos.idEquipo = integrantes.idEquipo And correoIntegrante like '$emailint1'";
 $result=mysql_query($reg_resultado);
 ?>
		<tr><td colspan="2" width="80%" align="center">
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2" style="margin:auto">
<tr><td colspan="2">Datos actualmente registrados con este correo:</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td>Equipo No:</td><td><?php echo mysql_result($result,0,"idEquipo") ?></td>
</tr>
<tr>
    <td width="86">Instituci&oacute;n:</td><td><?php echo htmlentities(mysql_result($result,0,"nombreIntitucion"))?></td>
</tr>
<tr>
    <td width="89">Nombre:</td><td><?php echo htmlentities(mysql_result($result,0,"nombreIntegrante1").' '.mysql_result($result,0,"apPaternoIntegrante1").' '.mysql_result($result,0,"apMaternoIntegrante1"))?></td>
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
    <td width="89">C&oacute;rreo:</strong></td>
    <td><strong><?php echo htmlentities(mysql_result($result,0,"correoIntegrante"))?></strong></td>
</tr>
</table>
		  </td>
		</tr>
    	</div>

</table>
<br />
<br />
<div align="center"><input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
                    <p><a href="../form1.php">Regresar al registro</a></p>
</div>
         <div id="dfeet"></div>
		 </div>
		 </div>
	</body>
</html>
<?php
}
?>




