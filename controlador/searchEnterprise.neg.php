<?php
	if (!isset($txt_NombreEmpresa_p)){
		$txt_NombreEmpresa_p=$_POST['txt_NombreEmpresa_h'];
	}
	$mySQLiComando="SELECT * FROM ibenterprice WHERE enterpriceGroupName like '%$txt_NombreEmpresa_p%'";
	$mySQLiResult=$dato->MySQLiComando($mySQLiComando);
	$tableoutput='<table class="table table-striped">
				<tbody>
					<tr>
						<th>Enterprice ID:</th>
						<th>Enterprice Name:</th>
						<th>Actions</th>
					</tr>';

while($row=$mySQLiResult->fetch_array(MYSQLI_ASSOC)){
	$enterprice_p[]=$row;
	$tableoutput.="<tr>
					<td class='row'>".$row['pkEnterprice']."</td>
					<td class='row'>".$row['EnterpriceGroupName']."</td>
					<td class='row'>
						<a href='#edit.php?pk=".$row['pkEnterprice']."' class='btn btn-success ECA'>Edit</a>'
						<a href='#delete.php?pk=".$row['pkEnterprice']."' class='btn btn-danger ECA'>Delete</a>
					</td>
				</tr>";
}
 $tableoutput.="</tbody></table>";

 echo $tableoutput;
	
	
?>