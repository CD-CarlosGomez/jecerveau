<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// |  * @Version 1.0
// +-----------------------------------------------
class Conexion{
	if(isset( $__CONNECTADO )) {
    return;
	}
//CONSTANTES#########################################
$__CONECTADO=1;
//ATRIBUTOS##########################################
//------------------------------------------------------------------------Variables de conexión
	private $_usuario = "root";											 
	private $_contraseña = "";                                 		 
	private $_servidor= "localhost";										 
	private $_baseDeDatos="ibrain20";													 
	private $mysqli;													 //conexion a la bd
	private $_erroConsultaVacia="La consulta x00ern1101 se encuentra vacía";//erno1101
	private $erroComando="<b>Error x00ern1002 al ejecutar la consulta:</b>";//erno1002
	private $result;													 //resultado devuelto
	private $dataAdapter;												 //array devuelto
	private $_ComandoSQL="";
	private $transaccion=NULL;
	private $_dato= new Datos();
	private $_mLector;
//PROPIEDADES########################################
	function getConexion(){
		return $this->mysqli;
	}
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
	Public function getCadenaDeConexion(){
		return $this->mconexion->ConnectionString;
	}
	Public Function getStoreProcedure($pprocedimiento,$pnombreTabla,$pparametros,$pnumParam){
		$mDataAdapter=new SqlDataAdapter();
		$mcomando=new dataSet();
		$i=0;
		$sparCatID=new SQLParameter();
		Try{
			abrirConexion();
			$mcomando=new SQLcommand($pprocedimiento,getConexion());
			//$mComando->CommanndTimeout=300; Establecer un timeout de respuesta del store procedure
			//$mcomando->CommandType= CommandType.Storeprocedure Especificamos que es un storeprocedure la consulta
			/*For($i=0;$i<=$pnumParam;$i--){
				$sparCatID=new SQLParameter;
				sparCatID.ParameterName = Parametros.GetValue(i, 0).ToString()
                sparCatID.DbType = CType(Parametros.GetValue(i, 1), DbType)
                sparCatID.Value = Parametros.GetValue(i, 2)	
				$mcomando->Parameters->add($sparCatID);
			}*/
			$mDataAdapter->Fill($mDataSet,$pnombreTabla);
		}
		catch(Exception $ex){
			echo '$ex';
		}
		return $mDataSet;
	}	
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
//-----------------------------------------------------------------------------Constructor.
	function __construct(){
		abrirConexion();
	}
//-----------------------------------------------------------------------------Conexiones a la base de datos.
	public function abrirConexion(){
		Try{
			if (!$this->mysqli->ping()){
				$mysqli = new mysqli ($this->_servidor,$this->_usuario,$this->_contraseña, $this->_baseDeDatos);
				if ($mysqli->connect_errno()) {
					printf("Conexión fallida Error x00erno1001: %s\n",$mysqli->connect_errno);
				}	
			}		
			return($this->mysqli);
		}
		Catch (Exception $e){
			echo 'Exception capturada: ', $e->getMessage(),"\n");
		}
			
	}
	public function cerrarConexion() {
		if ($this->mysqli=TRUE){
			self::close();
		}
	}
	Public function SqlQuery($query){ //Dato es un objeto tipo ClaseDatos
			if($_dato->transaccionEstado){//se inicia en False
				$this->mysqli->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
				$this->mysqli->query($query);
				$this->_mLector=$this->mysqli->commit();
			}
			return $mLector;
		}
	Public function SQLNonQuery($Query="",$param=""){   //no retorna nada
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
	public function CerrarLector($mcomando){
		$this->mysqli->close();
	}
	public function SQLComand($query){//Ejecuta una consulta cualquiera
		if($SQLDataReader=$this->query($query)){
			printf('La selection devolvio %d filas.\n', $SQLDataReader->num_rows);
		}
		else{
			printf('Error: %$\n',$SQLDataReader->error);
		}
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//Métodos para generar tabla y dataset
	/*Public function cerrarAdaptador(){
		$mDataAdapter->Dispose();
	}
	public function cerrarDataset(){
		$mDataSet->Dispose();
	}
	Public Function getDataSet($SQLQuery){
		$mDataAdapter = New SqlDataAdapter;
        $mComando = New SqlCommand;
		//mDataSet = New DataSet("DataSet1")
        mDataSet = New DataSet()
        mComando.CommandText = SQLQuery
        mComando.Connection = Me.mConexion
        mDataAdapter.SelectCommand = mComando
        mDataAdapter.Fill(mDataSet)
        Return Me.mDataSet
	}
    Public function getDataTable(){
		$mDataAdapter = New SqlDataAdapter;
        $mComando = New SqlCommand;
        //mTable = New DataTable("DataTable1")
        mTable = New DataTable();
        mComando.CommandText = SQLQuery
        mComando.Connection = Me.mConexion
        mDataAdapter.SelectCommand = mComando
        mDataAdapter.Fill(mTable)
        Return Me.mTable
	}
	Pregunta si puede leer los datos que se le consultarán, no últil para esta versión.
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
	Cierra el lector de datos, hasta el momento no sabemos el equivalente del lector en mysqli

	*/
//Metodos para Store Procedures	
	
}
?>