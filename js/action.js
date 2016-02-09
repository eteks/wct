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
function login_center_align(){
      var height=$('.login_div').height();
      var width=$('.login_div').width();
      $('.login_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}
function register_center_align(){
      var height=$('.register_div').height();
      var width=$('.register_div').width();
      $('.register_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}
function test_center_align(){
      var height=$('.test_div').height();
      var width=$('.test_div').width();
      $('.test_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}
function district_center_align(){
      var height=$('.district_div').height();
      var width=$('.district_div').width();
      $('.district_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}
function test_battery_center_align(){
      var height=$('.test_battery_div').height();
      var width=$('.test_battery_div').width();
      $('.test_battery_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}
function range_center_align(){
      var height=$('.range_div').height();
      var width=$('.range_div').width();
      $('.range_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
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

function editfunction(data_id){
    $.ajax({
     type: "POST",
     url: "functions/edit_and_delete_function.php?chooseedit=true",
     data: {data_id:data_id},
     cache: false,
     success: function(data) {
      var obj = JSON.parse(data);
      $.each(obj, function(i){
        $('[name=edit_states_id]').val(obj[i].states_id);
        $('[name=edit_states_name]').val(obj[i].states_name);
      });
      $('.popup_fade').show();
      $('.state_div, .close_btn').show();
      document.body.style.overflow = 'hidden';
     }
  });
}
$(window).resize(function () {
    package_menu();
  });
$(document).ready(function () {
  package_menu();
 	state_center_align();
  delete_center_align();
  login_center_align();
  register_center_align();
  test_center_align();
  district_center_align();
  test_battery_center_align();
  range_center_align();

    //Edit popup
  	$('.edit_state').click(function(){
        state_center_align();
        $('.popup_fade').show();
        $('.state_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
        //alert($(this).parents('tr').find('.sports_id').text());
        $('.sports_update_name').val($(this).parents('tr').find('.sports_name').text());
        $('.sports_update_id').val($(this).parents('tr').find('.sports_id').text());
    });
    $('.delete_state').click(function(){
        delete_center_align();
        $('.popup_fade').show();
        $('.delete_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
        $('#delete_id').val($(this).parents('tr').find('.sports_id').text());
    });
  	$('.login').click(function(){
        login_center_align();
        $('.popup_fade').show();
        $('.login_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.register').click(function(){
        register_center_align();
        $('.popup_fade').show();
        $('.register_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.edit_state').click(function(){
        test_center_align();
        $('.popup_fade').show();
        $('.test_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.edit_state').click(function(){
        district_center_align();
        $('.popup_fade').show();
        $('.district_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.edit_state').click(function(){
        test_battery_center_align();
        $('.popup_fade').show();
        $('.test_battery_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.edit_state').click(function(){
        range_center_align();
        $('.popup_fade').show();
        $('.range_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.cancel_btn').click(function(){
        $('.popup_fade').hide();
        $('.state_div,.delete_div,.login_div,.register_div,.test_div,.district_div,.test_battery_div,.range_div').hide();
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

    $('.sports_submit_act').click(function() {
        var form_data = $('#sports_form').serialize();
       // alert(form_data);
        $.ajax({
           type: "POST",
           url: "functions/sports_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
               //alert(html);
               if(html=='error'){
                 alert('Already sports name entred');
               }else{
                 $('#sports_table tr:last').after(html);
               }

           }
       });
    });

    $('.edit_states').click(function(){
      var form_data = $('[name=edit_states_form]').serializeArray();
        $.ajax({
           type: "POST",
           url: "functions/edit_and_delete_function.php?editdata=true",
           data: form_data,
           cache: false,
           success: function(html) {
               var result_split = html.split('#'); 
               if (result_split[0].indexOf("success") > 1){
                 $('.state_table').find(".t_states_id:contains("+result_split[2]+")").next('.t_states_name').html(result_split[3]);
                 $('.popup_fade').hide();
                 $('.state_div, .close_btn').hide();
                 document.body.style.overflow = 'auto';
               }
               else{
                $('.edit_states_error').text(result_split[1]).show();
               }              
           }
       });
    });

    $('.sports_update_act').click(function() {
        var form_data = $('#sports_update_form').serialize();
       alert(form_data);
        $.ajax({
           type: "POST",
           url: "functions/sports_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
               //alert(html);
               if(html=='error'){
                 alert('Already sports name entred');
               }else{
                 var sports_split = html.split('-');
                $('#sports_table').find(".sports_id:contains("+sports_split[1]+")").next('.sports_name').html(sports_split[0]);
                //alert('Sports name updated successfully');
                $('.popup_fade').hide();
                $('.state_div,.delete_div').hide();
                document.body.style.overflow = 'auto';
               }

           }
       });
    });
    $('.yes_btn').click(function() {
        var del_id =$('#delete_id').val();
        var form_data = {'sports_del':'1','del_id':del_id};
        $.ajax({
           type: "POST",
           url: "functions/sports_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
               $('#sports_table').find(".sports_id:contains("+html+")").parents('tr').remove();
               $('.popup_fade').hide();
               $('.state_div,.delete_div').hide();
               document.body.style.overflow = 'auto';
            }
       });
    });

    $('.no_btn').click(function(event) {
        $('.popup_fade').hide();
        $('.state_div,.delete_div').hide();
        document.body.style.overflow = 'auto';
    });

});
