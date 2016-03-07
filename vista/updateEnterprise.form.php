<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Solicitud de contacto</title>
</head>
 
<body>
 
<table width="600" border="0" cellpadding="0" cellspacing="0" height="80">
<tr>
<td>
<h2 align="center" style="margin-top: 0; margin-bottom: 0">Solicitud de contacto </h2>
</td></tr>
</table>
 
<div align="center">
 
<table width="600" border="0" cellpadding="0" cellspacing="0">
 
<tr>
<td width="100%">
 
<table width="100%" border=1 cellPadding=5 cellSpacing=0 bgcolor="#eeeeee" bordercolor="#C0C0C0">
 
<tbody>
 
<tr>
<td width="100%" align="center" vAlign=middle>
<?php
if (!@$_POST['envio']) {
echo "<form action=\"contacto.php\" method=\"post\" class=\"bodytext\">"; ?>
<!--begin Form -->
<table border=0 cellpadding=3 cellspacing=0 bordercolor="#FFFFFF">
 
<tr>
<td colspan=2 height="20" align="left">
<b>Rellena los campos siguientes</b></td>
</tr>

<tr>
<td colspan="2" height="20" bgcolor="#CCCCCC" align="left">Enterprise:</td>
</tr>
 
<tr>
<td colspan="2" align="center" height="28">
<INPUT NAME="asunto" TYPE="TEXT" SIZE="68" MAXLENGTH="68"></td>
</tr>
 
<tr>
<td width="100%" align="CENTER" COLSPAN="2">
<input type="submit" name="envio" value="Update" size="20">&nbsp;&nbsp;
<input name="reset" type="reset" value="Clean" size="20"></td>
</tr>
 
</table>
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 
<tr>
<td align="left">* Campo obligatorio </td>
</tr>
</table>
<!-- End Form -->
 
<?php
} else if ($_POST['envio']=="Enviar") {
$flag=0;
$flag1=0;
if ((!$_POST['fullname'])||($_POST['fullname']==""))   {
echo "<b>No rellenaste el campo  Nombre</b>.<br>";
$flag=1;
}
if ((!$_POST['mail']) || ($_POST['mail']=="") ) {
echo "<b>No rellenaste el campo  E-mail</b>.<br>";
$flag=1;
$flag1=1;
}
if ($flag1==0) {
if  (!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$_POST['mail']))   {
echo "<b>Dirección de E-mail no  válida</b>.<br>";
$flag=1;
}
}
 
if ($flag=="1") {
echo "<a href=\"contacto.php\">Volver</a>";
} else {
$mi_email="info@domino.com";
$titulo_correo="Solicitud de Contacto";
mail("$mi_email","$titulo_correo","Nombre: ".$_POST['fullname']." \n\n"."Asunto: ".$_POST['asunto']." \n\n".
"Comentarios: ".$_POST['bodyl']." \n\n"."Dirección de Correo: ".$_POST['mail'],"From: ".$_POST['mail']);
echo "<br><br>Tu mensaje ha sido enviado.<br>
Gracias por contactar con nosotros.";
}
}
?>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</table>
 
</div>
 
</body>
 
</html>