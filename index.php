<?php //Main Program
session_start();

include("config/general.conf.php");//IMPORT general configurations
include 'controlador/gettext.neg.php';//IMPORT THE GETTEXT LIBRARY TO SELECT THE LANGUAGE
include_once "controlador/Controlador.neg.php";
if (isset($logout)) { //CHECK IF USER LOGGED OUT
  include("config/logout.inc.php");
}

// SET COOKIE
//if (isset($_SESSION['authentication'])) {
  //include("config/cookie.inc.php"); ya no incluye cookies
  //include("controlador/permissions.inc.php");
//}
// PRINT HTML HEADER
include 'vista/header.php';

//AUTHENTICATE USER
if (!isset($status) || !isset($_SESSION['authentication'])) {
  include("controlador/checkuser.neg.php");
}
////////////////////////////////////////////////////////////////
// START GUTS OF THE PROGRAM
////////////////////////////////////////////////////////////////
if (isset($_SESSION['authentication'])) {
		include("vista/grupoEmpresarial.vista.php");	//print whattodo items
		if (isset($whattodo)) {
			include("controlador/$whattodo.scp.php");
		}
		else {
			include("vista/Default.vista.php");
		}
	}
	else{
	//if (isset($wronginfomsg)) { print "$wronginfomsg\n"; }
	//include 'vista/menu.vista.php';
	include "vista/login.form.php";
	}
include 'vista/footer.php';
?>