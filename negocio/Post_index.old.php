<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

include ("../includes/connect.php");
include ("../includes/function.php");



$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }
$nominst=$_POST["ANombreInstitucion"];
$datoinst=$_POST["ADatosInstitucion"];
$telinst=$_POST["ATelefonoInstitucion"];
$int1=$_POST["Anombre"];
$app1=$_POST["ap_paterno"];
$apm1=$_POST["ap_materno"];
$int2=$_POST["AIntegrante2"];
$app2=$_POST["ap_paterno2"];
$apm2=$_POST["ap_materno2"];
$int3=$_POST["AIntegrante3"];
$app3=$_POST["ap_paterno3"];
$apm3=$_POST["ap_materno3"];
$int4=$_POST["AIntegrante4"];
$app4=$_POST["ap_paterno4"];
$apm4=$_POST["ap_materno4"];
$emailint1=$_POST["correo"];
$emailint11=$_POST["correo2"];
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
$impresion=0;
$queryimp="SELECT nombreInstitucion,correoIntegrante,validaImpresion  FROM equipos,integrantes WHERE equipos.idEquipo=integrantes.idEquipo and correoIntegrante='$emailint1';";
$resultimp=mysql_query($queryimp);
$impreso=mysql_result($resultimp,0,"validaImpresion");
if ($impreso==""){
if ($accion=="alta"){
		$consultaprevia = "SELECT max(idEquipo) as maximo FROM equipos";
		$rs_consultaprevia=mysql_query($consultaprevia);
		$plusid=mysql_result($rs_consultaprevia,0,"maximo");
		if ($plusid=="") {$plusid=0;}
		else{$plusid++;}
$sql="insert into equipos values('$plusid','$nominst', '$datoinst', '$telinst');";	
$sql1="insert into integrantes values (
    $plusid,'$int1','$app1','$apm1',
			'$int2','$app2','$apm2',
			'$int3','$app3','$apm3',
			'$int4','$app4','$apm4',
			'$emailint1','$emailint2','$emailint3','$emailint4',
			'$tel1','$tel2','$tel3','$tel4',
			'$mov1','$mov2','$mov3','$mov4','$impresion');";
mysql_query($sql,$db);
mysql_query($sql1,$db);

if ($userfile1['name']<>"") {
		   $foto_name1="foto".$Aplatillo1.".jpg";
		   if (! copy ($userfile1['tmp_name'], "../imagenes/$foto_name1")) 
			{
			  echo "<h2>No se ha podido copiar la foto de $platillo1</h2>\n";
			};
		};
if ($userfile2<>"none") {
		   $foto_name2="foto".$Aplatillo2.".jpg";
		   if (! copy ($userfile2['tmp_name'], "../imagenes/$foto_name2")) 
			{
			  echo "<h2>No se ha podido copiar la foto de $platillo2</h2>\n";
			};
		};
if ($userfile3<>"none") {
		   $foto_name3="foto".$Aplatillo3.".jpg";
		   if (! copy ($userfile3['tmp_name'], "../imagenes/$foto_name3")) 
			{
			  echo "<h2>No se ha podido copiar la foto de $platillo3</h2>\n";
			};
		};
if ($userfile4<>"none") {

		   $foto_name4="foto".$Aplatillo4.".jpg";
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
for ($i=0;$i<=$filas;$i++){
if (!empty($_POST['cantmat'][$i])){
$strquery.="($plusid,'','".$_POST['descmat'][$i]."','".$_POST['cantmat'][$i]."'),";}} //for($i=0;$i<count($_POST['descmat']);$i++){ 
//$strquery.="($plusid,'','$_POST_[descmat][$i]','$_POST[cantmat][$i]');"; 
$strquery=substr($strquery,0,(strlen($strquery)-1)).';'; 
mysql_query($strquery) or die(mysql_error()); 
}
}
else{
echo"<SCRIPT LANGUAGE='javascript'> 
			alert('Se ha detectado que la ficha que se está intentando imprimir, ya se ha impreso con anterioridad. Si ha perdido su ficha y desea volver a imprimirlo, porfavor pongase en contacto con el responsable del evento.');</SCRIPT>";
			 //location.href = '../index.php'; </SCRIPT>

}
?>

<body>
<link href="../../concursogastronomia2011/css/style.css" type="text/css" rel="stylesheet">
	<div id="pagina">
	<div id="zonaContenido">
	<div align="center">
	<div id="frmBusqueda">
	<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		<tr>
			<td width="15%"></td>
			<td colspan="2" ><h5><?php echo "Su registro se ha hecho exitosamente";?></h5></td>
	    </tr>
		<tr>
			<td width="15%"><h3>Equipo:</h3></td>
			<td width="58%"><h5><?php echo $plusid?></h5></td>
		</tr>
		<tr>
			<td width="15%"><h3>Datos del representante:</h3></td>
			<td width="58%">                   
				<table width="200" border="0">
                    <tr>
                         <td scope="col" colspan="4" bgcolor="#3366CC"><h5><?php echo "$Anombre $ap_paterno $ap_materno"?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rTelefono1?></h5></td>
                        <td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rCelular1?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
                        <td bgcolor="#99FFFF" colspan="3"><h5><?php echo $correo?></h5></td>
                    </tr>
                </table></td>
		</tr>
		<tr>
			<td width="15%"><h3>Datos del segundo integrante:</h3></td>
			<td width="58%">
				<table width="200" border="0">
				<tr>
					<td scope="col" colspan="4" bgcolor="#3366CC"><h5><?php echo "<h5>$AIntegrante2 $ap_paterno2 $ap_materno2</h5>"?></h5></td>
				</tr>
				<tr>
					<td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
					<td bgcolor="#99FFFF"><h5><?php echo $rTelefono2?></h5></td>
					<td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
					<td bgcolor="#99FFFF"><h5><?php echo $rCelular2?></h5></td>
				</tr>
				<tr>
					<td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
					<td bgcolor="#99FFFF" colspan="3"><h5><?php echo $eEmail2?></h5></td>
				</tr>
                </table>			</td>	
		</tr>
		<tr>
			<td width="15%"><h3>Datos del tercer integrante:</h3></td>
			<td width="58%">
                <table width="200" border="0">
                    <tr>
                    <td scope="col" colspan="4" bgcolor="#3366CC"><?php echo "$AIntegrante3 $ap_paterno3 $ap_materno3"?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
						<td bgcolor="#99FFFF"><h5><?php echo $rTelefono3?></h5></td>
                        <td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rCelular3?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
                        <td bgcolor="#99FFFF"colspan="3"><h5><?php echo $eEmail3?></h5></td>
                    </tr>
                </table>			</td>
		</tr>
		<tr>
		    <td><h3>Datos del cuarto integrante:</h3></td>
			<td>
                <table width="200" border="0">
					<tr>
                        <td scope="col" colspan="4" bgcolor="#3366CC"><?php echo "<h5>$AIntegrante4 $ap_paterno4 $ap_materno4 </h5>"?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rTelefono4?></h5></td>
                        <td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rCelular4?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
                        <td bgcolor="#99FFFF" colspan="3"><h5><?php echo $eEmail4?></h5></td>
                    </tr>
                </table>			</td>
		</tr>
		<tr>
			<td width="15%">&nbsp;</td>
			<td width="58%" align="center"><h1>Menú</h1></td>
        </tr>
		<tr>
			<td colspan="2"><div align="center">
				 <table border="1">
				    <tr>
					    <td width="25%" align="center"><img src="../imagenes/<? echo $foto_name1?>" width="160px" height="140px" border="1"></td>
						<td width="25%" align="center"><img src="../imagenes/<? echo $foto_name2?>" width="160px" height="140px" border="1"></td>
						<td width="25%" align="center"><img src="../imagenes/<? echo $foto_name3?>" width="160px" height="140px" border="1"></td>
						<td width="25%" align="center"><img src="../imagenes/<? echo $foto_name4?>" width="160px" height="140px" border="1"></td>
					</tr>
					<tr>
						<td><div align="center"><? echo $Aplatillo1?></div></td>
						<td><div align="center"><? echo $Aplatillo2?></div></td>
						<td><div align="center"><? echo $Aplatillo3?></div></td>
						<td><div align="center"><? echo $Aplatillo4?></div></td>
					</tr>
					<tr>
						<td><div align="justify"><p><? echo $descplatillo1?></p></div></td>
						<td><div align="justify"><p><? echo $descplatillo2?></p></div></td>
						<td><div align="justify"><p><? echo $descplatillo3?></p></div></td>
						<td><div align="justify"><p><? echo $descplatillo4?></p></div></td>
					</tr>
					</table></div>
					</td>
					</tr>
					</table>
					</div>
					<div id="botonBusqueda">
					<img src="../imagenes/botonaceptar.jpg" width="85" height="22">
					</div>
	</div>
		  </div>
		</div>
	</body>
<?
$destinatario=$emailint1;
$asunto='Registro al Concurso de COCINA MEXICANA';
$cuerpo = ' 
<html> 
<head> 
   <title>Mensaje de confirmaci&oacute;n</title> 
</head> 
<div align="center">
	<div id="frmBusqueda">
	<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		<tr>
			<td width="15%"></td>
			<td colspan="2" ><h5><?php echo "Su registro se ha hecho exitosamente";?></h5></td>
	    </tr>
		<tr>
			<td width="15%"><h3>Equipo:</h3></td>
			<td width="58%"><h5><?php echo $plusid?></h5></td>
		</tr>
		<tr>
			<td width="15%"><h3>Datos del representante:</h3></td>
			<td width="58%">                   
				<table width="200" border="0">
                    <tr>
                         <td scope="col" colspan="4" bgcolor="#3366CC"><h5><?php echo "$Anombre $ap_paterno $ap_materno"?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rTelefono1?></h5></td>
                        <td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rCelular1?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
                        <td bgcolor="#99FFFF" colspan="3"><h5><?php echo $correo?></h5></td>
                    </tr>
                </table></td>
		</tr>
		<tr>
			<td width="15%"><h3>Datos del segundo integrante:</h3></td>
			<td width="58%">
				<table width="200" border="0">
				<tr>
					<td scope="col" colspan="4" bgcolor="#3366CC"><h5><?php echo "<h5>$AIntegrante2 $ap_paterno2 $ap_materno2</h5>"?></h5></td>
				</tr>
				<tr>
					<td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
					<td bgcolor="#99FFFF"><h5><?php echo $rTelefono2?></h5></td>
					<td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
					<td bgcolor="#99FFFF"><h5><?php echo $rCelular2?></h5></td>
				</tr>
				<tr>
					<td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
					<td bgcolor="#99FFFF" colspan="3"><h5><?php echo $eEmail2?></h5></td>
				</tr>
                </table>			</td>	
		</tr>
		<tr>
			<td width="15%"><h3>Datos del tercer integrante:</h3></td>
			<td width="58%">
                <table width="200" border="0">
                    <tr>
                    <td scope="col" colspan="4" bgcolor="#3366CC"><?php echo "$AIntegrante3 $ap_paterno3 $ap_materno3"?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
						<td bgcolor="#99FFFF"><h5><?php echo $rTelefono3?></h5></td>
                        <td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rCelular3?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
                        <td bgcolor="#99FFFF"colspan="3"><h5><?php echo $eEmail3?></h5></td>
                    </tr>
                </table>			</td>
		</tr>
		<tr>
		    <td><h3>Datos del cuarto integrante:</h3></td>
			<td>
                <table width="200" border="0">
					<tr>
                        <td scope="col" colspan="4" bgcolor="#3366CC"><?php echo "<h5>$AIntegrante4 $ap_paterno4 $ap_materno4 </h5>"?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>Tel&eacute;fono:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rTelefono4?></h5></td>
                        <td bgcolor="#99FFFF"><h4>M&oacute;vil:</h4></td>
                        <td bgcolor="#99FFFF"><h5><?php echo $rCelular4?></h5></td>
                    </tr>
                    <tr>
                        <td bgcolor="#99FFFF"><h4>C&oacute;rreo:</h4></td>
                        <td bgcolor="#99FFFF" colspan="3"><h5><?php echo $eEmail4?></h5></td>
                    </tr>
                </table>			</td>
		</tr>
		<tr>
			<td width="15%">&nbsp;</td>
			<td width="58%" align="center"><h1>Menú</h1></td>
        </tr>
		<tr>
			<td colspan="2">
				 <div align="center"><table border="1">
				    <tr>
						<td><div align="center"><? echo $Aplatillo1?></div></td>
						<td><div align="center"><? echo $Aplatillo2?></div></td>
						<td><div align="center"><? echo $Aplatillo3?></div></td>
						<td><div align="center"><? echo $Aplatillo4?></div></td>
					</tr>
					<tr>
						<td><div align="justify"><p><? echo $descplatillo1?></p></div></td>
						<td><div align="justify"><p><? echo $descplatillo2?></p></div></td>
						<td><div align="justify"><p><? echo $descplatillo3?></p></div></td>
						<td><div align="justify"><p><? echo $descplatillo4?></p></div></td>
					</tr>
					</table></div>
                    </td>
					</tr>
					</table>
					</div>
					<div id="botonBusqueda">
					<img src="../imagenes/botonaceptar.jpg" width="85" height="22">			  </div>
	</div>
	</body>
	</html> 
'; 

// enviamos el email
( mail( $destinatario,$asunto,$cuerpo) ) 
?>
