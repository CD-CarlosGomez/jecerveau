<?php
include_once 'datos/Datos.php';

class Negocio{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_mySQLiConexion ="";
private $_mySQLiConectando="";
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
//------------------------------------------------------Contructores
public function __construct(Datos $dato){
	//$this->_mySQLiConectando=$
	$this->_mySQLiConexion=$dato;
	//echo "Se creo el objeto dato".$this->_mySQLiConexion->getStatusDeLaConexion();
}
public function Negocio(){
	$this->_mySQLiConectando=new Conexion();
}
//------------------------------------------------------SQL
public function SQLComand($query){
	$this->_mySQLiConexion->SQLComand($query);
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
	return $pldataset;
}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################

	
	
	
	
	
}
?>