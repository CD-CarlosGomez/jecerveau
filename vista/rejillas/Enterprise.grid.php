<?php 
$mySQLiResult=$dato->MySQLiComando("Select * from ibenterprice where Active=1;");			 
 
$tableoutput='<form name="frm_searchEnterprice_h" id="EnterpriseForm" class="form-horizontal" method="POST" action="" role="form">';
$tableoutput.='<table class="table table-striped">
				<tbody>
					<tr>
						<th>Enterprice ID:</th>
						<th>Enterprice Name:</th>
						<th>Actions</th>
					</tr>';

while($row=$mySQLiResult->fetch_array(MYSQLI_ASSOC)){
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


