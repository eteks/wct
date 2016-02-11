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
function parameter_center_align(){
      var height=$('.paramter_div').height();
      var width=$('.paramter_div').width();
      $('.paramter_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
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
    if (window.location.href.indexOf("state.php") !== -1){
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
    } else if(window.location.href.indexOf("district.php") !== -1){
          $.ajax({
           type: "POST",
           url: "functions/district_function.php?chooseedit=true",
           data: {data_id:data_id},
           cache: false,
           success: function(data) {
            var obj = JSON.parse(data);
            $.each(obj, function(i){
              $('[name=edit_district_id]').val(obj[i].district_id);
              $('[name=edit_district_state]').append("<option value='"+obj[i].states_id+ "'selected>"+obj[i].states_name+"</option>");
              $('[name=edit_district_name]').val(obj[i].district_name);
            });
            $('.popup_fade').show();
            $('.district_div, .close_btn').show();
            document.body.style.overflow = 'hidden';
           }
        });
    } else if(window.location.href.indexOf("athletes.php") !== -1){
      // alert(data_id);
          $.ajax({
           type: "POST",
           url: "functions/athletes_functions.php?chooseedit=true",
           data: {data_id:data_id},
           cache: false,
           success: function(data) {
            var obj = JSON.parse(data);
            $.each(obj, function(i){
              dob = obj[i].athlete_dob.split('-');
              alert(dob);
              $('[name=edit_athlete_id]').val(obj[i].athlete_id);
              $('[name=edit_athlete_name]').val(obj[i].athlete_name);
              $('[name=edit_athlete_dobday]').append("<option value='"+dob[2]+ "'selected>"+dob[2]+"</option>");
              $('[name=edit_athlete_dobmonth]').append("<option value='"+dob[1]+ "'selected>"+dob[1]+"</option>");
              $('[name=edit_athlete_dobyear]').append("<option value='"+dob[0]+ "'selected>"+dob[0]+"</option>");
              $('[name=edit_athlete_mobile]').val(obj[i].athlete_mobile);
              $('[name=edit_athlete_gender]').val(obj[i].athlete_gender);
              $('[name=edit_athlete_state]').append("<option value='"+obj[i].athletestates_id+ "'selected>"+obj[i].athletestates_name+"</option>");
              $('[name=edit_athlete_district]').append("<option value='"+obj[i].athletedistrict_id+ "'selected>"+obj[i].athletedistrict_name+"</option>");
              $('[name=edit_athlete_sports]').append("<option value='"+obj[i].athletesports_id+ "'selected>"+obj[i].athletesports_name+"</option>");
            });
            $('.popup_fade').show();
            $('.district_div, .close_btn').show();
            document.body.style.overflow = 'hidden';
           }
        });
    }
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
  parameter_center_align();

    //Edit popup
  	$('.edit_state').click(function(){
        state_center_align();
        $('.popup_fade').show();
        $('.state_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
        //alert($(this).parents('tr').find('.sports_id').text());
        $('.sports_update_name').val($(this).parents('tr').find('.sports_name').text());
        $('.sports_update_id').val($(this).parents('tr').find('.sports_id').text());
        $('.category_update_name').val($(this).parents('tr').find('.category_name').text());
        $('.category_update_id').val($(this).parents('tr').find('.category_id').text());
    });
    // $('.delete_state').click(function(){
    //     delete_center_align();
    //     $('.popup_fade').show();
    //     $('.delete_div, .close_btn').show();
    //     document.body.style.overflow = 'hidden';
    //     if(window.location == 'http://localhost/wct/category.php'){
    //         $('#delete_id').val($(this).parents('tr').find('.category_id').text());
    //     }else if (window.location == 'http://localhost/wct/sports.php') {
    //         $('#delete_id').val($(this).parents('tr').find('.sports_id').text());
    //     }
    // });
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
    $('.edit_state').click(function(){
        parameter_center_align();
        $('.popup_fade').show();
        $('.paramter_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.cancel_btn').click(function(){
        $('.popup_fade').hide();
        $('.state_div,.delete_div,.login_div,.register_div,.test_div,.district_div,.test_battery_div,.range_div,.paramter_div').hide();
        document.body.style.overflow = 'auto';
    });

	$('.collapse').on('shown.bs.collapse', function (e) {
	    $('.collapse').not(this).removeClass('in');
	});

	$('[data-toggle=collapse]').click(function (e) {
	   $('[data-toggle=collapse]').siblings('li').removeClass('active');
	   $(this).siblings('li').toggleClass('active');
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
                  location.reload();
                 //$('#sports_table tr:last').after(html);

               }

           }
       });
    });

    // start (added by kalai)
    // Jquery and ajax functionality for states
    $('.add_states_act').click(function(){
      var form_data = $('[name=states_form]').serialize();
      $.ajax({
           type: "POST",
           url: "functions/states_function.php?adddata=true",
           data: form_data,
           cache: false,
           success: function(html) {
              var result_split = html.split('#');
               if (result_split[0].indexOf("success") !== -1){
                 // $('.add_states_error').text(result_split[1]).show();
                 alert(result_split[1]);
                 html ="<tr class='align_center delete_color'>\
                 <input type='hidden' name='states_id' value="+result_split[2]+">\
                 <td class='t_states_id'>"+result_split[2]+"</td>\
                    <td class='t_states_name'>"+result_split[3]+"</td>\
                    <td>\
                      <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                      <span class='delete_state' onclick='deletefunction("+result_split[2]+")'>Delete</span>\
                    </td></tr> ";
                 $('.state_table tr:last').after(html);
               }
               else{
                $('.add_states_error').text(result_split[1]).show();
               }
           }
       });
    });

    $('.edit_states_act').click(function(){
      var form_data = $('[name=edit_states_form]').serializeArray();
        $.ajax({
           type: "POST",
           url: "functions/edit_and_delete_function.php?editdata=true",
           data: form_data,
           cache: false,
           success: function(html) {
               var result_split = html.split('#');
               if (result_split[0].indexOf("success") !== -1){
                 $('.edit_states_error').hide();
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

    $('.delete_state').click(function(){
      $('#delete_id').val($(this).attr("data-value"));
      $('.popup_fade').show();
      $('.delete_div, .close_btn').show();
      document.body.style.overflow = 'hidden';
    });

    // Jquery and ajax functionality for district
    $('.add_district_act').click(function(){
      var form_data = $('[name=district_form]').serialize();
      $.ajax({
           type: "POST",
           url: "functions/district_function.php?adddata=true",
           data: form_data,
           cache: false,
           success: function(html) {
              var result_split = html.split('#');
               if (result_split[0].indexOf("success") !== -1){
                 // $('.add_district_error').text(result_split[1]).show();
                 alert(result_split[1]);
                 html ="<tr class='align_center delete_color'>\
                 <input type='hidden' name='district_id' value="+result_split[2]+">\
                 <td class='t_district_id'>"+result_split[2]+"</td>\
                    <td class='t_district_name'>"+result_split[4]+"</td>\
                    <td>\
                      <span class='edit_state'>Edit</span>\
                      <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                    </td></tr> ";
                 $('.district_table tr:last').after(html);
               }
               else{
                $('.add_district_error').text(result_split[1]).show();
               }
           }
       });
    });

    $('.edit_district_act').click(function(){
      var form_data = $('[name=edit_district_form]').serialize();
        $.ajax({
           type: "POST",
           url: "functions/district_function.php?editdata=true",
           data: form_data,
           cache: false,
           success: function(html) {
               var result_split = html.split('#');
               if (result_split[0].indexOf("success") !== -1){
                 // $('.edit_states_error').hide();
                 alert(result_split[1]);
                 $('.district_table').find(".t_district_id:contains("+result_split[2]+")").next('.t_district_name').html(result_split[3]);
                 $('.popup_fade').hide();
                 $('.district_div, .close_btn').hide();
                 document.body.style.overflow = 'auto';
               }
               else{
                $('.edit_district_error').text(result_split[1]).show();
               }
           }
       });
    });

    // end (added by kalai)

    $('.sports_update_act').click(function() {
        var form_data = $('#sports_update_form').serialize();
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
        if (window.location.href.indexOf("category.php") !== -1){
            var form_data = {'category_del':'1','del_id':del_id};
            $.ajax({
               type: "POST",
               url: "functions/category_function.php",
               data: form_data,
               cache: false,
               success: function(html) {
                   $('#category_table').find(".category_id:contains("+html+")").parents('tr').remove();
                   $('.popup_fade').hide();
                   $('.state_div,.delete_div').hide();
                   document.body.style.overflow = 'auto';
                }
           });
        } else if (window.location.href.indexOf("sports.php") !== -1){
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
       } else if (window.location.href.indexOf("state.php") !== -1){
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/edit_and_delete_function.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                 var result_split = html.split('#');
                 if (result_split[0].indexOf("success") !== -1){
                  $('.state_table').find(".t_states_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                 }
                 }
             });
       } else if (window.location.href.indexOf("district.php") !== -1){
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/district_function.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                 var result_split = html.split('#');
                 if (result_split[0].indexOf("success") !== -1){
                  $('.district_table').find(".t_district_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                 }
                 }
             });
       } else if (window.location.href.indexOf("athletes.php") !== -1){
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/athletes_functions.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                 var result_split = html.split('#');
                 if (result_split[0].indexOf("success") !== -1){
                  $('.athletes_table').find(".t_athlete_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                 }
                 }
             });
       }
    });

    $('.no_btn').click(function(event) {
        $('.popup_fade').hide();
        $('.state_div,.delete_div').hide();
        document.body.style.overflow = 'auto';
    });

    $('.category_submit_act').click(function() {
        var form_data = $('#category_form').serialize();
        //alert(form_data);
        $.ajax({
           type: "POST",
           url: "functions/category_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
              // alert(html);
               if(html=='error'){
                 alert('Already category available');
               }else{
                  //alert(html);
                 //$('#category_table tr:last').after(html);
                 location.reload();
               }
           }
       });
    });

    $('.category_update_act').click(function() {
        var form_data = $('#category_update_form').serialize();
       //alert(form_data);
        $.ajax({
           type: "POST",
           url: "functions/category_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
               //alert(html);
               if(html=='error'){
                 alert('Already sports name entred');
               }else{
                 var category_split = html.split('-');
                $('#category_table').find(".category_id:contains("+category_split[1]+")").next('.category_name').html(category_split[0]);
                //alert('Sports name updated successfully');
                $('.popup_fade').hide();
                $('.state_div,.delete_div').hide();
                document.body.style.overflow = 'auto';
               }

           }
       });
    });

    // $('.parameter_btn').click(function() {
    //     var $div = $('div[class^="parameter_name"]:last');
    //     alert($div.html());
    // });
    var current_id = 1;
    $('.parameter_btn').click(function(){
        nextElement($('.clone_content:last'));
    })

    function nextElement(element){
        var newElement = element.clone();
        var id = current_id+1;
        current_id = id;
        newElement.find('.parameter_name').removeAttr('name').attr('name', 'parameter_name'+id);
        newElement.find('#type').removeAttr('name').attr('name', 'type'+id);
        newElement.find('#unit').removeAttr('name').attr('name', 'unit'+id);
        newElement.find('#unit option').remove();
        newElement.find('#format').removeAttr('name').attr('name', 'format'+id);
        newElement.appendTo($(".parameter_holder"));
    }

    $(document.body).delegate('.parameter_type','change',function() {
        var param_name = $(this).val();
        var this_content = $(this).attr('name');
        if(param_name=='time'){
             $('select[name="'+this_content+'"]').parent().find('.parameter_format').attr('disabled', 'disabled');
        }
        else{
            $('select[name="'+this_content+'"]').parent().find('.parameter_format').removeAttr('disabled');
        }

        $.ajax({
           type: "POST",
           url: "common.php?param_name='true'",
           data: {'parameter_name':param_name},
           cache: false,
           success: function(html) {
               //alert($('select[name="'+this_content+'"]').parent().html());
               $('select[name="'+this_content+'"]').parent().find('.parameter_unit').html(html);
           }
       });
        //$(this).attr('value', $(this).val())
    });

    // $('.test_submit_act').click(function() {
    //     var test_form_data = $('#test_form').serialize();
    //     alert(test_form_data);
    // });
    //Jquery and Ajax Functionality for Athletes Form added by kalai
    $('.add_athletes_act').click(function(){
      var form_data = $('[name=athletes_form]').serialize();
      // for (i = 0; i < form_data.length; i++) {
      // if ($(form_data[i]).val().trim().length == 0) {
      //     alert("Please fill all input fields!");
      //     return false;
      // }
      // else{
        $.ajax({
           type: "POST",
           url: "functions/athletes_functions.php?adddata=true",
           data: form_data,
           cache: false,
           success: function(html) {
            alert(html);
              var result_split = html.split('#');
               if (result_split[0].indexOf("success") > 1){

                 alert(result_split[1]);
                 html ="<tr class='align_center delete_color'>\
                    <input type='hidden' name='athlete_id' value="+result_split[2]+">\
                    <td class='t_athlete_id'>"+result_split[2]+"</td>\
                    <td class='t_athlete_name'>"+result_split[3]+"</td>\
                    <td class='t_athlete_gender'>"+result_split[4]+"</td>\
                    <td class='t_athlete_dob'>"+result_split[5]+"</td>\
                    <td class='t_athlete_address'>"+result_split[6]+"</td>\
                    <td>\
                      <span class='edit_district'>Edit</span>\
                      <span class='delete_district' data-value="+result_split[2]+">Delete</span>\
                    </td></tr> ";
                 $('.athletes_table tr:last').after(html);
               }
               else{
                alert(result_split[1]);
               }
           }
       });
      // }
      // }
    });

    //Jquery and Ajax Functionality for CreateSchedule Form added by kalai
    $('.add_createschedule_act').click(function(){
      var form_data = $('[name=create_schedule_form]').serialize();
        $.ajax({
           type: "POST",
           url: "functions/create_schedule_function.php?adddata=true",
           data: form_data,
           cache: false,
           success: function(html) {
            alert(html);
           }
       });
    });

    $('.paramter_menu').click(function(){
      $(".parameter-list").toggle();
    });
});
