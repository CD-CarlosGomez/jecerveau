<?php	//check txtUsername and txtPassword and set variables
// CONNECT TO THE DATABASE SERVER
include_once("Negocios.neg.php");
if (!isset($txtUsername) || !isset($txtPassword)){
$txtUsername=$_POST["txtUsername"];
$txtPassword=$_POST["txtPassword"];
}
if (isset($txtUsername) || isset($txtPassword)){

$pMySQLConection= new Negocio();

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
where username='$txtUsername' and pwd='$txtPassword' and Active=1 ";



//$mysql_link = new mysqli("localhost","root", "","ibrain20");
$pMySQLExecuteNonQuery = $pMySQLConection->SQLComand($query);


if ($pMySQLExecuteNonQuery) {
  $authentication = "YES";
  $status = "Logged In";
  $user = $txtUsername;

	print '<br/>';
	echo 'MENU';
	print '<ul>';
    while ($row = $pMySQLExecuteNonQuery->fetch_row()) {
		printf ("<li>$row[0]<ul>");
		$query2="
			SELECT 
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
			where username='$txtUsername' and pwd='$txtPassword' and Active=1 and ibfunctiongroupModulo='$row[0]';
			";
		$mysql_result2=$pMySQLConection->SQLComand($query2);
		while ($row2 = $mysql_result2->fetch_row()) {
				printf ("<li><a href='#'>%s</a></li>",$row2[1]);
		}
		printf("</ul></li>");
		
	}
	$mysql_result->close();
	$mysql_result2->close();
	echo '</ul>';
/*
	$menu_nombre=array(0=>"Programacion",1=>"Consolas y Juegos",2=>"PC",
                            3=>"Multimedia",4=>"General");
        $menu_nombre_sub=array(0=>array("PHP","JAVASCRIPT","C/C++","CSS"),
                                1=>array("Xbox 360","PS3","WII","General"),
                                2=>array("Hardware","Software","General"),
                                3=>array("Video","Muscia","Cine"),
                                4=>array("Deporte","Motor","Tecnologia"));
                                
        for($index=0;$index<count($menu_nombre);$index++)
        {
            echo "<li><a href=''>".$menu_nombre[$index]."</a>";
            if ($index<count($menu_nombre_sub))
            {
                if(count($menu_nombre_sub[$index]!=0))
                {
                    echo "<ul>";
                    for($index_2=0;$index_2<count($menu_nombre_sub[$index]);$index_2++)
                    {
                     echo "<li><a href=''>".$menu_nombre_sub[$index][$index_2]."</a></li>";
                    }
                    echo "</ul>";
                }
            }
            echo "</li>";
        }

	*/
}
else {
  //$wronginfomsg = "<CENTER><BR><B>$l_error </B><I>:P</I><BR>\n";
  echo $status = "Not Logged In";
}
}
?>
