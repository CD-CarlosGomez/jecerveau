<?php
	if (!isset($txt_NombreCompania_p)){
		$txt_NombreCompania_p=$_POST['txtNombreCompania_h'];
	}
	
	
	
	
	
	$mySQLiComando="Select pkCompany,legalName,commercialName from company WHERE commercialName like '%$txt_NombreEmpresa_p%' and active=1;";
	$mySQLiResult=$dato->MySQLiComando($mySQLiComando);
	$tableoutput='<form name="frm_searchEnterprice_h" id="EnterpriseForm" class="form-horizontal" method="POST" action="" role="form">';
	$tableoutput.='<table class="table table-striped">
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
						<button type='submit' id='' class='btn btn-success ECA' value='".$row['pkEnterprice']."' name='btn_editEnterprise_h'>Edit</button>
						<button type='submit' id='' class='btn btn-danger  ECA' value='".$row['pkEnterprice']."' name='btn_deleteEnterprise_h'>Delete</button>
						<button type='submit' id='' class='btn btn-info  ECA' value='".$row['pkEnterprice']."' name='btn_Company_h'>Add Company</button>
					</td>
				</tr>";
}
 $tableoutput.="</tbody></table></form>";

 echo $tableoutput;
	
	
?>