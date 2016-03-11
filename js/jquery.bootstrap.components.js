$(document).ready(function(){
    $(".ECA").click(function(){
        $("#collapseOne").collapse('hide');
        $("#collapseTwo").collapse('show');
    });
	

	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard').find('.bar').css({width:$percent+'%'});
	}});

});
