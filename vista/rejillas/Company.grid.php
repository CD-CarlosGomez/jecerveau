<?php 
$enterprice_p=array(); 
$mySQLiResult=$dato->MySQLiComando("Select EnterpriceGroupName,legalName,commercialName from company inner join ibenterprice on pkEnterprice=ibenterprice_pkEnterprice;");			 
while($row=$mySQLiResult->fetch_assoc()){
	$company_p[]=$row;
}
DataGridView::getInstance($company_p)
//->setGridAttributes(array('cellspacing' => '1', 'cellpadding' => '5', 'border' => '1'))
->enableSorting(true)
->removeColumn('pkCompany')
->addColumnAfter('Actions', 
	'<a href="#edit.php?id=" class="btn btn-success">Edit</a> - 
	 <a href="#delete.php?id=" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete user ?\')">Delete</a>', 'Actions', array('align' => 'center'))
//->addColumnBefore('Counter', '%counter%.', 'Counter', array('align' => 'right'))
->setStartingCounter(1)
->setRowClass('row')
->setAlterRowClass('alterRow')
->render();
?>


