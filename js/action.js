function state_center_align(){
      var height=$('.state_div').height();
      var width=$('.state_div').width();
      $('.state_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}
function delete_center_align(){
      var height=$('.delete_div').height();
      var width=$('.delete_div').width();
      $('.delete_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}


$(document).ready(function () {

 	state_center_align();
 	delete_center_align();

//Edit popup
  	$('.edit_state').click(function(){
        state_center_align();
        $('.popup_fade').show();
        $('.state_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.delete_state').click(function(){

        delete_center_align();
        $('.popup_fade').show();
        $('.delete_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
  	$('.cancel_btn').click(function(){
        $('.popup_fade').hide();
        $('.state_div,.delete_div').hide();
        document.body.style.overflow = 'auto';
    });

	$('.collapse').on('shown.bs.collapse', function (e) {
	    $('.collapse').not(this).removeClass('in');
	});

	$('[data-toggle=collapse]').click(function (e) {
	   $('[data-toggle=collapse]').parent('li').removeClass('active');
	   $(this).parent('li').toggleClass('active');
	});

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