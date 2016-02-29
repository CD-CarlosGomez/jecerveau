<?php //Main Program
//We open a session to work all the proyect at the same language.
session_start();

if (!isset($txtUsername) || !isset($txtPassword)){
echo $txtUsername=$_POST["txtUsername"];
echo $txtPassword=$_POST["txtPassword"];
}

//IMPORT THE GETTEXT LIBRARY TO SELECT THE LANGUAGE
include 'controlador/gettext.neg.php';

//CHECK IF USER LOGGED OUT
if (isset($logout)) {
  include("config/logout.inc.php");
}
//AUTHENTICATE USER
if (!isset($status) || !isset($authentication)) {
  include("controlador/checkuser.neg.php");
}
// SET COOKIE
if (isset($authentication)) {
  include("config/cookie.inc.php");
  include("controlador/permissions.inc.php");
}
// PRINT HTML HEADER
include 'vista/header.php';
////////////////////////////////////////////////////////////////
// START GUTS OF THE PROGRAM
////////////////////////////////////////////////////////////////
if (isset($authentication)) {
  include("controlador/whattodo_items.conf.php");	//print whattodo items
  if (isset($whattodo)) {
    include("controlador/$whattodo.scp.php");
  }
  else {
    print "<CENTER><BR>Bienvenido<BR>\n";
    print "Por favor Elige</CENTER><BR><BR>\n";
  }
}else{
  if (isset($wronginfomsg)) { print "$wronginfomsg\n"; }
  include 'vista/menu.vista.php';
  include 'vista/content.php';
}
include 'vista/footer.php';
//include 'negocio/gettext.neg.php';
?>