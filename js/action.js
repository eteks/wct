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
function athletes_center_align(){
      var height=$('.athletes_div').height();
      var width=$('.athletes_div').width();
      $('.athletes_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
}
function createschedule_center_align(){
      var height=$('.createschedule_div').height();
      var width=$('.createschedule_div').width();
      $('.createschedule_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
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
    if (wh < 150) {
        $('.footer').css({'top': smh + "px"});
        $('body').css({'height': wh + "px", 'max-height': "150px"});
    } else {
        $('.footer').css('top', '50%');
        $('body').css('height', "150px", 'max-height', "150px");
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
              $('[name=edit_district_state]').find("option:contains("+obj[i].states_name+")").attr("selected","selected");
              $('[name=edit_district_name]').val(obj[i].district_name);
            });
            $('.popup_fade').show();
            $('.district_div, .close_btn').show();
            document.body.style.overflow = 'hidden';
           }
        });
    }else if(window.location.href.indexOf("parameter_type.php") !== -1){
        $.ajax({
         type: "POST",
         url: "functions/parameter_typefunction.php?chooseedit=true",
         data: {data_id:data_id},
         cache: false,
         success: function(data) {
          var obj = JSON.parse(data);
          $.each(obj, function(i){
            $('[name=edit_parameter_id]').val(obj[i].parametertype_id);
            $('[name=edit_parameter_type]').val(obj[i].parametertype_name);
          });
          $('.popup_fade').show();
          $('.state_div, .close_btn').show();
          document.body.style.overflow = 'hidden';
         }
      });
    }
     else if(window.location.href.indexOf("athletes.php") !== -1){
          $.ajax({
           type: "POST",
           url: "functions/athletes_functions.php?chooseedit=true",
           data: {data_id:data_id},
           cache: false,
           success: function(data) {
            var obj = JSON.parse(data);
            $.each(obj, function(i){
              dob = obj[i].athlete_dob.split('-');
              $('[name=edit_athlete_id]').val(obj[i].athlete_id);
              $('[name=edit_athlete_name]').val(obj[i].athlete_name);
              $('[name=edit_athlete_dobday]').append("<option value='"+dob[2]+ "'selected>"+dob[2]+"</option>");
              $('[name=edit_athlete_dobmonth]').append("<option value='"+dob[1]+ "'selected>"+dob[1]+"</option>");
              $('[name=edit_athlete_dobyear]').append("<option value='"+dob[0]+ "'selected>"+dob[0]+"</option>");
              $('[name=edit_athlete_mobile]').val(obj[i].athlete_mobile);
              $('[name=edit_athlete_gender]').find("option:contains("+obj[i].athlete_gender+")").attr("selected","selected");
              $('[name=edit_athlete_state]').find("option:contains("+obj[i].athletestates_name+")").attr("selected","selected");
              $('[name=edit_athlete_district]').html("<option></option><option value='"+obj[i].athletedistrict_id+ "'selected>"+obj[i].athletedistrict_name+"</option>");
              $('[name=edit_athlete_address]').val(obj[i].athlete_address);
              $('[name=edit_athlete_taluka]').val(obj[i].athlete_taluka);
              $('[name=edit_athlete_sports]').find("option:contains("+obj[i].athletesports_name+")").attr("selected","selected");
            });
            $('.popup_fade').show();
            athletes_center_align();
            $('.athletes_div, .close_btn').show();
            document.body.style.overflow = 'hidden';
           }
        });
    } else if(window.location.href.indexOf("create_schedule.php") !== -1){
          $.ajax({
           type: "POST",
           url: "functions/create_schedule_function.php?chooseedit=true",
           data: {data_id:data_id},
           cache: false,
           success: function(data) {
            var obj = JSON.parse(data);
            $.each(obj, function(i){
              date = obj[i].createschedule_date.split('-');
              time = obj[i].createschedule_time.split(':');
              $('[name=edit_schedule_id]').val(obj[i].createschedule_id);
              $('[name=edit_schedule_name]').val(obj[i].createschedule_name);
              $('[name=edit_schedule_testbattery]').append("<option value='"+obj[i].createschedule_testbatteryid+ "'selected>"+obj[i].createschedule_testbatteryname+"</option>");
              $('[name=edit_schedule_day]').append("<option value='"+date[2]+ "'selected>"+date[2]+"</option>");
              $('[name=edit_schedule_month]').append("<option value='"+date[1]+ "'selected>"+date[1]+"</option>");
              $('[name=edit_schedule_year]').append("<option value='"+date[0]+ "'selected>"+date[0]+"</option>");
              $('[name=edit_schedule_hour]').find("option:contains("+time[0]+")").attr("selected","selected");
              $('[name=edit_schedule_minute]').find("option:contains("+time[1]+")").attr("selected","selected");
              $('[name=edit_schedule_seconds]').find("option:contains("+time[2]+")").attr("selected","selected");
              $('[name=edit_schedule_venue]').val(obj[i].createschedule_venue);
            });
            $('.popup_fade').show();
            createschedule_center_align();
            $('.createschedule_div, .close_btn').show();
            document.body.style.overflow = 'hidden';
           }
        });
    } else if(window.location.href.indexOf("test_battery.php") !== -1){
          $.ajax({
           type: "POST",
           url: "functions/test_battery_functions.php?chooseedit=true",
           data: {data_id:data_id},
           cache: false,
           success: function(data) {
            var obj = JSON.parse(data);
            $.each(obj, function(i){
                date = obj[i].createschedule_date.split('-');
                time = obj[i].createschedule_time.split(':');
                $('[name=edit_schedule_id]').val(obj[i].createschedule_id);
                $('[name=edit_schedule_name]').val(obj[i].createschedule_name);
                $('[name=edit_schedule_testbattery]').append("<option value='"+obj[i].createschedule_testbatteryid+ "'selected>"+obj[i].createschedule_testbatteryname+"</option>");
                $('[name=edit_schedule_day]').append("<option value='"+date[2]+ "'selected>"+date[2]+"</option>");
                $('[name=edit_schedule_month]').append("<option value='"+date[1]+ "'selected>"+date[1]+"</option>");
                $('[name=edit_schedule_year]').append("<option value='"+date[0]+ "'selected>"+date[0]+"</option>");
                $('[name=edit_schedule_hour]').append("<option value='"+time[0]+ "'selected>"+time[0]+"</option>");
                $('[name=edit_schedule_minute]').append("<option value='"+time[1]+ "'selected>"+time[1]+"</option>");
                $('[name=edit_schedule_seconds]').append("<option value='"+time[2]+ "'selected>"+time[2]+"</option>");
                $('[name=edit_schedule_venue]').val(obj[i].createschedule_venue);
            });
            $('.popup_fade').show();
            $('.createschedule_div, .close_btn').show();
            document.body.style.overflow = 'hidden';
           }
        });
    } else if(window.location.href.indexOf("range.php") !== -1){
          $.ajax({
           type: "POST",
           url: "functions/range_function.php?chooseedit=true",
           data: {data_id:data_id},
           cache: false,
           success: function(data) {
            data =  data.split('#####');
            var range_obj = JSON.parse(data[0]);
            var rangeattr_obj = JSON.parse(data[1]);
            $.each(range_obj, function(i){
              $('[name=edit_range_id').val(range_obj[i].range_id);
              $('[name=edit_range_testbattery]').find("option:contains("+range_obj[i].rangetestbattery_name+")").attr("selected","selected");
              $('[name=edit_range_category]').find("option:contains("+range_obj[i].rangecategory_name+")").attr("selected","selected");
              $('[name=edit_range_test]').find("option:contains("+range_obj[i].rangetest_name+")").attr("selected","selected");
            });
            //Append data to first range part without using for loop
            data = rangeattr_obj[0];
            element = $('.edit_clone_content:first');
            element.find('[name=edit_rangeattr_id1]').val(data.rangeattribute_id);
            element.find('[name=edit_range_id1]').val(data.range_id);
            element.find('[name=edit_range_start1]').val(data.range_start);
            element.find('[name=edit_range_end1]').val(data.range_end);
            element.find('[name=edit_range_points1]').val(data.range_point);

            // Remove all clone element except first one (this is used when user again and again click edit button)
            $('.edit_clone_content:not(:first-child)').remove();

            //Append data to other range part with using for loop
            if(rangeattr_obj.length>=2){
              id = 2;
              $.each(rangeattr_obj, function(i) {
                  if (i === 0) return;
                  else{
                    newelement = $('.edit_clone_content:last');
                    var rangeattr_element = element.clone();
                    rangeattr_element.attr('id','edit_range_counter'+id);
                    rangeattr_element.find('.edit_rattr_id').attr("name","edit_rangeattr_id"+id).val(rangeattr_obj[i].rangeattribute_id);
                    rangeattr_element.find('.edit_r_id').attr("name","edit_range_id"+id).val(rangeattr_obj[i].range_id);
                    rangeattr_element.find('.edit_r_strt').attr("id","strt"+id).attr("name","edit_range_start"+id).val(rangeattr_obj[i].range_start);
                    rangeattr_element.find('.edit_r_end').attr("id","end"+id).attr("name","edit_range_end"+id).val(rangeattr_obj[i].range_end);
                    rangeattr_element.find('.edit_r_point').attr("id","point"+id).attr("name","edit_range_points"+id).val(rangeattr_obj[i].range_point);
                    rangeattr_element.appendTo($(".edit_range_holder"));
                    id=id+1;
                  }
              });
            }
            $('.popup_fade').show();
            $('.range_div, .close_btn').show();
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

  $("#mobile,#result_athletemobile,#bib,#result_athletebib").keypress(function (e) {       
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      // alert('errr'+$('#result_athletemobile').val());
               return false;
    }
   });
   //Edit popup
  	$(document.body).delegate('.edit_state','click',function() {
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
    $('.edit_test_sport,.edit_param_type').change(function() {
        $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');
    });
    $('.edit_test').click(function(){
        var test_id = $(this).attr("data-value");
        //alert(test_id);
        $.ajax({
             type: "POST",
             url: "functions/test_functions.php?gettestdata=true",
             data:{'id':test_id},
             cache: false,
             dataType:'json',
             success: function(data) {
                 $('.test_name_update').val(data.test_name);
                 $('.test_parameter_name_update').val(data.test_parameter_name);
                 $('.parameter_type_update option[value="'+data.test_parameter_type+'"]').attr('selected','selected');
                 $('.parameter_unit_update').append('<option value="'+data.test_parameter_unit+'">'+data.test_parameter_unit+'</option>');
                 $('.parameter_format_update option[value="'+data.test_parameter_format+'"]').attr('selected','selected');
                 $('.parameter_update').val(test_id);
                 $('.test_update_id').val(data.test_id);
            }
         });
    });
    $('.edit_test_battery').click(function(){
        var test_battery_id = $(this).attr("data-value");
        // alert(test_battery_id);
        $("input[name='testbattery_update']").val(test_battery_id);
        $.ajax({
             type: "POST",
             url: "functions/test_battery_functions.php?gettestbatdata=true",
             data:{'id':test_battery_id},
             cache: false,
             success: function(data) {
                 var obj = JSON.parse(data);
                 $('.test_battery_name_update').val(obj.testbattery_name);
                 $('.test_battery_id_update').val(obj.testbattery_id);
                 $('.edit_test_sport option[value="'+obj.sports_id+'"]').attr('selected','selected');
                 //$('.edit_test_sport').append($("<option value='"+obj.sports_id+"' selected='selected'>"+obj.sports_name+"</option>"));


            }
         });
         $.ajax({
              type: "POST",
              url: "functions/test_battery_functions.php?getcatedata=true",
              data:{'id':test_battery_id},
              cache: false,
              success: function(data) {
                  var obj = JSON.parse(data);
                  $.each(obj, function(i){
                      $('input.cate_get:checkbox[value="'+obj[i].testbattery_category_id +'"]').attr('checked', 'checked');
                  });

             }
          });
          $.ajax({
               type: "POST",
               url: "functions/test_battery_functions.php?gettestdata=true",
               data:{'id':test_battery_id},
               cache: false,
               success: function(data) {
                   var obj = JSON.parse(data);
                   $.each(obj, function(i){
                       $('input.test_get:checkbox[value="'+obj[i].testbattery_test_id +'"]').attr('checked', 'checked');
                   });
              }
           });
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
        athletes_center_align();
        $('.popup_fade').show();
        $('.athletes_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });
    $('.edit_state').click(function(){
        createschedule_center_align();
        $('.popup_fade').show();
        $('.createschedule_div, .close_btn').show();
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
        $('.state_div,.delete_div,.login_div,.register_div,.test_div,.district_div,.test_battery_div,.range_div,.paramter_div,.athletes_div,.createschedule_div').hide();
        document.body.style.overflow = 'auto';
    });

	// $('.collapse').on('shown.bs.collapse', function (e) {
	//     $('.collapse').not(this).removeClass('in');
	// });

	// $('[data-toggle=collapse]').click(function (e) {
	//    $('[data-toggle=collapse]').siblings('li').removeClass('active');
	//    $(this).siblings('li').toggleClass('active');
	// });

  $(".submenu_list li").hide();
    $('.master-holder').hover(function(){
      $(".master-list li").show();
      $(".transaction-list li").hide();
    });
    $('.transaction-holder').hover(function(){
      $(".transaction-list li").show();
      $(".master-list li").hide();
    });
    $('.report-holder').hover(function(){
      $(".master-list li").hide();
      $(".transaction-list li").hide();
    });
    $('.master-list').mouseleave(function(){
     $(".master-list li").fadeOut(1000);
    });
    $('.transaction-list').mouseleave(function(){
     $(".transaction-list li").fadeOut(1000);
    });

    $('master-list li a').click(function(){
      $(this).addClass('clr');
    });

	// Autocomplete results for states list while add
	var states_list = [];
	$('.states_list li').each(function(){
		states_list.push($(this).text());
  });
	$('.statesname,.edit_states_name').focus(function (e) {
		$(this).autocomplete({
			source: states_list,
	 	});
	});

  // Autocomplete results for states list while edit
  var edit_states_list = [];
  $('.edit_states_list li').each(function(){
    edit_states_list.push($(this).text());
  });
  $('.edit_states_name').focus(function (e) {
    $(this).autocomplete({
      source: edit_states_list,
    });
  });

  // Autocomplete results for district list
  var district_list = [];
  $('.choose_state').on('change',function () {
      selected_state = $('.choose_state option:selected').text();
      form_data = {'states_name':selected_state};
      district_list.length = 0;
       $.ajax({
             type: "POST",
             url: "functions/district_function.php?loaddistrict=true",
             data: form_data,
             cache: false,
             success: function(data) {
              var obj = JSON.parse(data);
                $.each(obj, function(i){
                  district_list.push(obj[i]);
                });
             }
         });
   });

  $(".athlete_state_act").on('change',function () {
    selected_state = $('.athlete_state_act option:selected').text();
    selected_state_id = $('.athlete_state_act option:selected').val();
    form_data = {'states_name':selected_state,'states_id':selected_state_id};
     $.ajax({
           type: "POST",
           url: "functions/district_function.php?loaddistrictfromdb=true",
           data: form_data,
           cache: false,
           success: function(data) {
            var obj = JSON.parse(data);
            var options = '<option></option>';
              $.each(obj, function(i){
                options += '<option value="'+obj[i].district_id+'">'+obj[i].district_name+'</option>';
              });
              $('.athlete_district_act').html(options);              
           }
       });
   });


  $('.districts').focus(function () {
      $(this).autocomplete({
      source: district_list,
      });
  });

    $('#sports_form').submit(function(e) {
      e.preventDefault();
      var res = true;
      $('input[type="text"]',this).each(function() {
        if($(this).val().trim() == "") {
        res = false;
        }
      });
     if(res){
          var form_data = $('#sports_form').serialize();
           // $('form[name="sport_form"]').submit();
           // alert(form_data);
          $.ajax({
           type: "POST",
           url: "functions/sports_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
               //alert(html);
               if(html=='error'){
                 alert('Sports already exist');
               }else{
                  location.reload();
                 //$('#sports_table tr:last').after(html);
                 }

             }
         });
        }

    });

    // start (added by kalai)
    // Jquery and ajax functionality for states

   $('#state_form').submit(function(e){
      e.preventDefault();
      var res = true;
      $('input[type="text"]',this).each(function() {
        if($(this).val().trim() == "") {
        res = false;
        }
      });
      if(res){
          var form_data = $('[name=states_form]').serialize();
          // $('form[name="states_form"]').submit();
          $.ajax({
           type: "POST",
           url: "functions/states_function.php?adddata=true",
           data: form_data,
           cache: false,
           success: function(html) {
              var result_split = html.split('#');
               if (result_split[0].indexOf("success") !== -1){
                 // $('.add_states_error').text(result_split[1]).show();
                 $('.add_states_error').hide();
                 alert(result_split[1]);
                 html ="<tr class='align_center delete_color'>\
                 <input type='hidden' name='states_id' value="+result_split[2]+">\
                 <td class='t_states_id'>"+result_split[2]+"</td>\
                    <td class='t_states_name'>"+result_split[3]+"</td>\
                    <td>\
                      <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                      <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                    </td></tr> ";
                 $('.state_table tr:last').after(html);
                 document.states_form.reset();
               }
               else{
                $('.add_states_error').text(result_split[1]).show();
                   }
               }
           })
        }
    });
    $('#parameter_type_form').submit(function(e){
       e.preventDefault();
       var res = true;
       $('input[type="text"]',this).each(function() {
         if($(this).val().trim() == "") {
         res = false;
         }
       });
       if(res){
           var form_data = $('[name=parameter_type_form]').serialize();
           // $('form[name="states_form"]').submit();
           $.ajax({
            type: "POST",
            url: "functions/parameter_typefunction.php?adddata=true",
            data: form_data,
            cache: false,
            success: function(html) {
               var result_split = html.split('#');
                if (result_split[0].indexOf("success") !== -1){
                  // $('.add_states_error').text(result_split[1]).show();
                  $('.add_states_error').hide();
                  //alert(result_split[1]);
                  html ="<tr class='align_center delete_color'>\
                  <input type='hidden' name='parameter_id' value="+result_split[2]+">\
                  <td class='t_pararmeter_id'>"+result_split[2]+"</td>\
                     <td class='t_pararmeter_name'>"+result_split[3]+"</td>\
                     <td>\
                       <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                       <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                     </td></tr> ";
                  $('.parameter_type_table tr:last').after(html);
                  document.parameter_type_form.reset();
                }
                location.reload();
                }
            })
         }
     });

    $('#edit_state_form').submit(function(e){
        e.preventDefault();
      var res = true;
      $('input[type="text"]',this).each(function() {
        if($(this).val().trim() == "") {
        res = false;
        }
      });
      if(res){
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
                 alert(result_split[1]);                 
               }
               else{
                $('.edit_states_error').text(result_split[1]).show();
               }
           }
       });
      }
    });

    $(document).on('click','.delete_state',function(){
        $('#delete_id').val($(this).attr("data-value"));
        $('.popup_fade').show();
        $('.delete_div, .close_btn').show();
        document.body.style.overflow = 'hidden';
    });

    // Jquery and ajax functionality for district
    $('#districts_form').submit(function(e){
        e.preventDefault();
        var res = true;
        $('input[type="text"]',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
          }
        });
        if(res){
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
                       $('.add_district_error').hide();
                       alert(result_split[1]);
                       html ="<tr class='align_center delete_color'>\
                       <input type='hidden' name='district_id' value="+result_split[2]+">\
                       <td class='t_district_id'>"+result_split[2]+"</td>\
                          <td class='t_district_name'>"+result_split[4]+"</td>\
                          <td>\
                            <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                            <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                          </td></tr> ";
                       $('.district_table tr:last').after(html);
                        document.district_form.reset();
                     }
                     else{
                      $('.add_district_error').text(result_split[1]).show();
                     }
                   }
          });
        }
    });

    $('#edit_district_form').submit(function(e){
        e.preventDefault();
      var res = true;
      $('input[type="text"], select',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
        }
      });
      if(res){
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
      }
    });

    // end (added by kalai)

    $('#sports_update_form').submit(function(e) {
      e.preventDefault();
      var res = true;
      $('input[type="text"]',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
        }
      });
      if(res){
        var form_data = $('#sports_update_form').serialize();
        $.ajax({
           type: "POST",
           url: "functions/sports_function.php",
           data: form_data,
           cache: false,
           success: function(html) {
               //alert(html);
               if(html=='error'){
                 alert('Already sports name exists');
               }else{
                //alert(html);
                var sports_split = html.split('-');
                //alert(sports_split);
                $('#sports_table').find(".sports_id:contains("+sports_split[1]+")").next('.sports_name').html(sports_split[0]);
                alert('Sports name updated successfully');
                $('.popup_fade').hide();
                $('.state_div,.delete_div').hide();
                document.body.style.overflow = 'auto';
               }

           }
       });
      }
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
                   alert('Category successfully deleted');
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
                   alert('Sports successfully deleted');
                   $('#sports_table').find(".sports_id:contains("+html+")").parents('tr').remove();
                   $('.popup_fade').hide();
                   $('.state_div,.delete_div').hide();
                   document.body.style.overflow = 'auto';
                   location.reload();
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
                  alert(result_split[1]);
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
                  alert(result_split[1]);
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
                  alert(result_split[1]);
                  $('.athletes_table').find(".t_athlete_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                 }
                 }
             });
       } else if (window.location.href.indexOf("create_schedule.php") !== -1){
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/create_schedule_function.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                 var result_split = html.split('#');
                 if (result_split[0].indexOf("success") !== -1){
                  $('.createschedule_table').find(".t_createschedule_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.createschedule_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                 }
                 }
             });
       } else if (window.location.href.indexOf("test.php") !== -1){
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/test_functions.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();

                 }
             });
       } else if (window.location.href.indexOf("test_battery.php") !== -1){
           //alert('dsfsdfds');
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/test_battery_functions.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                     //alert(html);
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();

                 }
             });
       } else if (window.location.href.indexOf("range.php") !== -1){
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/range_function.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                  var result_split = html.split('#');
                  if (result_split[0].indexOf("success") !== -1){
                    alert(result_split[1]);
                    $('.range_table').find(".t_range_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                    $('.popup_fade').hide();
                    $('.delete_div').hide();
                    document.body.style.overflow = 'auto';
                  }
                 }
             });
       }
       else if (window.location.href.indexOf("assign_schedule.php") !== -1){
           //alert('dsfsdfds');
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/assign_schedule_function.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                  //alert(html);
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();

                 }
             });
       }
       else if (window.location.href.indexOf("parameter_type.php") !== -1){
           //alert('dsfsdfds');
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/parameter_typefunction.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                     //alert(html);
                  alert('Parameter deleted Successfully! ');
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();

                 }
             });
       }
       else if (window.location.href.indexOf("parameter_unit.php") !== -1){
           //alert('dsfsdfds');
            var form_data = {'delete_id':del_id};
            $.ajax({
                 type: "POST",
                 url: "functions/parameter_unitfunction.php?deletedata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                     //alert(html);
                  alert('Parameter unit deleted Successfully! ');
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();

                 }
             });
       }
    });

    $('.no_btn').click(function(event) {
        $('.popup_fade').hide();
        $('.state_div,.delete_div').hide();
        document.body.style.overflow = 'auto';
    });

    $('#category_form').submit(function(e) {
      e.preventDefault();
      var res = true;
      $('input[type="text"]',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
        }
      });
      if(res){
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
                 alert('Category already exist');
               }else{
                  //alert(html);
                 //$('#category_table tr:last').after(html);
                 location.reload();
               }
           }
       });
      }
    });

    $('#category_update_form').submit(function(e) {
      e.preventDefault();
      var res = true;
      $('input[type="text"]',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
        }
      });
      if(res){
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
                 alert('This category is already used');
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
      }
    });

    // $('.parameter_btn').click(function() {
    //     var $div = $('div[class^="parameter_name"]:last');
    //     alert($div.html());
    // });
    var current_id = 1;
    $('.parameter_btn').click(function(){
        //alert('test')
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
        newElement.appendTo($(".parameter_holder1"));
    }

    var test_id = 1;
    $('.add_athelete').click(function(){
        nextElement1($('.assign_clone_content:last'));
    })

    function nextElement1(element){
        var newElement = element.clone();
        var id = test_id+1;
        test_id = id;
        newElement.find('.athlete_name').removeAttr('name').attr('name', 'athlete_name'+id);
        newElement.find('.athlete_bib').removeAttr('name').attr('name', 'athlete_bib'+id);
        newElement.find('.dob').val('');
        newElement.find('.mobile').val('');
        newElement.find('#combobox').combobox({
            select: function (event, ui) {
                var ath_id = $(this).val();
                $.ajax({
                   type: "POST",
                   url: "functions/athletes_functions.php?get_ath=true",
                   data: {'ath_id':ath_id},
                   cache: false,
                   dataType:'json',
                   success: function(html) {

                        newElement.find('.dob').val(html.athlete_dob).attr('disabled', 'disabled');
                        //alert(newElement.html());
                        newElement.find('.mobile').val(html.athlete_mobile).attr('disabled', 'disabled');
                        newElement.find('.athlete_bib').val('');

                   }
               });
            }
        });
        newElement.find('.custom-combobox:nth-child(3)').remove();
        newElement.appendTo($(".assign_content_holder"));

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
    $('#athlete_form').submit(function(e){
     e.preventDefault();
      var res = true;
      $('input[type="text"]',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;

        }
      });
      if(res){
          var form_data = $('[name=athletes_form]').serialize();
          $.ajax({
             type: "POST",
             url: "functions/athletes_functions.php?adddata=true",
             data: form_data,
             cache: false,
             success: function(html) {
                var result_split = html.split('#');
                 if (result_split[0].indexOf("success") !== -1){
                   alert(result_split[1]);
                   html ="<tr class='align_center delete_color'>\
                      <input type='hidden' name='athlete_id' value="+result_split[2]+">\
                      <td class='t_athlete_id'>"+result_split[2]+"</td>\
                      <td class='t_athlete_name'>"+result_split[3]+"</td>\
                      <td class='t_athlete_gender'>"+result_split[4]+"</td>\
                      <td class='t_athlete_dob'>"+result_split[5]+"</td>\
                      <td class='t_athlete_address'>"+result_split[6]+"</td>\
                      <td>\
                        <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                        <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                      </td></tr> ";
                   $('.athletes_table tr:last').after(html);
                   document.athletes_form.reset();
                 }
                 else{
                  alert(result_split[1]);
                 }
             }
         });
     }
    });

    $('#edit_athletes_form').submit(function(e){
      e.preventDefault();
      var res = true;
      $('input[type="text"],select',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
        }
      });
      if(res){
          var form_data = $('[name=edit_athletes_form]').serialize();
            $.ajax({
               type: "POST",
               url: "functions/athletes_functions.php?editdata=true",
               data: form_data,
               cache: false,
               success: function(html) {
                   var result_split = html.split('#');
                   if (result_split[0].indexOf("success") !== -1){
                     alert(result_split[1]);
                     $('.athletes_table').find(".t_athlete_id:contains("+result_split[2]+")").siblings('.t_athlete_name').html(result_split[3])
                     .siblings('.t_athlete_gender').html(result_split[4]).siblings('.t_athlete_dob').html(result_split[5]).siblings('.t_athlete_address').html(result_split[6]);
                     $('.popup_fade').hide();
                     $('.athletes_div, .close_btn').hide();
                     document.body.style.overflow = 'auto';
                   }
                   else{
                    alert(result_split[1]);
                   }
               }
           });
      }
    });

    //Jquery and Ajax Functionality for CreateSchedule Form added by kalai
    $('#createschedule_form').submit(function(e){
      e.preventDefault();
      var res = true;
      $('input[type="text"],select',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
          alert('false  comes');
        }
      });
      if(res){
         var form_data = $('[name=create_schedule_form]').serialize();
         // alert('comes'+form_data);
          $.ajax({
             type: "POST",
             url: "functions/create_schedule_function.php?adddata=true",
             data: form_data,
             cache: false,
             success: function(html) {
                var result_split = html.split('#');
                 if (result_split[0].indexOf("success") !==-1){
                  alert(result_split[1]);
                   html ="<tr class='align_center delete_color'>\
                      <input type='hidden' name='createschedule_id' value="+result_split[2]+">\
                      <td class='t_createschedule_id'>"+result_split[2]+"</td>\
                      <td class='t_createschedule_name'>"+result_split[3]+"</td>\
                      <td class='t_testbattery_name'>"+result_split[4]+"</td>\
                      <td class='t_createschedule_date'>"+result_split[5]+"</td>\
                      <td class='t_createschedule_time'>"+result_split[6]+"</td>\
                      <td class='t_createschedule_venue'>"+result_split[7]+"</td>\
                      <td>\
                        <span class='edit_district' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                        <span class='delete_district' data-value="+result_split[2]+">Delete</span>\
                      </td></tr> ";
                   $('.createschedule_table tr:last').after(html);
                    document.create_schedule_form.reset();
                 }
                 else{
                  alert(result_split[1]);
                 }
             }
         });
      }
    });

    $('#edit_create_schedule_form').submit(function(e){
        e.preventDefault();
        var res = true;
        $('input[type="text"],textarea,select',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
          }
        });
        if(res){
            var form_data = $('[name=edit_createschedule_form]').serialize();
                $.ajax({
                   type: "POST",
                   url: "functions/create_schedule_function.php?editdata=true",
                   data: form_data,
                   cache: false,
                   success: function(html) {
                       var result_split = html.split('#');
                       if (result_split[0].indexOf("success") !== -1){
                        alert(result_split[1]);
                         $('.createschedule_table').find(".t_createschedule_id:contains("+result_split[2]+")").siblings('.t_createschedule_name').html(result_split[3])
                         .siblings('.t_testbattery_name').html(result_split[4]).siblings('.t_createschedule_date').html(result_split[5]).siblings('.t_createschedule_time')
                         .html(result_split[6]).siblings('.t_createschedule_venue').html(result_split[7]);
                         $('.popup_fade').hide();
                         $('.createschedule_div, .close_btn').hide();
                         document.body.style.overflow = 'auto';
                       }
                       else{
                        alert(result_split[1]);
                       }
                   }
               });
        }
        });

//test

    $('#test_form').submit(function(e){
        e.preventDefault();
        var res = true;
        $('input[type="text"]',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
            // alert('test_form false');
          }
        });
        if(res){
            // alert('test_form true');
        }

        });

    $('#test_updation_form').submit(function(e){
        //alert('dsfdsfds');
        e.preventDefault();
        var res = true;
        $('input[type="text"]',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
            // alert('test_updation_form false');
          }
        });
        });
//test battery
 $('#test_battery_form').submit(function(e){
        e.preventDefault();
        var res = true;
        $('input[type="text"],textarea,select',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
            // alert('test_updation_form false');
          }
        });
        if(res){
            // var form_data = $('[name=edit_createschedule_form]').serialize();
            // alert('test_updation_form true');
        }

        });

     $('#test_battery_update_form').submit(function(e){
        e.preventDefault();
        var res = true;
        $('input[type="text"],textarea,select',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
            // alert('test_updation_form false');
          }
        });
        if(res){
            // var form_data = $('[name=edit_createschedule_form]').serialize();
            // alert('test_updation_form true');
        }

      });

//range
//Jquery and Ajax Functionality for Range Form added by kalai
     $('#range_form_id').submit(function(e){
        e.preventDefault();
        var res = true;
        $('input[type="text"],textarea,select',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
          }
        });
        if(res){
          var form_data = $('[name=range_form]').serialize();
           $.ajax({
             type: "POST",
             url: "functions/range_function.php?adddata=true",
             data: form_data,
             cache: false,
             success: function(html) {
                var result_split = html.split('#');
                 if (result_split[0].indexOf("success") !==-1){
                   alert(result_split[1]);
                   html ="<tr class='align_center delete_color'>\
                      <input type='hidden' name='range_id' value="+result_split[2]+">\
                      <td class='t_range_id'>"+result_split[2]+"</td>\
                      <td class='t_range_testname'>"+result_split[3]+"</td>\
                      <td>\
                        <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                        <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                      </td></tr> ";
                   $('.range_table tr:last').after(html);
                   document.range_form.reset();
                 }
                 else{
                  alert(result_split[1]);
                 }
             }
          });
        }
      });

    $('#edit_range_form_id ').submit(function(e){
        e.preventDefault();
        var res = true;
        $('input[type="text"],textarea,select',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
            // alert('test_updation_form false');
          }
        });
        if(res){
            var form_data = $('[name=edit_range_form]').serialize();
            $.ajax({
                   type: "POST",
                   url: "functions/range_function.php?editdata=true",
                   data: form_data,
                   cache: false,
                   success: function(html) {
                       var result_split = html.split('#');
                       if (result_split[0].indexOf("success") !== -1){
                        alert(result_split[1]);
                         $('.range_table').find(".t_range_id:contains("+result_split[2]+")").siblings('.t_range_testname').html(result_split[3]);
                         $('.popup_fade').hide();
                         $('.range_div, .close_btn').hide();
                         document.body.style.overflow = 'auto';
                       }
                       else{
                        alert(result_split[1]);
                       }
                   }
               });
        }

      });

//parameter type

    $('#parameter_type ').submit(function(e){
          e.preventDefault();
          var res = true;
          $('input[type="text"],textarea,select',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
              // alert('parameter_type false');
            }
          });
          if(res){
              // var form_data = $('[name=edit_createschedule_form]').serialize();
              // alert('parameter_type true');
          }

        });

    $('#edit_parameter_type ').submit(function(e){
          e.preventDefault();
          var res = true;
          $('input[type="text"],textarea,select',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
              alert('parameter_type false');
            }
          });
          if(res){
              var form_data = $('[name=parameter_edit]').serialize();
              //alert(form_data);
              $.ajax({
                    type: "POST",
                    url: "functions/parameter_typefunction.php?editdata=true",
                    data: form_data,
                    cache: false,
                    success: function(html) {
                        if(html == 'success'){
                            alert('Parameter update successfully!');
                            location.reload();
                        }
                    }
                 });
          }

        });

//parameter unit
    $('#parameter_unit').submit(function(e){
              e.preventDefault();
              var res = true;
              $('input[type="text"],textarea,select',this).each(function() {
                if($(this).val().trim() == "") {
                  res = false;
                  alert('parameter_unit false');
                }
              });
              if(res){
                  var form_data = $('[name=parameter_unit_add]').serialize();
                  alert(form_data);
                  $.ajax({
                        type: "POST",
                        url: "functions/parameter_unitfunction.php?adddata=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
                            if(html == 'success'){
                                alert('Parameterunit add successfully!');
                                location.reload();
                            }
                        }
                     });
              }

            });

    $('#edit_parameter_unit').submit(function(e){
          e.preventDefault();
          var res = true;
          $('input[type="text"],textarea,select',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
              alert('edit_parameter_unitfalse');
            }
          });
          if(res){
              var form_data = $('[name=edit_parameter_unit_form]').serialize();
              //alert(form_data);
              $.ajax({
                   type: "POST",
                   url: "functions/parameter_unitfunction.php?updateunitdata=true",
                   data:form_data,
                   cache: false,
                   success: function(data) {
                      if(data=='success'){
                          alert('Parameter updated successfully');
                          location.reload();
                      }
                  }
               });
          }

        });

//ASSIGN SCHEDULE

  $('#assignschedule_form').submit(function(e){
    e.preventDefault();
    var res = true;
    $('input[type="text"],textarea,select',this).each(function() {
      if($(this).val().trim() == "") {
        res = false;
      }
    });
    if(res){
        var form_data = $('#assignschedule_form').serialize();
       // alert(form_data);
        $.ajax({
           type: "POST",
           url: "functions/assign_schedule_function.php?add_assign_schdule=true",
           data: form_data,
           cache: false,
           success: function(html) {
               if(html=='success'){
                   alert('Schedule successfully assigned');
                   location.reload();
               }
           }
       });
    }
  });

  // $('#edit_assign_schedule_form').submit(function(e){
  //   e.preventDefault();
  //   var res = true;
  //   $('input[type="text"],textarea,select',this).each(function() {
  //     if($(this).val().trim() == "") {
  //       res = false;
  //       alert('assign_schedule_form alse');
  //     }
  //   });
  //   if(res){
  //       // var form_data = $('[name=edit_createschedule_form]').serialize();
  //       alert('assign_schedule_form true');
  //   }
  //
  // });
//result
 $('#result_form').submit(function(e){
      e.preventDefault();
      var res = true;
      $('input[type="text"],textarea,select',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
        }
      });
      if(res){
          var form_data = $('[name=result_form]').serialize();
          $('.result_createscheduleid').val($('.resultcreateschedule_act option:selected').val());
          $.ajax({
               type: "POST",
               url: "functions/result_function.php?loadtestparam=true",
               data: form_data,
               cache: false,
               success: function(html) {
                $('.result_table tbody tr:not(:last)').remove();
                var obj = JSON.parse(html);
                  $.each(obj, function(i){
                    html = "<tr class='align_center delete_color assign_table'>\
                                <input type='hidden' name='result_athleteid' class='result_athleteid' value="+obj[i].athlete_id+">\
                                <input type='hidden' name='result_parametertype' class='result_parametertype' value="+obj[i].parameter_type+">\
                                <input type='hidden' name='result_parameterunit' class='result_parameterunit' value="+obj[i].parameter_unit+">\
                                <input type='hidden' name='result_parameterformat' class='result_parameterformat' value="+obj[i].parameter_format+">\
                                <td class='result_test_name'>"+obj[i].test_name+"</td>\
                                <td class='result_parameter_name'>"+obj[i].parameter_name+"</td>\
                                <td><input type='text' class='assign_border enter_result'></td>\
                                <td><span class='assign_border enter_points'></span></td></tr>";
                    $('.result_table tr:last').before(html);
                    document.result_form.reset();
                  });
              }
          });
      }

    });

 //report
 $('#report_form').submit(function(e){
      e.preventDefault();
      var res = true;
      // $('input[type="checkbox"]',this).each(function() {
        if($(this).val().trim() == "") {
          res = false;
          alert('report_form alse');
        }
      // });
      if(res){
          // var form_data = $('[name=edit_createschedule_form]').serialize();
          alert('report_form true'+res);
      }

    });


    $('.paramter_menu').hover(function(){
      $(".parameter-list").show();
    });
     $('.parameter-list').mouseleave(function(){
      $(".parameter-list").fadeOut(1000);
    });

    // Jquery functions for Range Form added by kalai
    var current_id = 1;
    $('.add_range_points').click(function(){
        var id = current_id+1;
        nextrangeElement($('.clone_content:last'));
        $('.clone_content:last').attr('id','range_counter'+id)
    })
    function nextrangeElement(element){
        var newElement = element.clone();
        var id = current_id+1;
        current_id = id;
        newElement.find('.range_label').remove();
        newElement.find('.r_strt').removeAttr('name').attr('name', 'range_start'+id).val('');
        newElement.find('.r_end').removeAttr('name').attr('name', 'range_end'+id).val('');
        newElement.find('.r_point').removeAttr('name').attr('name', 'range_points'+id).val('');
        newElement.find('.r_strt').removeAttr('id').attr('id','strt'+id);
        newElement.find('.r_end').removeAttr('id').attr('id','end'+id);
        newElement.find('.r_point').removeAttr('id').attr('id','point'+id);
        newElement.appendTo($(".range_holder"));
    }

    //Calculate Range points by range start and end
    // $(document).on('focus','.r_point',function(){
    //     range_start = $(this).siblings('.r_strt').val();
    //     range_end = $(this).siblings('.r_end').val();
    //     if (range_start >=0 && range_end <=5.9999){
    //       $(this).val('1').prop("readonly", true);
    //     } else if (range_start >=6 && range_end <=10.9999){
    //       $(this).val('2').prop("readonly", true);
    //     } else if (range_start >=11 && range_end <=15.9999){
    //       $(this).val('3').prop("readonly", true);
    //     }
    //     else if (range_start >=16 && range_end >=16){
    //       $(this).val('4').prop("readonly", true);
    //     }
    //     else{
    //       $(this).val('0').prop("readonly", true);
    //     }
    // });

    

    $('.edit_assign_schedule').click(function() {
        var assign_schedule_id = $(this).attr('data-value');
        //alert(assign_schedule_id);
        $.ajax({
           type: "POST",
           url: "functions/assign_schedule_function.php?edit_get_data=true",
           data: {'shdl_id':assign_schedule_id},
           cache: false,
           dataType:'json',
           success: function(data) {
               $('.schedule_update').val(data[0].createschedule_name);
               $('.category_update option[value="'+data[0].assigncategory_id+'"]').attr('selected','selected');
               $('.clone_schedule_update:first .athlete_name1 option[value="'+data[0].assignathlete_id+'"]').attr('selected','selected');
               $('.clone_schedule_update:first .dob_update').val(data[0].athlete_dob);
               $('.clone_schedule_update:first .mobile_update').val(data[0].athlete_mobile);
               $('.clone_schedule_update:first .athlete_bib').val(data[0].assignbib_number);
               $('.clone_schedule_update:first .assing_schedule_update_id').val(data[0].assignschedule_id);
               var cnt = 0;
               $.each(data, function(i){
                   if(cnt!=i){
                       //alert(data[i].athlete_name);
                       var newElement = $('.clone_schedule_update:first').clone();
                       var id = i+1;
                       test_id = id;
                       newElement.find('.athlete_name option[value="'+data[i].assignathlete_id+'"]').attr('selected','selected');
                       newElement.find('.athlete_name').removeAttr('name').attr('name', 'athlete_name'+id);
                       newElement.find('.assing_schedule_update_id').removeAttr('name').attr('name', 'assing_schedule_update_id'+id).val(data[i].assignschedule_id);
                       newElement.find('.athlete_bib').removeAttr('name').attr('name', 'athlete_bib'+id).val(data[i].assignbib_number);
                       newElement.find('.dob_update').val(data[i].athlete_dob);
                       newElement.find('.mobile_update').val(data[i].athlete_mobile);
                       newElement.find('#combobox1').combobox({
                           select: function (event, ui) {
                               var ath_id = $(this).val();
                               $.ajax({
                                  type: "POST",
                                  url: "functions/athletes_functions.php?get_ath=true",
                                  data: {'ath_id':ath_id},
                                  cache: false,
                                  dataType:'json',
                                  success: function(html) {
                                       newElement.find('.dob').val(html.athlete_dob);
                                       //alert(newElement.html());
                                       newElement.find('.mobile').val(html.athlete_mobile);
                                       newElement.find('.athlete_bib').val('');
                                  }
                              });
                           }
                       });
                       newElement.find('.custom-combobox:nth-child(3)').remove();
                       newElement.appendTo($(".clone_schedule_update_content"));
                   }
                   //cnt++;
               });

           }
       });
    });

    //Jquery and Ajax functionality for Result form
    var athletes_list = [];  
    var athlete_json = [];
    $('.resultcreateschedule_act').on('change',function () {
        selected_createschedule = $('.resultcreateschedule_act option:selected').val();
        form_data = {'createschedule_id':selected_createschedule};
        // alert(JSON.stringify(form_data));
        athletes_list.length = 0;
        athlete_json.length =0;
         $.ajax({
               type: "POST",
               url: "functions/result_function.php?loadathletes=true",
               data: form_data,
               cache: false,
               success: function(data) {
                // alert(data);
                var obj = JSON.parse(data);
                  $.each(obj, function(i){
                    athletes_list.push(obj[i].athlete_name);
                    athlete_json.push({'athlete_id':obj[i].athlete_id,'athlete_name':obj[i].athlete_name,'athlete_dob':obj[i].athlete_dob,'athlete_mobile':obj[i].athlete_mobile,'athlete_bibno':obj[i].assignbib_number})
                  });
                  // alert(JSON.stringify(athlete_json));          
              }
        });
    });

    $('.result_athletename').focus(function (e) {
      // alert(athlete_json);
      $(this).autocomplete({
        source: athletes_list,
      });
    });

     $('.result_athletename').blur(function (e) {
      // alert(JSON.stringify(athlete_json));
      select_name = $('.result_athletename').val();
      var obj = athlete_json;
      $.each(obj, function(i){
        if(obj[i].athlete_name == select_name){
          $('.result_athleteid').val(obj[i].athlete_id).prop("readonly", true);
          $('.result_athletedate').val(obj[i].athlete_dob).prop("readonly", true);
          $('.result_athletemobile').val(obj[i].athlete_mobile).prop("readonly", true);
          $('.result_athletebib').val(obj[i].athlete_bibno).prop("readonly", true);
        }
      });
     });

     $(document).on('blur','.enter_result',function(){
        value = $(this).val();
        if( value == ''){
          $(this).parents('tr').find('.enter_points').text('0');
        } else if (value >=0 && value <=5.9999){
             $(this).parents('tr').find('.enter_points').text('1');
        } else if (value >=6 && value <=10.9999){
           $(this).parents('tr').find('.enter_points').text('2');
        } else if (value >=11 && value <=15.9999){
           $(this).parents('tr').find('.enter_points').text('3');
        } else if (value >=16){
           $(this).parents('tr').find('.enter_points').text('4');
        } 
        var val=0;
        $(".enter_points").each(function() {
          val += Number($(this).text());
          $('.total_result').text(val);
        });
     });

     $('.result_submit_act').click(function(){
          var result_data = [];
          createschedule_id = $('.result_createscheduleid').val();
          athlete_id = $('.result_athleteid').val();
          $(".result_table tr:not(:last-child)").each(function(i) {
              test_name = $(this).find('.result_test_name').text();
              parameter_name = $(this).find('.result_parameter_name').text();
              enter_result = $(this).find('.enter_result').val();
              enter_points = $(this).find('.enter_points').text();
              result_data.push({'createschedule_id':createschedule_id,'athlete_id':athlete_id,'test_name':test_name,
                                'parameter_name':parameter_name,'enter_result':enter_result,'enter_points':enter_points});
          });
          $.ajax({
             type: "POST",
             url: "functions/result_function.php?storeresult=true",
             data: JSON.stringify(result_data),
             dataType: 'json',
             cache: false,
             success: function(data) {
              alert(data);
              }
          });
     });
      
     $('.edit_parameter_unit').click(function(event) {
         var parameterunit_id = $(this).attr('data-value');
         $.ajax({
              type: "POST",
              url: "functions/parameter_unitfunction.php?getunitdata=true",
              data:{'id':parameterunit_id},
              cache: false,
              dataType:'json',
              success: function(data) {
                  //alert(JSON.stringify(data));
                  $('.edit_param_type option[value="'+data.parametertype_id+'"]').attr('selected','selected');
                  $('.edit_param_unit').val(data.parameterunit);
                  $('.edit_param_unit_id').val(data.parameterunit_id);
             }
          });
     });
});
