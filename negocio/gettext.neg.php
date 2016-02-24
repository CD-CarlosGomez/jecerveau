<?php
//We call the libraries to build classes to help us to work with gettext.
require_once("lib/streams.php");
require_once("lib/gettext.php");

//We find out if we have a locale diccionaire already inicializated. 
if(isset($_GET['lang'])){
	$lang=$_GET['lang'];
}
elseif (isset($_SESSION['lang'])){
	$lang=$_SESSION['lang'];
}
else{
	$lang="en";
}


/*We set the enviroment variable about language
// Dominio
$text_domain = 'pt_BR';
// Dependiendo de tu OS putenv/setlocale configurarán tu idioma.
putenv('LC_ALL='.$lang);
setlocale(LC_ALL, $lang);
// La ruta a los archivos de traducción
$varbin=bindtextdomain($text_domain, './locale' ); 
// El codeset del textdomain
bind_textdomain_codeset($text_domain, 'UTF-8'); 
// El Textdomain
textdomain($text_domain);
*/
// Cadena de texto de prueba
//Declaramos el lenguaje predeterminado $lang = 'es_ES';//$lang = 'pt_BR';
//Instanciamos una clase para leer el archivo *.mo que contiene el diccionario de traducciones que necesitamos
$locale_file= new FileReader("locale/$lang/LC_MESSAGES/ibrain.mo");
//Intacnciamos la clase que leerá los items del diccionario
$locale_fetch= new gettext_reader($locale_file);

// Creamos las funciones de leectura del gettext
//Singular gettext function
if (!function_exists('_s')){
	function _s($text){
		global $locale_fetch;
		return $locale_fetch->translate($text);
	}	
}
//Plural gettext function
if(!function_exists('_p')){
	function _p($singular,$plural,$number) {
		global $locale_fetch;
		return sprintf ($locale_fetch->ngettext($singular,$plural,abs($number)), $number);
		//return sprintf(ngettext($singular, $plural, abs($number)), $number);
	}
}

/*
echo _s("Hello World");

echo "<br />\n";

echo _p("You have %d message","You have %d messages",1);

echo "<br />\n";

echo _p("You have %d message","You have %d messages",25);

foreach (explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']) as $lang){
	echo $lang.'<br/>';
	}
	*/

?>