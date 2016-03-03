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
	$dataGridView=new DataGridView();
	$dato=new Datos($conexion,$dataGridView);
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
		echo "	
			<nav class='navbar navbar-default' role='navigation'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
						<span class='sr-only'>Desplegar navegación</span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a class='navbar-brand' href='#'>Home</a>
				</div>
				<div class='collapse navbar-collapse navbar-ex1-collapse'>
					<ul class='nav navbar-nav'>";
		while ($row=$pMySQLExecuteNonQuery->fetch_row()) {
			printf ("<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>$row[0]<b class='caret'></b></a><ul class='dropdown-menu'>");
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
					printf ("<li class='dropdown'><a href='#'><span class='icon' data-icon='2'></span>%s</a></li>",$row2[1]);
			}
			printf("</ul></li>");
			$pMySQLiQuery->close();
		}
		$pMySQLExecuteNonQuery->close();
		echo '
						<li><a  href="">Logout</a></li>
					</ul>
				</div>
			</nav>
			<br />';		
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
