<?php
	$lWhereParametro=array();
	$lWhereCampo=array();
	$lCampos=array("*");
	
	if (!isset($txt_LegalName_p)){
		$txt_LegalName_p=$_POST['txt_LegalName_h'];
	}
	if (!isset($txt_CommercialName_p)){
		$txt_CommercialName_p=$_POST['txt_CommercialName_h'];
	}
	if (!isset($txt_Region_p)){
		$txt_Region_p=$_POST['txt_Region_h'];
	}
	if (!isset($txt_Zone_p)){
		$txt_Zone_p=$_POST['txt_Zone_h'];
	}
	if (!isset($txt_Province_p)){
		$txt_Province_p=$_POST['txt_Province_h'];
	}
	if (!isset($txt_ZipCode_p)){
		$txt_ZipCode_p=$_POST['txt_ZipCode_h'];
	}
	
	if ($txt_LegalName_p<>null){
		array_push($lWhereCampo,"legalName");
		array_push($lWhereParametro,$txt_LegalName_p);
	}
	if ($txt_CommercialName_p<>null){
		array_push($lWhereCampo,"CommercialName");
		array_push($lWhereParametro,$txt_CommercialName_p);
	}
	if ($txt_Region_p<>null){
		array_push($lWhereCampo,"Region");
		array_push($lWhereParametro,$txt_Region_p);
	}
	if ($txt_Zone_p<>null){
		array_push($lWhereCampo,"Zone");
		array_push($lWhereParametro,$txt_Zone_p);
	}
	if ($txt_Province_p<>null){
		array_push($lWhereCampo,"Province");
		array_push($lWhereParametro,$txt_Province_p);
	}
	if ($txt_ZipCode_p<>null){
		array_push($lWhereCampo,"ZipCode");
		array_push($lWhereParametro,$txt_ZipCode_p);
	}
	
	
	
	
	$mySQLiComando=$dato->getSQLQuerySelectLike($lCampos,"Company",$lWhereCampo,$lWhereParametro);
	$mySQLiResult=$dato->MySQLiComando($mySQLiComando);
	$tableoutput='<form name="frm_searchEnterprice_h" id="EnterpriseForm" class="form-horizontal" method="POST" action="" role="form">';
	$tableoutput.='<table class="table table-striped">
				<tbody>
					<tr>
						<th>Legal Name:</th>
						<th>Commercial Name:</th>
						<th>Region:</th>
						<th>Zone:</th>
						<th>Zip Code:</th>
						<th>Street:</th>
						<th>Actions</th>
					</tr>';
	
while($row=$mySQLiResult->fetch_array(MYSQLI_ASSOC)){
	$tableoutput.="<tr>
					<td class='row'>".$row['legalName']."</td>
					<td class='row'>".$row['commercialName']."</td>
					<td class='row'>".$row['Region']."</td>
					<td class='row'>".$row['Zone']."</td>
					<td class='row'>".$row['ZipCode']."</td>
					<td class='row'>".$row['Street']."</td>
					<td class='row'>
						<button type='submit' id='' class='btn btn-success ECA' value='".$row['pkCompany']."' name='btn_editEnterprise_h'>Edit</button>
						<button type='submit' id='' class='btn btn-danger  ECA' value='".$row['pkCompany']."' name='btn_deleteEnterprise_h'>Delete</button>
						<button type='submit' id='' class='btn btn-info  ECA' value='".$row['pkCompany']."' name='btn_Company_h'>Add Company</button>
					</td>
				</tr>";
}
 $tableoutput.="</tbody></table></form>";

 echo $tableoutput;
?>