<?php	//check txtUsername and txtPassword and set variables
// CONNECT TO THE DATABASE SERVER
include_once("Negocios.neg.php");
//IMPORT QUERIES OF THE PROYECT

if (!isset($txtUsername) || !isset($txtPassword)){
$txtUsername=$_POST["txtUsername"];
$txtPassword=$_POST["txtPassword"];
}


if (isset($txtUsername) || isset($txtPassword)){
	$conexion=new Conexion();
	$dato=new Datos($conexion);
	$pMySQLConection= new Negocio($dato);

	//Trae_los_permisos_del_usuario
	$query="
		SELECT DISTINCT
			ibfunctiongroupModulo 
		FROM ibuser ib 
			inner join ibuserprofile 
				on fkibuserprofile=pkiBUserProfile 
			inner join ibuserprofile_has_ibfunction ibfg 
				on pkiBUserProfile=ibuserprofile_pkibuserprofile 
			inner join ibfunctiongroup 
				ON ibfg.ibfunctiongroup_pkibfunctiongroup=pkibfunctiongroup 
			inner join ibfunction ibf 
				on pkibfunctiongroup= ibf.iBFunctionGroup_pkiBFunctionGroup 
		where username='$txtUsername' and pwd='$txtPassword' and Active=1;";

	$pMySQLExecuteNonQuery = $conexion->_mysqli->query($query);

	if ($pMySQLExecuteNonQuery) {
		$authentication = "YES";
		$status = "Logged In";
		$user = $txtUsername;

		/*while ($row=$pMySQLExecuteNonQuery->fetch_row()) {
			printf ("<li>$row[0]<ul>");
			$query2="SELECT 
			ibfunctiongroupModulo,
			ibfunctionName 
			FROM ibuser ib 
				inner join ibuserprofile 
					on fkibuserprofile=pkiBUserProfile 
				inner join ibuserprofile_has_ibfunction ibfg 
					on pkiBUserProfile=ibuserprofile_pkibuserprofile 
				inner join ibfunctiongroup 
					ON ibfg.ibfunctiongroup_pkibfunctiongroup=pkibfunctiongroup 
				inner join ibfunction ibf 
					on pkibfunctiongroup= ibf.iBFunctionGroup_pkiBFunctionGroup 
			where username='$txtUsername' and pwd='$txtPassword' and Active=1 and ibfunctiongroupModulo='$row[0]';";
			
			
			$pMySQLiQuery=$conexion->_mysqli->query($query2);
			while ($row2 = $pMySQLiQuery->fetch_row()) {
					printf ("<li><a href='#'>%s</a></li>",$row2[1]);
			}
			printf("</ul></li>");
			$pMySQLiQuery->close();
		}
		$pMySQLExecuteNonQuery->close();
		echo '</ul>';*/
	}
	else {
		//$wronginfomsg = "<CENTER><BR><B>$l_error </B><I>:P</I><BR>\n";
		echo $status = "Not Logged In";
	}
}
?>
