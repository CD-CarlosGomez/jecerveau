<?php
	if (!isset($txt_NombreEmpresa_p)){
		$txt_NombreEmpresa_p=$_POST['txt_NombreEmpresa_h'];
	}
	$mySQLiComando="SELECT * FROM ibenterprice WHERE enterpriceGroupName like '%$txt_NombreEmpresa_p%'";
	$mySQLiResult=$dato->MySQLiComando($mySQLiComando);
	while($row=$mySQLiResult->fetch_assoc()){
	$enterprice_p[]=$row;
	}
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
	->render();
	
?>