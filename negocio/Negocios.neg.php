<?php
public class Negocios{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_clDatos =Datos;
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
public function __construct(){
	$_clDatos=new Datos();
}
public function negocios($conexion){
	$_clDatos=new Datos($conexion);
}
public function registroAgregarGenerarCodigo($clase){
	$_clDatos->registroAgregarGenerarCodigo($clase);
}
public function registroAgregarNoGenerarCodigo($clase){
	$_clDatos->registroAgregarNoGenerarCodigo($clase);
}
public function registroActualizar($clase){
	$_clDatos->registroActualizar($clase);
}
public function registroRecuperar($clase){
	$_clDatos->registroRecuperar($clase);
}
public function registroEliminar($clase){
	$_clDatos->registroEliminar($clase);
}
public function registroExiste($clase){
	return $_clDatos->registroExiste($clase);
}
public function registroListaCodigos($clase){
	$_clDatos->registroListaCodigos($clase);
}
public function dataGridViewerLlenar($dgwGrid,$clase){
	$_clDatos->dataGridViewerLlenar($dgwGrid,$clase);
}
public function transaccionIniciar(){
	$_clDatos->TransaccionIniciar();
}
public function transaccionTerminar(){
	$_clDatos->transaccionTerminar();
}
//-----------------------------------------------------------Store procedure
public function procedimientosAlmacenado($procedimiento,$nombreTabla,$parametros,$numParam){
	$pldataset="";
	try{
		$pldataset=$_clDatos->procedimientosAlmacenado($Procedimiento,$nombreTabla,$parametros,$numParam);
	}
	catch(Exception $ex){
		echo '$ex';
	}
}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################

	
	
	
	
	
}
?>