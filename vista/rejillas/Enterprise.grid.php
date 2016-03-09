<?php 
//$enterprice_p=array(); Ya no es util para llenar el grid
$mySQLiResult=$dato->MySQLiComando("Select * from ibenterprice;");			 
$max=$dato->getQueryNuevoCodigo('ibenterprice','pkEnterprice'); 

$tableoutput='<form name="frm_searchEnterprice_h" id="EnterpriseForm" class="form-horizontal" method="POST" action="" role="form">';
$tableoutput.='<table class="table table-striped">
				<tbody>
					<tr>
						<th>Enterprice ID:</th>
						<th>Enterprice Name:</th>
						<th>Actions</th>
					</tr>';

while($row=$mySQLiResult->fetch_array(MYSQLI_ASSOC)){
	//$enterprice_p[]=$row;
	$tableoutput.="<tr>
					<td class='row'>".$row['pkEnterprice']."</td>
					<td class='row'>".$row['EnterpriceGroupName']."</td>
					<td class='row'>
					<button type='submit' id='' class='btn btn-success ECA' value='".$row['pkEnterprice']."' name='btn_editEnterprise_h'>Edit</button>
					<button type='submit' id='' class='btn btn-danger  ECA' value='".$row['pkEnterprice']."' name='btn_deleteEnterprise_h'>Delete</button>
					</td>
				</tr>";
}
 $tableoutput.="</tbody></table></form>";

 echo $tableoutput;


/*
DataGridView::getInstance($enterprice_p)
//->setGridAttributes(array('cellspacing' => '1', 'cellpadding' => '5', 'border' => '1'))
->enableSorting(true)
//->removeColumn('pkEnterprice')
->addColumnAfter('Actions', 
	'<a href="#edit.php?id=" class="btn btn-success">Edit</a> - 
	 <a href="#delete.php?id=" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete user ?\')">Delete</a>', 'Actions', array('align' => 'center'))
//->addColumnBefore('Counter', '%counter%.', 'Counter', array('align' => 'right'))
->setStartingCounter(1)
->setRowClass('row')
->setAlterRowClass('alterRow')
->render();*/
?>


