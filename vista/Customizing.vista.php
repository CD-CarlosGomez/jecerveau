<?php //if (isset($ptxtNombreEmpresa_p)) include 'controlador/addCompany.neg.php';
		//else $ptxtNombreEmpresa_p=$_POST['ptxtNombreEmpresa_h'];
	$btn_addEnterprice_p=$_POST['btn_addEnterprice_h'];
	$btn_addCompany_p=$_POST['btn_addCompany_h'];
	$btn_addBranchOffice_p=$_POST['btn_addBranchOffice_h'];
	if(isset($btn_addEnterprice_p)){
		include_once "controlador/addEnterprice.neg.php";	
	}
	if(isset($btn_addCompany_p)){
		include_once "controlador/addCompany.neg.php";
	}
	if(isset($btn_addBranchOffice_p)){
		include_once "controlador/addBranchOffice.neg.php";
	}
	
 ?>

<div class="row">
<div class="col-md-1"></div>
<div id="rootwizard" class="col-md-10">
		<div class="navbar">
					  <div class="navbar-inner">
					    <div class="container">
					<ul>
					  	<li><a href="#tab1" data-toggle="tab">Enterprice</a></li>
						<li><a href="#tab2" data-toggle="tab">Company</a></li>
						<li><a href="#tab3" data-toggle="tab">Branch Office</a></li>
					</ul>
					 </div>
					  </div>
					</div>
					<div id="bar" class="progress progress-striped active">
					  <div class="bar"></div>
					</div>
					<div class="tab-content">
					    <div class="tab-pane" id="tab1">
					      <form name="frm_addEnterprice_h" id="EnterpriseForm" class="form-horizontal mitad" method="POST" action="" role="form">
							  <div class="form-group">
								<label for="">Enterprice name:</label>
								<input name="txtNombreEmpresa_h" id="" class="form-control" type="text" placeholder="">
							  </div>							  
							  <button name="btn_addEnterprice_h" type="submit" class="btn btn-default">Enviar</button>
							</form>
							<br/>
							<table class="table table-striped">
								<tr>
									<td>Enterprice name</td>
									<td>Enterprice description</td>
									<td>&nbsp;</td>
								</tr>
							</table>
								<?php //include "vista/rejillas/Company.grid.php"; ?>
					    </div>
					    <div class="tab-pane" id="tab2">
							<form name="frm_addCompany_h" id="CompanyForm" class="vertical" method="POST" Action="" role="form">
							  <div class="form-group">
								<label for="">Legal Name:</label>
								<input name="txtLegalName_h" id="txt" class="form-control" type="text" placeholder="">
							  </div>
								<div class="form-group">
								<label for="">Comercial Name:</label>
								<input name="txtCommercialName_h" id="txt" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Street:</label>
								<input name="txtStreet_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Ext Number:</label>
								<input name="txtExtNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Int Number:</label>
								<input name="txtIntNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Region:</label>
								<input name="txtRegion_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zone:</label>
								<input name="txtZone_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Province:</label>
								<input name="txtProvince_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zip Code:</label>
								<input name="txtZipCode_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="sfd_Logo">Logo:</label>
								<input name="sfd_Logo_h" id="" class="" type="file" placeholder="">
							  </div>
							  <button type="submit" name="btn_addCompany_h" id="" class="btn btn-default">Enviar</button>
							</form>
					    </div>
						<div class="tab-pane" id="tab3">
							<form role="form" id="" class="vertical" method="POST" action="" name="frm_addBranchOffice_h">
							  <div class="form-group">
								<label for="">Branch Office Name:</label>
								<input name="txtBOName_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Street:</label>
								<input name="txtBOStreet_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Ext Number:</label>
								<input name="txtBOExtNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Int Number:</label>
								<input name="txtBOIntNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Region:</label>
								<input name="txtBORegion_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zone:</label>
								<input name="txtBOZone_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Province:</label>
								<input name="txBOtProvince_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zip Code:</label>
								<input name="txtBOZipCode_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <button type="submit" id="" class="btn btn-default" name="btn_addBranchOffice_h">Enviar</button>
							</form>
					    </div>
						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="javascript:;">First</a></li>
							<li class="previous"><a href="javascript:;">Previous</a></li>
							<li class="next last" style="display:none;"><a href="javascript:;">Last</a></li>
						  	<li class="next"><a href="javascript:;">Next</a></li>
						</ul>
					</div>
				</div>
	</div>
<div class="col-md-1"></div>
</div>
<script>
	$(document).ready(function() {
	  	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard').find('.bar').css({width:$percent+'%'});
		}});
	});
</script>
	
