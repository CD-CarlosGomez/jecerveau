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

		//Hacer un log de login de usuarios
		echo "<ul class='menu'>
				<li class='current'><a href='#'><?php echo _s('Home');?></a></li>";
		while ($row=$pMySQLExecuteNonQuery->fetch_row()) {
			printf ("<li><a href=''><span class='icon' data-icon='1'></span>$row[0]</a><ul>");
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
					printf ("<li><a href='#'><span class='icon' data-icon='2'></span>%s</a></li>",$row2[1]);
			}
			printf("</ul></li>");
			$pMySQLiQuery->close();
		}
		$pMySQLExecuteNonQuery->close();
		echo '
				<li><a  href="">Logout</a></li>
			</ul>
			<div class="col_12">';
		
	}
	else {
	echo '	
			<ul class="menu">
					<li class="current"><a href="#"><?php echo _s("Home");?></a></li>
			</ul>
		<div class="col_12">';
		$status = "Not Logged In";
	}
}
?>
