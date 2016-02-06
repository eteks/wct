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

function package_menu() {
    var wh = window.innerHeight;
    var smh = wh - 43;
    if (wh < 200) {
        $('.footer').css({'top': smh + "px"});
        $('body').css({'height': wh + "px", 'max-height': "200px"});
    } else {
        $('.footer').css('top', '100%');
        $('body').css('height', "200px", 'max-height', "200px");
    }
}
$(window).resize(function () {
    package_menu();
  });
$(document).ready(function () {
  package_menu();
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

    $('.sports_submit_act').click(function() {
        var form_data = $('#sports_form').serialize();
       //  alert(form_data);
        $.ajax({
           type: "POST",
           url: "functions/sports_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
               // alert(html);
               $('#sports_table tr:last').after(html);
           }
       });
    });
});
