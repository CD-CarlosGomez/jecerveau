$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#EnterpriseForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
			txt_NombreEmpresa_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'The enterprise name must be more than 1 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑ0-9_\.\-\s]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			}
        }
	});
	$('#addEnterpriseForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
			txt_NombreEmpresa_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'The enterprise name must be more than 1 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑ0-9_\.\-\s]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			}
        }
	});
	$('#CompanyForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
			txtLegalName_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    }
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtCommercialName_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtStreet_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtExtNumber_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtIntNumber_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtRegion_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtZone_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtProvince_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtZipCode_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			}   
		}
    });
	
	$('#BranchOfficeForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
			txtBOName_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    }
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtBOStreet_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtBOExtNumber_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtBOIntNumber_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtBORegion_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtBOZone_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtBOProvince_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			},
			txtBOZipCode_h:{
				message: 'The Enterprise name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Enterprise name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The enterprise name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The enterprise name can only consist of alphabetical, number, dot and underscore'
                    },
                    //different: {
                      //  field: 'password',
                        //message: 'The enterprise name and password can\'t be the same as each other'
                    //}
                }
			}   
		}
    });
	
});