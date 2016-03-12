<?php //if (isset($ptxtNombreEmpresa_p)) include 'controlador/addCompany.neg.php';
		//else $ptxtNombreEmpresa_p=$_POST['ptxtNombreEmpresa_h'];
	@$btn_addEnterprice_p=$_POST['btn_addEnterprice_h'];
	@$btn_addCompany_p=$_POST['btn_addCompany_h'];
	@$btn_addBranchOffice_p=$_POST['btn_addBranchOffice_h'];
	@$btn_searchEnterprice_p=$_POST['btn_searchEnterprice_h'];
	@$btn_searchCompany_p=$_POST['btn_searchCompany_h'];
	@$btn_editEnterprise_p=$_POST['btn_editEnterprise_h'];
	@$btn_deleteEnterprise_p=$_POST['btn_deleteEnterprise_h'];
	@$btn_updateEnterprise_p=$_POST['btn_updateEnterprise_h'];
	
	if(isset($btn_addEnterprice_p)){
		include_once "controlador/addEnterprice.neg.php";	
	}
	if(isset($btn_addCompany_p)){
		include_once "controlador/addCompany.neg.php";
	}
	if(isset($btn_addBranchOffice_p)){
		include_once "controlador/addBranchOffice.neg.php";
	}
	if(isset($btn_editEnterprise_p)){
		include_once "controlador/editEnterprise.neg.php";
	}
	if(isset($btn_deleteEnterprise_p)){
		include_once "controlador/deleteEnterprice.neg.php";
	}
	if(isset($btn_updateEnterprise_p)){
		include_once "controlador/updateEnterprise.neg.php";
	}
 ?>

<div class="row">
<div class="col-md-1"></div>
<div id="" class="col-md-10">
	<div id="accordion" class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Grupo Empresarial</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse <?php echo $classECA1; ?>">
            <div class="panel-body">
				<div id="" class="row">
					<div id="" class="col-md-1"></div>
					<form name="frm_searchEnterprice_h" id="EnterpriseForm" class="form-horizontal" method="POST" action="" role="form">
						<div id="" class="col-md-7">
							<div class="form-group">
							<label for="">Enterprise name:</label>
							<input name="txt_NombreEmpresa_h" id="" class="form-control" type="text" placeholder="">
							</div>
						</div>
						<div id="" class="col-md-1">
							<button name="btn_searchEnterprice_h" type="submit" class="btn btn-default">Buscar</button>
							<button name="btn_ECAccordion_h" type="button" class="btn btn-primary ECA">Agregar</button>
						</div>
					</form>
					<div id="" class="col-md-1"></div>
				</div>
				<div id="" class="row">
						<?php 
						if(isset($btn_searchEnterprice_p)){
							include_once "controlador/searchEnterprise.neg.php";
						}
						else{
							include_once "vista/rejillas/Enterprise.grid.php";
						}
						?>
				</div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Formulario grupo empresarial</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse <?php echo $classECA2; ?>">
            <div class="panel-body">
                <form name="frm_addEnterprice_h" id="addEnterpriseForm" class="form-horizontal" method="POST" action="" role="form">
					<div class="form-group">
						<div id="" class="col-md-2"><label for="">Enterprise number:</label></div>							  
						<div id="" class="col-md-8">
						<?php echo $updateButton=($btn_editEnterprise_p==TRUE)?
							'<input name="txt_NombreEmpresa_h" id="" class="form-control" type="text" placeholder="" value="'.$rowEnterprise.'">
							 <input type="hidden" id="" class="" value="'.$btn_editEnterprise_p.'" name="hdn_pkEnterprice_h"/>
							 <button name="btn_updateEnterprise_h" type="submit" class="btn btn-default">Modificar</button>'
							:
							'<input name="txt_NombreEmpresa_h" id="" class="form-control" type="text" placeholder="" value="">
							<button name="btn_addEnterprice_h" type="submit" class="btn btn-default">Agregar</button>';?>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Compañías</a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <div id="" class="row">
					<div id="" class="col-md-1"></div>
					<form name="frm_addEnterprice_h" id="EnterpriseForm" class="form-horizontal" method="POST" action="" role="form">
						<div id="" class="col-md-8">
							<div class="form-group">
								<div class="col-md-3"><label for="">Legal Name:</label></div>
								<div class="col-md-5"><input type="text" id="" class="form-control" placeholder="" name="txt_LegalName_h"></div>
							</div>
							<div class="form-group">
								<div class="col-md-3"><label for="">Commercial name:</label></div>
								<div class="col-md-5"><input type="text" id="" class="form-control" placeholder="" name="txt_CommercialName_h"></div>
							</div>
							<div class="form-group">
								<div class="col-md-3"><label for="">Region:</label></div>
								<div class="col-md-5"><input type="text" id="" class="form-control" placeholder="" name="txt_Region_h"></div>
							</div>
							<div class="form-group">
								<div class="col-md-3"><label for="">Zone:</label></div>
								<div class="col-md-5"><input type="text" id="" class="form-control" placeholder="" name="txt_Zone_h"></div>
							</div>
							<div class="form-group">
								<div class="col-md-3"><label form="">Province:</label></div>
								<div class="col-md-5"><input type="text" id="" class="form-control" placeholder="" name="txt_Province_h"></div>
							</div>
							<div class="form-group">
								<div class="col-md-3"><label form="">Zip Code:</label></div>
								<div class="col-md-5"><input type="text" id="" class="form-control" placeholder="" name="txt_ZipCode_h"></div>
							</div>	
						</div>							  
						<div id="" class="col-md-2">
							<div class="form-group">
								<button name="btn_searchCompany_h" type="submit" class="btn btn-default">Buscar</button>
								<button name="btn_ECAccordion2_h" type="button" class="btn btn-primary">Agregar</button>
							</div>
						</div>
					</form>
					<div id="" class="col-md-1"></div>
				</div>
				<div id="" class="row">
					<?php 
						if(isset($btn_searchCompany_p)){
							include_once "controlador/searchCompany.neg.php";
						}
						else{
							include_once "vista/rejillas/Company.grid.php";
						}
						?>
				</div>
            </div>
        </div>
    </div>
	<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Formulario Compañías</a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <p>Formulario2</a></p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-md-1"></div>
</div>
	
