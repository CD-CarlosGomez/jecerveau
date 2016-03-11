<?php 
$mySQLiResultCompany=$dato->MySQLiComando("Select pkCompany,EnterpriceGroupName,legalName,commercialName from company inner join ibenterprice on pkEnterprice=ibenterprice_pkEnterprice;");			 
$tableoutput='<form name="frm_searchCompany_h" id="CompanyForm" class="form-horizontal" method="POST" action="" role="form">';
$tableoutput.='<table class="table table-striped">
				<tbody>
					<tr>
						<th>Legal Name:</th>
						<th>Commercial Name:</th>
						<th>Actions</th>
					</tr>';

while($row=$mySQLiResultCompany->fetch_array(MYSQLI_ASSOC)){
	$tableoutput.="<tr>
					<td class='row'>".$row['legalName']."</td>
					<td class='row'>".$row['commercialName']."</td>
					<td class='row'>
						<button type='submit' id='' class='btn btn-success ECA' value='".$row['pkCompany']."' name='btn_editEnterprise_h'>Edit</button>
						<button type='submit' id='' class='btn btn-danger  ECA' value='".$row['pkCompany']."' name='btn_deleteEnterprise_h'>Delete</button>
						<button type='submit' id='' class='btn btn-info  ECA' value='".$row['pkCompany']."' name='btn_Branch Office_h'>Add Branch Officce</button>
					</td>
				</tr>";
}
 $tableoutput.="</tbody></table></form>";

 echo $tableoutput;


?>


