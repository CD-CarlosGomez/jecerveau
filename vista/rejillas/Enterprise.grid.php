<?php 
$enterprice_p=array(); 
$mySQLiResult=$dato->MySQLiComando("Select * from ibenterprice;");			 
$max=$dato->getQueryNuevoCodigo('ibenterprice','pkEnterprice'); 

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
						<a href='#edit.php?id=".$row['pkEnterprice']."' class='btn btn-success ECA'>Edit</a>'
						<a href='#delete.php?id=".$row['pkEnterprice']."' class='btn btn-danger ECA' onclick='return confirm(\'Are you sure you want to delete user ?\')'>Delete</a>
					</td>
				</tr>";
}
 $tableoutput.="</tbody></table>";

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


