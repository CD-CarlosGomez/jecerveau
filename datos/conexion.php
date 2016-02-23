<?php

// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// |  * @Version 1.0
// +-----------------------------------------------
class ClaseConexion{
//##Región de declaraciones
	//Variables de conexión
	var $user = "root";											 //Usuario de la bd
	var $password = "";                                 		 //contraseña de la bd
	var $server= "localhost";										 //server de la bd
	var $db="ibrain20";													 //base de datos de la aplicación
	var $mysqli;													 //conexion a la bd
	var $errodatabaseconec="Error al conectarse a la base de datos.";//erno1001
	//Variables de query
	var $errorempty="La consulta se encuentra vacía";				 //erno1101
	var $errorquery="<b>Error al ejecutar la consulta:</b>";         //erno1002
	var $result;													 //resultado devuelto
	var $dataAdapter;												 //array devuelto
	private $mComando="";
	public $transaccion=NULL;
	private $mLector="";
//#End Region de declaraciones
//Constructor
	function __construct(){
		abrirConexion();
	}
	function getConexion(){
		return $this->mysqli;
	}
//Para conectarse a la base de datos
	function abrirConexion(){
		Try{
			if (!$this->mysqli->ping()){
				$mysqli = new mysqli ($this->server,$this->user,$this->password, $this->db);
				if (mysqli_connect_errno($mysqli)) {
					echo $this->errodatabaseconec .": ". mysqli_connect_error();
				}	
			}		
			return($this->mysqli);
		}
		Catch (Exception $e){
			echo 'Exception capturada: ', $e->getMessage(),"\n");
		}
			
	}
//Cerrar conexion
	function cerrarConexion() {
		if ($this->mysqli=TRUE){
			self::close();
		}
	}
	public function CerrarLector(){
		$mLector->Close();
	}
//SQL
	Public function GetSqlComand($sqlCommand){
        return $this->mComando;
	}
	Public Function GetDataAdapter($SQLQuery="",$dataGreedView, $fila){
		if ($SQLcommand = $mysqli->prepare($SQLQuery)) {
	    /* execute consulta */
	    $SQLexecuteQuery=$SQLcommand->execute();
	    /* vincular las varilbes al resultado */
	    $SQLcommand->bind_result($dataGreedView);
	    /* almacenar el resultado */
	    $SQLcommand->store_result();
	    /* buscar la fila nº*/
	    $SQLcommand->data_seek($fila);
	    /* obtener los valores */
	    $this->dataAdapter=$SQLcommand->fetch();
	    }
	    return $this->dataAdapter;
    }
	Public function SqlQuery($query,$Dato){ //Dato es un objeto tipo ClaseDatos
		$mComando= new SQLcommand($query,$mconexion);
		if($dato->TransaccionEstado){
			$mcomando->Transaction=$dato->Transaction;
		}
		$mLector=$mcomando->ExecuteReader();
		return $mLector;
	}
	Public function SQLNoQuery($Query="",$param="", Datos $Dato){   //no retorna nada
        $mComando = $this->mysqli->stmt_init();
        $mComando->prepare($Query);
        $mComando->bin_param($param,$Query);
        If (!$mComando->execute()) 
           $mComando->transaccion = $Dato->getTransaccion();

        $mComando->affected_rows;
	}
	Public function TransactionIniciar(){
		$Transaction=$mconexion->BeginTransaction();
	}
	Public function getCadenaDeConexion(){
		return $this->mconexion->ConnectionString;
	}
	Public function puedeLeer(){
		Try{
			return $mLector->Read;
		}
		catch(Exception $ex)
		{
			echo '$ex';
		}
		return false;
	}
//Métodos para generar tabla y dataset
	/*Public function cerrarAdaptador(){
		$mDataAdapter->Dispose();
	}
	public function cerrarDataset(){
		$mDataSet->Dispose();
	}*/
	Public Function GetDataSet($SQLQuery){
		$mDataAdapter = New SqlDataAdapter;
        $mComando = New SqlCommand;
		
	}
        

        //mDataSet = New DataSet("DataSet1")
        mDataSet = New DataSet()
        mComando.CommandText = SQLQuery
        mComando.Connection = Me.mConexion
        mDataAdapter.SelectCommand = mComando
        mDataAdapter.Fill(mDataSet)
        Return Me.mDataSet
    End Function
	
	
	
	
	
	}
?>