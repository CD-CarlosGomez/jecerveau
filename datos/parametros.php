<?php
$stmt = $mysqli->prepare("INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
$stmt->bind_param('sssd', $code, $language, $official, $percent);

$code = 'DEU';
$language = 'Bavarian';
$official = "F";
$percent = 11.2;

/* ejecuta sentencias prepradas */
$stmt->execute();

printf("%d Fila insertada.\n", $stmt->affected_rows);

/* cierra sentencia y conexión */
$stmt->close();

/* Limpia la tabla CountryLanguage */
$mysqli->query("DELETE FROM CountryLanguage WHERE Language='Bavarian'");
printf("%d Fila borrada.\n", $mysqli->affected_rows);

/* cierra la conexión */
$mysqli->close();

function prepareParam($parametro){
if(is_string($parametro))
{
// Si el parámetro es una cadena retorna cadena
return "'".mysql_scape_string($parametro)."'";
}
else if(is_array($parametro))
{
// Si es un array devolvemos una lista de los parámetros
// separados por comas.
$devolver = '';
foreach($parametro as $par)
{
// Cuando retorno es vacio ('') quiere decir que no
// tenemos que añadir la coma.
if($devolver == '')
{
$devolver .= prepararParametro($par);
}
else
{
$devolver .= ','.prepararParametro($par);
}
}
return $devolver;
}
else if($parametro == NULL)
{
// Si es nulo devolvemos la cadena 'NULL'
return 'NULL';
}
else
{
// Devolvemos el parametro.
return $parametro;
}
}
function preparedStatement($cons_sql, $param = array()){
	// Partimos la consulta por los símbolos de interrogación
	$partes = explode("?", $cons_sql);
	 
	$devolver = '';
	$num_parametros = count($param);
	 
	// Recorremos los parametros
	for($i = 0; $i < $num_parametros; $i++)
	{
	// Juntamos cada parte con el parametro correspondiente preparado
	//con la función antes creada.
	$devolver .= $partes[$i].prepareParam($param[$i]);
	}
	 
	$num_partes = count($partes);
	// Si hay más partes que parametros quiere decir que hay una parte final que hay que concatenar
	if($num_partes > $num_parametros)
	{
	$devolver.= $partes[$num_partes -1];
	}
	 
	// Devolvemos la consulta preparada
	return $devolver;
	}


?>