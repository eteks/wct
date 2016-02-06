$(document).ready(function () {
	 $('.collapse').on('shown.bs.collapse', function (e) {
	    $('.collapse').not(this).removeClass('in');
	 });

	 $('[data-toggle=collapse]').click(function (e) {
	   $('[data-toggle=collapse]').parent('li').removeClass('active');
	   $(this).parent('li').toggleClass('active');
	 });

 	// Redirects page based on user type
	$('[name=optradio]').change(function(){ 
	  	if($(this).val() == "administrator"){
	  		$(this).attr('checked',checked);
	  		// window.location.href="index.php";
	  	}
	  	else
	  		window.location.href="sports.php";
	});

 	// Autocomplete results for states list
	var states_list = [];
		$('.states_list li').each(function(){
			states_list.push($(this).text());
	});
	$('.statesname').focus(function (e) {
		$(this).autocomplete({
			source: states_list,
	 	});
	});
	// $('.choose_state').change(function(){ 
	//   	$.ajax({
	// 		type: "POST",
	// 		url: "district.php?loaddistrict=true",
	// 		// url:"../functions/district_function.php?loaddistrict=true",
	// 		data: {'state_val': $('.choose_state option:selected').text() },
	// 		success: function (data) {
	// 			// alert(data);
	// 		}
	// 	});
	// });
});