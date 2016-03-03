<?php //if (isset($ptxtNombreEmpresa_p)) include 'controlador/addCompany.neg.php';
		//else $ptxtNombreEmpresa_p=$_POST['ptxtNombreEmpresa_h'];
	if (!isset($ptxtNombreEmpresa_p)){
		$ptxtNombreEmpresa_p=$_POST['ptxtNombreEmpresa_h'];
		include_once "controlador/addCompany.neg.php";	
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
					      <form name="Login" class="vertical" id="" method="POST" action="" role="form">
							  <div class="form-group">
								<label for="">Enterprice name:</label>
								<input name="ptxtNombreEmpresa_h" id="" class="form-control" type="text" placeholder="">
							  </div>							  
							  <button type="submit" class="btn btn-default">Enviar</button>
							</form>
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
							<form role="form">
							  <div class="form-group">
								<label for="">Legal Name:</label>
								<input name="ptxtLegalName_h" id="" class="form-control" type="text" placeholder="">
							  </div>
								<div class="form-group">
								<label for="">Comercial Name:</label>
								<input name="ptxtComercialName_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Street:</label>
								<input name="ptxtStreet_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Ext Number:</label>
								<input name="ptxtExtNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Int Number:</label>
								<input name="ptxtIntNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Region:</label>
								<input name="ptxtRegion_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zone:</label>
								<input name="ptxtZone_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Province:</label>
								<input name="ptxtProvince_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zip Code:</label>
								<input name="ptxtZipCode_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Logo:</label>
								<input name="" id="" class="" type="file" placeholder="">
							  </div>
							  <button type="submit" class="btn btn-default">Enviar</button>
							</form>
					    </div>
						<div class="tab-pane" id="tab3">
							<form role="form">
							  <div class="form-group">
								<label for="">Branch Office Name:</label>
								<input name="ptxtBOName_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Street:</label>
								<input name="ptxtBOStreet_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Ext Number:</label>
								<input name="ptxtBOExtNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Int Number:</label>
								<input name="ptxtBOIntNumber_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Region:</label>
								<input name="ptxtBORegion_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zone:</label>
								<input name="ptxtBOZone_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Province:</label>
								<input name="ptxBOtProvince_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <div class="form-group">
								<label for="">Zip Code:</label>
								<input name="ptxtZipCode_h" id="" class="form-control" type="text" placeholder="">
							  </div>
							  <button type="submit" class="btn btn-default">Enviar</button>
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
	
