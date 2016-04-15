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
    function success_align(){
          var height=$('.success_msg').height();
          var width=$('.success_msg').width();
          $('.success_msg').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
    }
    function package_menu(){
      var dh = $(document).height();
      var wh = $(window).innerHeight() - 34;
      if ( dh >= wh ) {
          $('.footer_txt').css('bottom', "0px");
          $('.footer_txt').addClass('bottom_alignment_footer');
          $('.footer_txt').fadeIn();
        }
      else {
        $('.footer_txt').css({'top': wh + "px"});
        $('.footer_txt').fadeIn();

      }

    }
    var d1_list = [];
    function editfunction(data_id,el){
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
                  $('.popup_fade').hide();
                  $('.state_div, .close_btn').show();
                  document.body.style.overflow = 'auto';
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
                $('[name=edit_states_id]').val(obj[i].states_id);
                 $.ajax({
                   type: "POST",
                   url: "functions/district_function.php?loaddistrictbystate=true",
                   data: {'states_name':obj[i].states_name},
                   cache: false,
                   success: function(data) {
                    d1_list = [];
                    var data1 = JSON.parse(data);
                    $.each(data1, function(i){
                      d1_list.push(data1[i]);
                    });
                   }
                });
              });
              $('.popup_fade').hide();
              $('.district_div, .close_btn').show();
              document.body.style.overflow = 'auto';
             }
          });
        } else if(window.location.href.indexOf("parameter_type.php") !== -1){
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
                // $('[value='+data_id+']').parents('.delete_color').find('[name=edit_parameter_id]').val(obj[i].parametertype_id);
                // $('[value='+data_id+']').parents('.delete_color').find('[name=edit_parameter_type]').val(obj[i].parametertype_name);
              });
              $('.popup_fade').hide();
              $('.state_div, .close_btn').show();
              document.body.style.overflow = 'auto';
              //location.reload();
             }
          });
        } else if(window.location.href.indexOf("athletes.php") !== -1){
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
                  $('[name=dateday]').find("option[value="+dob[2]+"]").attr("selected","selected");
                  $('[name=datemonth]').find("option[value="+dob[1]+"]").attr("selected","selected");
                  $('[name=dateyear]').find("option[value="+dob[0]+"]").attr("selected","selected");
                  $('[name=edit_athlete_mobile]').val(obj[i].athlete_mobile);
                  $('[name=edit_athlete_gender]').find("option:contains("+obj[i].athlete_gender+")").attr("selected","selected");
                  $('[name=edit_athlete_state]').find("option:contains("+obj[i].athletestates_name+")").attr("selected","selected");
                  $('[name=edit_athlete_district]').html("<option></option><option value='"+obj[i].athletedistrict_id+ "'selected>"+obj[i].athletedistrict_name+"</option>");
                  $('[name=edit_athlete_address]').val(obj[i].athlete_address);
                  $('[name=edit_athlete_taluka]').val(obj[i].athlete_taluka);
                  $('[name=edit_athlete_sports]').find("option:contains("+obj[i].athletesports_name+")").attr("selected","selected");
                });
                // $('.popup_fade').show();
                // athletes_center_align();
                // $('.athletes_div, .close_btn').show();
                // document.body.style.overflow = 'auto';
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
                  $('[name=edit_schedule_testbattery]').find("option[value="+obj[i].createschedule_testbatteryid+"]").attr("selected","selected");
                  $('[name=dateday]').find("option[value="+date[2]+"]").attr("selected","selected");
                  $('[name=datemonth]').find("option[value="+date[1]+"]").attr("selected","selected");
                  $('[name=dateyear]').find("option[value="+date[0]+"]").attr("selected","selected");
                  $('[name=edit_schedule_hour]').find("option:contains("+time[0]+")").attr("selected","selected");
                  $('[name=edit_schedule_minute]').find("option:contains("+time[1]+")").attr("selected","selected");
                  $('[name=edit_schedule_seconds]').find("option:contains("+time[2]+")").attr("selected","selected");
                  $('[name=edit_schedule_venue]').val(obj[i].createschedule_venue);
                });
                $('.popup_fade').hide();
                // createschedule_center_align();
                $('.createschedule_div, .close_btn').show();
                document.body.style.overflow = 'auto';
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
            var rangetest_obj = JSON.parse(data[0]);
            var rangecategory_obj = JSON.parse(data[1]);
            var range_obj = JSON.parse(data[2]);
            var rangeattr_obj = JSON.parse(data[3]);

            var rangetest_options = '<option></option>';
            $.each(rangetest_obj, function(i){
              rangetest_options += '<option value="'+rangetest_obj[i].test_id+'">'+rangetest_obj[i].test_name+'</option>';
            });
            $('[name=edit_range_test]').html(rangetest_options).attr("disabled",true);

            var rangecategory_options = '<option></option>';
            $.each(rangecategory_obj, function(i){
              rangecategory_options += '<option value="'+rangecategory_obj[i].categories_id+'">'+rangecategory_obj[i].categories_name+'</option>';
            });
            $('[name=edit_range_category]').html(rangecategory_options).attr("disabled",true);

            $.each(range_obj, function(i){
              $('[name=edit_range_id').val(range_obj[i].range_id);
              $('[name=edit_range_testbattery]').find("option:contains("+range_obj[i].rangetestbattery_name+")").attr("selected","selected");
              $('[name=edit_range_category]').find("option[value="+range_obj[i].rangecategory_id+"]").attr("selected","selected");
              $('[name=edit_range_test]').find("option[value="+range_obj[i].rangetest_id+"]").attr("selected","selected");
              $('[name=edit_range_parameter]').html('<option value="'+range_obj[i].rangetestattribute_id+'" selected>'+range_obj[i].rangeparameter_name+'</option>');
              $(el).parents('tr').find('.hide_range_parameter').val(range_obj[i].rangetestattribute_id);
              $(el).parents('tr').find('.hide_range_category').val(range_obj[i].rangecategory_id);
              $(el).parents('tr').find('.hide_range_test').val(range_obj[i].rangetest_id);
                  if(range_obj[i].rangeparameter_type.toLowerCase() == 'time')
                    // $('.edit_range_notes').text("Enter the range in "+range_obj[i].rangeparameter_unit+ " format");
                    $('.edit_range_notes').text("Enter Ranges for "+range_obj[i].rangeparameter_name+" in "+range_obj[i].rangeparameter_unit);
                  else
                    $('.edit_range_notes').text("Enter Ranges for "+range_obj[i].rangeparameter_name+" in "+range_obj[i].rangeparameter_unit+ " in "+range_obj[i].rangeparameter_format+" decimals");
                  $(el).parents('tr').find('.range_parameter_type').val(range_obj[i].rangeparameter_type);
                  $(el).parents('tr').find('.range_parameter_unit').val(range_obj[i].rangeparameter_unit);
                  $(el).parents('tr').find('.range_parameter_format').val(range_obj[i].rangeparameter_format);
                });
                $('.edit_range_note').show();
                //Append data to first range part without using for loop
                data = rangeattr_obj[0];
                // element = $('.edit_clone_content:first');
                element = $(el).siblings('.range_div').find('.edit_clone_content:first');
                element.find('[name=edit_rangeattr_id1]').val(data.rangeattribute_id);
                element.find('[name=edit_range_id1]').val(data.range_id);
                element.find('[name=edit_range_start1]').val(data.range_start);
                element.find('[name=edit_range_end1]').val(data.range_end);
                element.find('[name=edit_range_points1]').val(data.range_point);

                // Remove all clone element except first one (this is used when user again and again click edit button)
                $(el).siblings('.range_div').find('.edit_clone_content:not(:first-child)').remove();

                //Append data to other range part with using for loop
                if(rangeattr_obj.length>=2){
                  id = 2;
                  $.each(rangeattr_obj, function(i) {
                      if (i === 0) return;
                      else{
                        rangeattr_element = $(el).siblings('.range_div').find('.edit_clone_content:last').clone();
                        // var rangeattr_element = newelement.clone();
                        rangeattr_element.find('.edit_range_label').remove();
                        rangeattr_element.attr('id','edit_range_counter'+id);
                        rangeattr_element.find('.edit_rattr_id').attr("name","edit_rangeattr_id"+id).val(rangeattr_obj[i].rangeattribute_id);
                        rangeattr_element.find('.edit_r_id').attr("name","edit_range_id"+id).val(rangeattr_obj[i].range_id);
                        rangeattr_element.find('.edit_r_strt').attr("id","edit_strt"+id).attr("name","edit_range_start"+id).val(rangeattr_obj[i].range_start);
                        rangeattr_element.find('.edit_r_end').attr("id","edit_end"+id).attr("name","edit_range_end"+id).val(rangeattr_obj[i].range_end);
                        rangeattr_element.find('.edit_r_point').attr("id","edit_point"+id).attr("name","edit_range_points"+id).val(rangeattr_obj[i].range_point);
                        rangeattr_element.appendTo($(".edit_range_holder"));
                        id=id+1;
                      }
                  });
                }

                // $('.popup_fade').show();
                // $('.range_div, .close_btn').show();
                // document.body.style.overflow = 'hidden';
               }
            });
        }
    }

    $(window).resize(function () {
        package_menu();
      });
      $(document).delegate('.assign_clone_content .custom-combobox-input','blur',function(){
          var j = 0;
          var main =  $(this);
          var schedule = $('.assignsche_create').val();
          var category = $('.assignsche_cate').val();
          var athe_id = main.parents('.assign_clone_content').find('.athlete_name').val();
          var currentInput  = $(this).val();
          $.ajax({
               type: "POST",
               url: "functions/athletes_functions.php?athelete_check=true",
               data:{'sche':schedule,'cate':category,'athe':athe_id},
               cache: false,
               success: function(data) {
                    if(data == 'error'){
                        main.val('');
                        main.parents('.assign_clone_content').find('.dob').val('');
                        main.parents('.assign_clone_content').find('.mobile').val('');
                      success_align();
			           $('.success_msg span').html('Schedule already exists!');
			           $('.success_msg').show();
			           $('.popup_fade').show();
                    }
              }
           });
        $(".assign_clone_content .custom-combobox-input").each(function(index) {
          if(athe_id === $(this).parents('.assign_clone_content').find('.athlete_name').val()) {
              j++;
          }
        });
        if(j=='2'){
            //alert('Already Exists!');
            $(this).val('');
            $(this).parents('.assign_clone_content').find('.dob').val('');
            $(this).parents('.assign_clone_content').find('.mobile').val('');
            //alert($(this).parents('.assign_clone_content').find('date_assign dob').val('').html());
             success_align();
               $('.success_msg span').html('Already Exists!');
               $('.success_msg').show();
               $('.popup_fade').show();
               document.body.style.overflow = 'hidden';
        }
      });
      $(document).delegate('.assign_clone_content_edit .athlete_name_update','change',function(){
          var j = 0;
          var main_content =  $(this).parents('.assign_clone_content_edit');
          var schedule = $(this).parents('#edit_assign_schedule_form').find('.create_schedule_update_id').val();
          var category = $('.category_update').val();
          var athe_id = $(this).val();
          var currentInput  = $(this).val();
         
          $.ajax({
               type: "POST",
               url: "functions/athletes_functions.php?athelete_check=true",
               data:{'sche':schedule,'cate':category,'athe':athe_id},
               cache: false,
               success: function(data) {
                    if(data == 'error'){
                        //alert('This athelete already assigned another category!');
                        $('option:selected',main_content).removeAttr('selected');
                        main_content.find('.dob').val('');
                        main_content.find('.mobile').val('');
                               success_align();
			           $('.success_msg span').html('Schedule already exists!');
			           $('.success_msg').show();
			           $('.popup_fade').show();
			           document.body.style.overflow = 'hidden';
                    }
              }
           });
           
        $(this).parents('.clone_schedule_update_content').find(".athlete_name").each(function(index) {
          if(currentInput === $(this).val()) {
              j++;
          }
        });
        if(j=='2'){
            //alert('Already Exists!');
            //$(this).val('');
            $('option:selected',this).removeAttr('selected');
            $(this).parents('.assign_clone_content').find('.dob').val('');
            $(this).parents('.assign_clone_content').find('.mobile').val('');
            //alert($(this).parents('.assign_clone_content').find('date_assign dob').val('').html());
            success_align();
           $('.success_msg span').html('Already Exists!');
           $('.success_msg').show();
           $('.popup_fade').show();
           document.body.style.overflow = 'hidden';
        }
      });

    // $(window).load(function() {
    //      // $('.check_table').find('tbody tr').not(':first').hide();
    //      //newly added when change grid structure in range
    //      hidden_value = $('.check_table').find('.hidden_value:first').val();
    //      $('.check_table').find("input[value="+hidden_value+"]").parents('tr').show();
    //      $('.check_table').find('.hidden_value').not("input[value="+hidden_value+"]").parents('tr').hide();
    // });
    
    

    $(document).ready(function () {
	  
      package_menu();

      $('.add_createschedule_act,.edit_createschedule_act,.add_athletes_act,.edit_athletes_act').on('click', function(){
         $('.day, .month, .year').attr('data-validation', 'birthdate');
         $('.day, .month, .year').attr('data-validation-error-msg', 'Please Select Date');
          date_check();
      });

      $('#test_form .parameter_btn').click(function(e) {
          e.preventDefault();  
          var submitOK = true;
           $('.clone_content:last').children().find('input[type="text"],select').each(function() {
             if ($(this).val() == ""){
                      $(this).next().addClass('custom_error');                      
                      var cntrl=$('.clone_content:last').children().find('> select');
                          $(cntrl).each(function(index) {
                          if (index==""){                          
                            $(cntrl).next().addClass('custom_error');
                            submitOK = false;
                            return false; 
                          }
                          else  
                            $(cntrl).next().removeClass('custom_error');
                      });                     
               }
               else{
                 $(this).next().removeClass('custom_error');                              
               }
          });
          //  if(($('.clone_content:last').children().find('.parameter_name').val() != '') || ($('.clone_content:last').children().find('.parameter_type').val() != '') || ($('.clone_content:last').children().find('.parameter_unit').val() != '') || ($('.clone_content:last').children().find('.parameter_format').val() != '') || ($('.clone_content').children().find('.parameter_name').val() != '') || ($('.clone_content').children().find('.parameter_type').val() != '') || ($('.clone_content').children().find('.parameter_unit').val() != '') || ($('.clone_content').children().find('.parameter_format').val() != ''))
          //   {
          //       var id = current_id+1;
          //       nextElement($('.clone_content:last'));
          //       $('.clone_content:last').attr('id','parameter_count'+id);
          // }
          // else{
          //   return false;
          // }
        });

     
      $('.edit_item,.save_item,.delete_item,.edit_time,.save_time,.delete_time').hide();
      $('.test_search').keyup(function() {
            $('.test-list').empty();
            var testname = $(this).val();
            //alert(testname);
            if(testname != ''){
                $.ajax({
                     type: "POST",
                     url: "functions/test_functions.php?find_test=true",
                     data:{'id':testname},
                     cache: false,
                     dataType:'json',
                     success: function(data) {
                         $('.test-list').empty();
                         //alert(data);
                         if(data !=''){
                             $.each(data, function(i){
                                 //alert(data[i].test_name);
                                 $('.test-list').append(
                                 '<span class="test-name">\
                                     <input type="checkbox" name="test" value="test" class="check_test test_name_hover_check" id="check-select" data-id ="'+data[i].test_id+'" >\
                                     <input type="text" name="test" value="'+data[i].test_name+'" class="list_edit test_name_hover input_wrap" disabled>\
                                     <span class="test-alter">\
                                         <i class="fa fa-floppy-o save_item edit_save_button"></i>\
                                         <i class="fa fa-pencil-square-o edit_item "></i>\
                                         <i class="fa fa-trash-o delete_item"></i>\
                                     </span>\
                                 </span>\
                                 <div class="delete_div delete_search">\
                                       <div class="del_title">\
                                         <span class="del_txt">DELETE</span>\
                                       </div>\
                                       <div class="del_content">\
                                         <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                         <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                         <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_name" data-id ="'+data[i].test_id+'">\
                                         <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                       </div>\
                                 </div>');
                                  $('.edit_item,.save_item,.delete_item').hide();
                             });
                         }
                    }
                 });
            }else{
                $.ajax({
                     type: "POST",
                     url: "functions/test_functions.php?find_all_test=true",
                     data:{'id':'all'},
                     cache: false,
                     dataType:'json',
                     success: function(data) {
                         //alert(data);
                         if(data !=''){
                             $.each(data, function(i){
                                 //alert(data[i].test_name);
                                 $('.test-list').append(
                                 '<span class="test-name">\
                                     <input type="checkbox" name="test" value="test" class="check_test test_name_hover_check" id="check-select"  data-id ="'+data[i].test_id+'">\
                                     <input type="text" name="test" value="'+data[i].test_name+'" class="list_edit test_name_hover input_wrap" disabled>\
                                     <span class="test-alter">\
                                         <i class="fa fa-floppy-o save_item edit_save_button"></i>\
                                         <i class="fa fa-pencil-square-o edit_item "></i>\
                                         <i class="fa fa-trash-o delete_item"></i>\
                                     </span>\
                                 </span>\
                                 <div class="delete_div delete_search">\
                                       <div class="del_title">\
                                         <span class="del_txt">DELETE</span>\
                                       </div>\
                                       <div class="del_content">\
                                         <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                          <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                          <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_name" data-id ="'+data[i].test_id+'">\
                                          <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                       </div>\
                                 </div>');
                                  $('.edit_item,.save_item,.delete_item').hide();
                             });
                         }
                    }
                 });
            }
        });
        $('.test_battery_search').keyup(function() {
              $('.test-list').empty();
              var testbattreyname = $(this).val();
              //alert(testname);
              if(testbattreyname != ''){
                  $.ajax({
                       type: "POST",
                       url: "functions/test_battery_functions.php?find_test_battery=true",
                       data:{'id':testbattreyname},
                       cache: false,
                       dataType:'json',
                       success: function(data) {
                           $('.test-list').empty();
                           //alert(data);
                           if(data !=''){
                               $.each(data, function(i){
                                   //alert(data[i].test_name);
                                   $('.test-list').append(
                                   '<span class="test-name">\
                                       <input type="checkbox" name="test" value="test" class="check_test test_battery_name_hover_check" id="check-select"  data-id ="'+data[i].testbattery_id+'">\
                                       <input type="text" name="test" value="'+data[i].testbattery_name+'" class="list_edit test_battery_name_hover input_wrap">\
                                       <span class="test-alter">\
                                           <i class="fa fa-floppy-o save_item save_test_battery_name"></i>\
                                           <i class="fa fa-pencil-square-o edit_item"></i>\
                                           <i class="fa fa-trash-o delete_item"></i>\
                                       </span>\
                                   </span>\
                                   <div class="delete_div delete_search">\
                                       <!-- <code class="close_btn cancel_btn"> </code>  -->\
                                         <div class="del_title">\
                                           <span class="del_txt">DELETE</span>\
                                         </div>\
                                         <div class="del_content">\
                                           <span class="del_content_txt">Are you sure you want to delete this record?</span>\
                                           <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                           <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_battery_name" data-id ="'+data[i].testbattery_id+'">\
                                           <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                         </div>\
                                   </div>');
                                    $('.edit_item,.save_item,.delete_item').hide();
                               });
                           }
                      }
                   });
              }else{
                  $.ajax({
                       type: "POST",
                       url: "functions/test_battery_functions.php?find_all_test_battery=true",
                       data:{'id':'all'},
                       cache: false,
                       dataType:'json',
                       success: function(data) {
                           $('.test-list').empty();
                           //alert(data);
                           if(data !=''){
                               $.each(data, function(i){
                                   //alert(data[i].test_name);
                                   $('.test-list').append(
                                   '<span class="test-name">\
                                       <input type="checkbox" name="test" value="test" class="check_test test_battery_name_hover_check" id="check-select" data-id ="'+data[i].testbattery_id+'">\
                                       <input type="text" name="test"  value="'+data[i].testbattery_name+'" class="list_edit test_battery_name_hover input_wrap">\
                                       <span class="test-alter">\
                                           <i class="fa fa-floppy-o save_item save_test_battery_name"></i>\
                                           <i class="fa fa-pencil-square-o edit_item"></i>\
                                           <i class="fa fa-trash-o delete_item"></i>\
                                       </span>\
                                   </span>\
                                   <div class="delete_div delete_search">\
                                       <!-- <code class="close_btn cancel_btn"> </code>  -->\
                                         <div class="del_title">\
                                           <span class="del_txt">DELETE</span>\
                                         </div>\
                                         <div class="del_content">\
                                           <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                           <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                           <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_battery_name" data-id ="'+data[i].testbattery_id+'">\
                                           <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                         </div>\
                                   </div>');
                                    $('.edit_item,.save_item,.delete_item').hide();
                               });
                           }
                      }
                   });
              }
          });
          // Parametertype - Unit for Auto Search  //

      $('.parametertype_search').keyup(function() {
            $('.test-list').empty();
            var typename = $(this).val();
            if(typename != ''){
                $.ajax({
                     type: "POST",
                     url: "functions/parameter_unitfunction.php?find_type=true",
                     data:{'id':typename},
                     cache: false,
                     dataType:'json',
                     success: function(data) {
                         $('.test-list').empty();
                         if(data !=''){
                             $.each(data, function(i){
                                 //alert(data[i].typename);
                                 $('.test-list').append(
                                 '<span class="test-name">\
                                     <input type="checkbox" name="test " value="test" class="check_test check_parametertype" id="check-select" data-id ="'+data[i].parametertype_id+'">\
                                     <input type="text" data-id ="'+data[i].parametertype_id+'" name="test" value="'+data[i].parametertype_name+'" class="list_edit parametertype_name_hover input_wrap" disabled>\
                                     <span class="test-alter">\
                                         <i class="fa fa-floppy-o save_item edit_save_button"></i>\
                                         <i class="fa fa-pencil-square-o edit_item "></i>\
                                         <i class="fa fa-trash-o delete_item"></i>\
                                     </span>\
                                 </span>\
                                 <div class="delete_div delete_search">\
                                       <div class="del_title">\
                                         <span class="del_txt">DELETE</span>\
                                       </div>\
                                       <div class="del_content">\
                                         <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                         <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                         <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="parametertype_name" data-id ="'+data[i].parametertype_id+'">\
                                         <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                       </div>\
                                 </div>');
                                $('.edit_item,.save_item,.delete_item').hide();
                             });
                         }
                    }
                 });
            }else{
                $.ajax({
                     type: "POST",
                     url: "functions/parameter_unitfunction.php?find_all_type=true",
                     data:{'id':'all'},
                     cache: false,
                     dataType:'json',
                     success: function(data) {
                         $('.test-list').empty();
                         //alert(data);
                         if(data !=''){
                             $.each(data, function(i){
                                 //alert(data[i].test_name);
                                 $('.test-list').append(
                                 '<span class="test-name">\
                                     <input type="checkbox" name="test" value="test" class="check_test check_parametertype" id="check-select" data-id ="'+data[i].parametertype_id+'">\
                                     <input type="text" data-id ="'+data[i].parametertype_id+'" name="test" value="'+data[i].parametertype_name+'" class="list_edit test_name_hover input_wrap" disabled>\
                                     <span class="test-alter">\
                                         <i class="fa fa-floppy-o save_item edit_save_button"></i>\
                                         <i class="fa fa-pencil-square-o edit_item "></i>\
                                         <i class="fa fa-trash-o delete_item"></i>\
                                     </span>\
                                 </span>\
                                 <div class="delete_div delete_search">\
                                       <div class="del_title">\
                                         <span class="del_txt">DELETE</span>\
                                       </div>\
                                       <div class="del_content">\
                                         <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                         <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                         <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="parametertype_name" data-id ="'+data[i].parametertype_id+'">\
                                         <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                       </div>\
                                 </div>');
                                $('.edit_item,.save_item,.delete_item').hide();
                             });
                         }
                    }
                 });
            }
        });
    // Parameter type Edit Option in Parameter unit Module //

        $(document).delegate('.paramsedit_save_button','click',function() {
          var params_id = $(this).parents('.test-name').find('.list_edit').attr('data-id');
          var params_name = $(this).parents('.test-name').find('.list_edit').val();
          $.ajax({
               type: "POST",
               url: "functions/parameter_unitfunction.php?paramstype_name_update=true",
               data:{'params_id':params_id,'params_name':params_name},
               cache: false,
               success: function(data) {
                  //alert(data);
                  if(data.trim() == 'succeed'){
                      //alert('Paramstype name updated successfully!');
                      //location.reload();
                       success_align();
			           $('.success_msg span').html('Paramstype name updated successfully!');
			           $('.success_msg').show();
			           $('.popup_fade').show();
			           document.body.style.overflow = 'hidden';
                  }
               }
          });

      });
        // $(document).on('change','.test_name_hover_check',function(event) {
            // //alert($(this).attr('data-id'));
// 
          // if(this.checked) {
            // $('.test_name_hover_check').not(this).prop('checked', false);
            // //alert($(this).attr('data-id'));
             // $('#test_table tbody').empty();
            // var test_id = $(this).attr('data-id');
            // $.ajax({
                 // type: "POST",
                 // url: "functions/test_functions.php?find_test_attribute=true",
                 // data:{'id':test_id},
                 // cache: false,
                 // dataType:'json',
                 // success: function(data) {
                     // //alert(JSON.stringify(data.test));
                     // $('#test_table tbody').empty();
                     // if(data.test){
                          // var param_dynamic = '';
                        // $.each(data.param, function(i){
                             // param_dynamic += "<option value='"+data.param[i].parametertype_name+"'>"+data.param[i].parametertype_name+"</option>";
                         // });
                          // $.each(data.test, function(i){
                              // $('#test_table tbody').append('\
          				      // <tr class="align_center delete_color">\
          						// <input type="hidden" value="'+data.test[i].test_attribute_id+'" id="test_attribute_id">\
          				        // <td>'+data.test[i].test_parameter_name+'</td>\
          				        // <td>'+data.test[i].test_parameter_type+'</td>\
          				        // <td>'+data.test[i].test_parameter_unit+'</td>\
          				        // <td>'+data.test[i].test_parameter_format+'</td>\
          				        // <td class="popup-edit">\
          				        	// <span class="edit_state edit_test" data-value="'+data.test[i].test_attribute_id+'" data-test-id="'+data.test[i].test_id+'"><i class="fa fa-pencil-square-o"></i></span>\
          			        		// <span class="delete_state" data-value="'+data.test[i].test_attribute_id+'"><i class="fa fa-trash-o"></i></span>\
          			        			// <div class="test_div popup_hidden">\
          					          		// <code class="close_btn cancel_btn"> </code>\
          					          		// <div class="edit_title">\
          					                	// <span class="del_txt">Edit Test</span>\
          					              	// </div>\
          					          			// <div class="container col-md-12">\
          						          			// <div class="col-xs-12 col-md-12">\
          									// <form id="test_updation_form" action="functions/test_functions.php" method="post">\
          										// <div class="parameter_holder">\
          											// <div class="form-group col-md-4" style="padding: 0;">\
          												// <label class="popup_label">Enter Parameter Name</label><br>\
          												// <input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:490px !important;height: 30px;" required>\
          											// </div>\
          											// <div class="form-group col-md-12 test_percentage parameter_type_parent">\
          												// <div class="form-group col-md-4" style="padding: 0;">\
          													// <label class="popup_label">Type</label><br>\
          													// <select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required" required>\
          														// <option value=""></option>\
                                                                // '+param_dynamic+'\
          													// </select>\
          												// </div>\
          												// <div class="form-group col-md-4" style="padding: 0;">\
          													// <label class="popup_label">Unit</label><br>\
          													// <select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required" required>\
          													// </select>\
          												// </div>\
          												// <div class="form-group col-md-4" style="padding: 0;">\
          													// <label class="popup_label">Format</label><br>\
          													// <select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required" required>\
          														// <option value="">Format</option>\
          														// <option value="0">0</option>\
          														// <option value="1">1</option>\
          														// <option value="2">2</option>\
          														// <option value="3">3</option>\
          														// <option value="4">4</option>\
          														// <option value="5">5</option>\
          													// </select>\
          												// </div>\
          											// </div>\
          										// </div>\
          										// <input class="parameter_update" type="hidden" name="parameter_update" value="" />\
          										// <input class="test_update_id" type="hidden" name="test_update_id" value="" />\
          										// <div class="col-md-12 schedule_btn" style="white-space: nowrap;">\
          											// <input type="submit" class="btn btn-primary clear" value="Save">\
          											// <input type="reset" value="Cancel" class="btn btn-primary clear reset_form" maxlength="50">\
          										// </div>\
          									// </form>\
          								// </div>\
          							// </div>\
          			                // </div>\
          							// <div class="delete_div delete_test_div">\
          						              // <div class="del_title">\
          						                // <span class="del_txt">DELETE</span>\
          						              // </div>\
          						              // <div class="del_content">\
          						                // <span class="del_content_txt">Are you sure you want to delete this record?</span>\
          						                // <input type="button" class="btn btn-primary align_right no_btn" value="No">\
          						                // <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_attribute" data-id ="'+data.test[i].test_attribute_id+' "data-test-id="'+data.test[i].test_id+'">\
          						                // <input type="hidden" name="delete_id" value="" id="delete_id"/>\
          						              // </div>\
            								// </div>\
          				        // </td>\
          						// <input type="hidden" name="test_attribute_id" id="test_attribute_id" value="'+data.test[i].test_attribute_id+'" />\
          				      // </tr>');
                          // });
                     // }else{
                        // //alert('No Parameter availabel!');
                         // success_align();
				           // $('.success_msg span').html('No Parameter availabel!');
				           // $('.success_msg').show();
				           // $('.popup_fade').show();
				           // document.body.style.overflow = 'hidden';
                     // }
                 // }
            // });
        // }
        // });
        $(document).on('change','.test_battery_name_hover_check', function(event) {
            //alert($(this).attr('data-id'));
             //$('#test_battery_table tbody').empty();
             if(this.checked){
             $('.edit_test_battery').removeClass('hided');
             $('.edit_test_battery').next().removeClass('hided');
             $('.test_battery_name_hover_check').not(this).prop('checked', false);
             var test_battery_id = $(this).attr('data-id');
               $.ajax({
                   type: "POST",
                   url: "functions/test_battery_functions.php?check_validation=true",
                   data:{'id':test_battery_id},
                   cache: false,
                  
                   success: function(data) {
                   	if(data == 'no'){
                   		$('.edit_test_battery').addClass('hided');
             			$('.edit_test_battery').next().addClass('hided');
             			$('.popup-edit').append('<span class="restrict">\
				    			<i class="fa fa-pencil-square-o">\
					    			<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>\
								</i>\
							</span>\
					    	<span class="restrict_del"><i class="fa fa-trash-o"><div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div></i></span>');
                   	}else{
                   		 $('.edit_test_battery').removeClass('hided');
             			$('.edit_test_battery').next().removeClass('hided');
                   	}
                   }
              });
              $.ajax({
                   type: "POST",
                   url: "functions/test_battery_functions.php?find_test_battery_sports=true",
                   data:{'id':test_battery_id},
                   cache: false,
                   dataType:'json',
                   success: function(data) {
                      //alert(JSON.stringify(data));
                      $('.test_battery_sports_name_grid').text(data[0].sports_name);
                      $('.test_battery_delete_button').attr('data-id', data[0].testbattery_id).attr('data-delete','test_battery_attribute');
                      $('.edit_test_battery').attr('data-value',data[0].testbattery_id);
                   }
              });
            $.ajax({
                 type: "POST",
                 url: "functions/test_battery_functions.php?find_test_battery_tests=true",
                 data:{'id':test_battery_id},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                     $.each(data, function(i){
                         $('.selected_test').empty();
                         $.each(data, function(i){
                             $('.selected_test').append('<div class="checkbox align_check" style="margin:0px;"><label class="hover-content">'+data[i].test_name+'</label></div>');
                         });

                     });
                 }
            });
            $.ajax({
                 type: "POST",
                 url: "functions/test_battery_functions.php?find_test_battery_category=true",
                 data:{'id':test_battery_id},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                     $('.selected_category').empty();
                     $.each(data, function(i){
                         $('.selected_category').append('<div class="checkbox align_check" style="margin:0px;"><label class="hover-content">'+data[i].categories_name+'</label></div>');
                     });

                 }
            });
            $.ajax({
                 type: "POST",
                 url: "functions/test_battery_functions.php?find_test_battery_sports_attr=true",
                 data:{'id':test_battery_id},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                     $('.selected_sports').empty();
                     $.each(data, function(i){
                         $('.selected_sports').append('<div class="checkbox align_check" style="margin:0px;"><label class="hover-content">'+data[i].sports_name+'</label></div>');
                     });

                 }
            });
        }else{
        	$('.edit_test_battery').addClass('hided');
            $('.edit_test_battery').next().addClass('hided');
            $('.popup-edit .restrict').remove();
            $('.popup-edit .restrict_del').remove();
            $.ajax({
                 type: "POST",
                 url: "functions/test_battery_functions.php?find_test_battery_tests_all=true",
                 data:{'id':'1'},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                     $.each(data, function(i){
                         $('.selected_test').empty();
                         $.each(data, function(i){
                             $('.selected_test').append('<div class="checkbox align_check" style="margin:0px;"><label class="hover-content">'+data[i].test_name+'</label></div>');
                         });

                     });
                 }
            });
            $.ajax({
                 type: "POST",
                 url: "functions/test_battery_functions.php?find_test_battery_category_all=true",
                 data:{'id':'1'},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                     $('.selected_category').empty();
                     $.each(data, function(i){
                         $('.selected_category').append('<div class="checkbox align_check" style="margin:0px;"><label class="hover-content">'+data[i].categories_name+'</label></div>');
                     });

                 }
            });
            $.ajax({
                 type: "POST",
                 url: "functions/test_battery_functions.php?find_test_battery_sports_attr_all=true",
                 data:{'id':'1'},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                 	
                     $('.selected_sports').empty();
                     $.each(data, function(i){
                         $('.selected_sports').append('<div class="checkbox align_check" style="margin:0px;"><label class="hover-content">'+data[i].sports_name+'</label></div>');
                     });

                 }
            });
        }
        });

      $(document).delegate('.edit_save_button','click',function() {
          var test_id = $(this).parents('.test-name').find('.test_name_hover_check').attr('data-id');
          var test_name = $(this).parents('.test-name').find('.list_edit').val();
          if(test_name.trim() != ''){
              $.ajax({
                   type: "POST",
                   url: "functions/test_functions.php?test_name_update=true",
                   data:{'test_id':test_id,'test_name':test_name},
                   cache: false,
                   success: function(data) {
                      //alert(data);
                      if(data.trim() == 'succeed'){
                          //alert('Test edited successfully!');
                          //location.reload();
                          success_align();
		                   $('.success_msg span').html('Test edited successfully!');
		                   $('.success_msg').show();
		                   $('.popup_fade').show();
		                   document.body.style.overflow = 'hidden';
                      }else if(data.trim() == 'exists'){
              	 		success_align();
	                    $('.success_msg span').html('Test already exists!');
	                    $('.success_msg').show();
	                    $('.popup_fade').show();
	                    document.body.style.overflow = 'hidden';
                   }
                  }
              });
          }else{
              //alert('Invalid test name');
              success_align();
               $('.success_msg span').html('Invalid test name');
               $('.success_msg').show();
               $('.popup_fade').show();
               document.body.style.overflow = 'hidden';
          }


      });
      $(document).delegate('.paremeter_unit_type_save_btn','click',function() {
          var test_id = $(this).parents('.test-name').find('.check_parametertype').attr('data-id');
          var test_name = $(this).parents('.test-name').find('.list_edit').val();
         if(test_name!=''){
          $.ajax({
               type: "POST",
               url: "functions/parameter_unitfunction.php?paramstype_name_update=true",
               data:{'params_id':test_id,'params_name':test_name},
               cache: false,
               success: function(data) {
                  //alert(data);
                  if(data.trim() == 'succeed'){
                      //alert('Parameter Type edited successfully!');
                      //location.reload();
                      success_align();
		               $('.success_msg span').html('Parameter Type edited successfully!');
		               $('.success_msg').show();
		               $('.popup_fade').show();
		               document.body.style.overflow = 'hidden';
                  }
               }
          });
        }else{
          //alert('Invalid Parameter Type');
          success_align();
           $('.success_msg span').html('Invalid Parameter Type');
           $('.success_msg').show();
           $('.popup_fade').show();
           document.body.style.overflow = 'hidden';
        }
      });
      $(document).delegate('.save_test_battery_name','click',function() {
          var test_battery_id = $(this).parents('.test-name').find('.test_battery_name_hover_check').attr('data-id');
          var test_battery_name = $(this).parents('.test-name').find('.list_edit').val();
          if(test_battery_name !=''){
              $.ajax({
                   type: "POST",
                   url: "functions/test_battery_functions.php?testbattery_name_update=true",
                   data:{'test_battery_id':test_battery_id,'test_battery_name':test_battery_name},
                   cache: false,
                   success: function(data) {
                      //alert(data);
                      if(data.trim() == 'succeed'){
                          //alert('Test Battery Name edited successfully!');
                          //location.reload();
                          success_align();
				           $('.success_msg span').html('Test Battery Name edited successfully!');
				           $('.success_msg').show();
				           $('.popup_fade').show();
				           document.body.style.overflow = 'hidden';
                      }
                   }
              });
          }
          else{
              //alert('Invalid Test Battery Name');
              success_align();
	           $('.success_msg span').html('Invalid Test Battery Name');
	           $('.success_msg').show();
	           $('.popup_fade').show();
	           document.body.style.overflow = 'hidden';
          }

      });
      $(document).delegate('.edit_item', 'click', function(event) {
          $(this).parents('.test-name').find('.list_edit').removeAttr('disabled');
      });
      var test_battery_name_for_edit_purpose = '';
      var test_name_for_edit_purpose = '';
      var state_for_edit_purpose = '';
      var athlete_for_edit_purpose = '';
      var schedule_for_edit_purpose = '';
      var parametertype_for_edit_purpose = '';
      var assign_for_edit_purpose = '';
      $(document).delegate('.test-test-name', 'mouseenter', function(event){
      	test_name_for_edit_purpose = $(this).find('.test_name_value').val();
      });
      $(document).delegate('.test-test-name','mouseleave',function(event){
      	$(this).find('.test_name_value').val(test_name_for_edit_purpose);
      });
      $(document).delegate('.test-battery-test-name', 'mouseenter', function(event){
      	test_battery_name_for_edit_purpose = $(this).find('.test_battery_name_hover').val();
      });
      $(document).delegate('.test-battery-test-name','mouseleave',function(event){
      	$(this).find('.test_battery_name_hover').val(test_battery_name_for_edit_purpose);
      });
      $(document).delegate('.parameter-test-name', 'mouseenter', function(event){
      	test_battery_name_for_edit_purpose = $(this).find('.test').val();
      });
      $(document).delegate('.parameter-test-name','mouseleave',function(event){
      	$(this).find('.test').val(test_battery_name_for_edit_purpose);
      });
       $(document).delegate('.assign-test_name', 'mouseenter', function(event){
      	assign_for_edit_purpose = $(this).find('.assing_name_hover').val();
      });
      $(document).delegate('.assign-test_name','mouseleave',function(event){
      	$(this).find('.assing_name_hover').val(assign_for_edit_purpose);
      });
      
      $(document).delegate('.test-name', 'mouseenter', function(event){
        $(this).children().find('.edit_item,.delete_item').show();
        $(this).children().find('.side_restrict').show();
        $('.save_item').hide();
     
      });
		$('.side_restrict').hide();
       $(document).delegate('.test-name','mouseleave',function(event){
        $('.edit_item,.delete_item,.save_item').hide();
        $('.side_restrict').hide();
        $('.list_edit').removeClass('list_edit_rollover');
        $(this).find('.list_edit').attr('disabled', 'disabled');
      });
      
      $(document).delegate('.dt_namelist,.at_namelist,.cs_namelist','mouseenter',function(event){
        state_for_edit_purpose = $(this).find('.check_statename').val();
        athlete_for_edit_purpose = $(this).find('.check_athletename').val();
        schedule_for_edit_purpose = $(this).find('.check_createschedulename').val();
      });

      $(document).delegate('.dt_namelist,.at_namelist,.cs_namelist','mouseleave',function(event){
        $(this).find('.check_statename').val(state_for_edit_purpose);
        $(this).find('.check_athletename').val(athlete_for_edit_purpose);
        $(this).find('.check_createschedulename').val(schedule_for_edit_purpose);
      });
      


      $(document).delegate('.edit_item','click',function(event){
        $('.edit_item').hide();
        $(this).prev('.save_item').show();
        if($('.list_edit').hasClass('list_edit_rollover')){
          $('.list_edit').removeClass('list_edit_rollover');
        }
        $(this).parents('.test-alter').prev('.list_edit').addClass("list_edit_rollover");
      });

      $(document).delegate('.save_item','click',function(event){
        $('.list_edit').removeClass('list_edit_rollover');
      });


      $(document).delegate('.delete_item','click',function(){
        $(this).parents('.test-list').find('.delete_div').show();
        $(this).parents('.test-name').next().siblings('.delete_div').hide();
      });
      $('.sports-list').mouseenter(function(){
        $('.hover-sports').show();
      });
      $('.sports-list').mouseleave(function(){
        $('.hover-sports').hide();
      });
      $('.category-list').mouseenter(function(){
        $('.hover-category').show();
      });
      $('.category-list').mouseleave(function(){
        $('.hover-category').hide();
      });

      $('.test-battery').mouseenter(function(){
        $('.hover-test').show();
      });
      $('.test-battery').mouseleave(function(){
        $('.hover-test').hide();
      });

      $("input").attr('maxlength','50').attr('autocomplete', 'off');

     	// state_center_align();
      // delete_center_align();
      login_center_align();
      register_center_align();
      // test_center_align();
      // district_center_align();
      // test_battery_center_align();
      // range_center_align();
      // parameter_center_align();
      success_align();
      $('#radio-2').click(function() {
          $.ajax({
               type: "POST",
               url: "functions/athletes_functions.php?admin_login=true",
               data:{'id':'1'},
               cache: false,
               success: function(data) {
                    window.location = 'athletes.php';
              }
           });
      });
      $('.assignsche_create').change(function() {
          var sche_id = $(this).val();
          //alert(sche_id);
          $.ajax({
               type: "POST",
               url: "functions/assign_schedule_function.php?cate_list=true",
               data:{'id':sche_id},
               cache: false,
               success: function(data) {
                    $('.assignsche_cate').empty().append("<option value=''>Select Category Name</option>"+data);
              }
           });
      });

      // $(document).on('keypress','#mobile,#result_athletemobile,#bib,#result_athletebib,.r_strt,.r_end,.r_point',function(e){
       $(document).on('keypress','#mobile,#result_athletemobile,#bib,#result_athletebib',function(e){
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                   return false;
        }
       });

      $(document).on('keypress','.r_strt,.r_end,.r_point,.edit_r_strt,.edit_r_end,.edit_r_point,.enter_result',function(e){
          var theEvent = e || window.event;
              var key = theEvent.keyCode || theEvent.which;
              key = String.fromCharCode(key);
              if (key.length == 0) return;
              if($(this).hasClass('enter_result'))
                var regex = /^[0-9.-:\-\b\t]+$/;
              else
                var regex = /^[0-9.:\b\t]+$/;
              if (!regex.test(key)) {
                  theEvent.returnValue = false;
                  if (theEvent.preventDefault) theEvent.preventDefault();
              }
         });

      //form reset
    $('.reset_form').on('click',function(){
      $(".edit_create_schedule_form, .edit_athletes_form,#edit_assign_schedule_form,#cs_form").find("select").each(function (index) {
             var ctrl=$(this);
              $(ctrl.children()).each(function(index) {
                  if (index===0) $(this).attr('selected', 'selected');
                  else $(this).removeAttr('selected');
              });
      });
    });

    $('#cs_form .reset_form').on('click',function(){
      $("#cs_form").find("select").each(function (index) {
             var ctrl=$(this);
              $(ctrl.children()).each(function(index) {
                  if (index===0) $(this).attr('required', 'required');
                  else $(this).removeAttr('required');
              });
      });
    }); 

      $('.reset_check').on('click',function(){
        $('#test_battery_update_form :checked').removeAttr('checked');
      });
    

         //Edit popup
      	$(document.body).on('click','.edit_state',function() {
            // state_center_align();
            // $('.popup_fade').show();
            // $('.state_div').hide();
            // $(this).next().next().show();
            // $(this).parents('tr').siblings().children('.state_div').hide();
            // $(this).parents('tr').siblings().children('.popup-edit').hide();
              $(this).parents('tr').find('.popup_hidden').show();
              $(this).parents('tr').siblings('tr').find('.popup_hidden').hide();

            // $('.state_div, .close_btn').show();
            document.body.style.overflow = 'auto';
            //alert($(this).parents('tr').find('.sports_id').text());
            $('.sports_update_name').val($(this).parents('tr').find('.sports_name').text());
            $('.sports_update_id').val($(this).parents('tr').find('.sports_id').val());
            $('.category_update_name').val($(this).parents('tr').find('.category_name').text());
            $('.category_update_id').val($(this).parents('tr').find('.category_id').val());
        });
        $('.edit_test_sport,.edit_param_type').change(function() {
            $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');
        });
        $(document).delegate('.edit_test','click',function(){
            var test_attr_id = $(this).attr("data-value");
            var test_id = $(this).attr("data-test-id");
            var current_popup = $(this);
            //alert(test_id);
            $.ajax({
                 type: "POST",
                 url: "functions/test_functions.php?gettestdata=true",
                 data:{'id':test_attr_id,},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                    //  $('.test_name_update').val(data.test_name);
                    //alert(current_popup.parents('.popup-edit').html());
                     current_popup.parents('.popup-edit').find('.test_parameter_name_update').val(data.test_parameter_name).attr('data-validation-error-msg', 'Please Enter the Parameter Name').attr('data-validation', 'required');
                     current_popup.parents('.popup-edit').find('.parameter_type_update option[value="'+data.test_parameter_type+'"]').attr('selected','selected');
                    // current_popup.parents('.popup-edit').find('.parameter_format_update option[value="'+data.test_parameter_format+'"]').attr('selected','selected');
                     if(data.test_parameter_type.toLowerCase() == 'time'){
                         //alert('time');
                         var paremeter_unit = data.test_parameter_unit;
                         $.ajax({
                              type: "POST",
                              url: "functions/parameter_unitfunction.php?param_unit_for_test_edit=true",
                              data:{'type':'time'},
                              cache: false,
                              dataType:'json',
                               success: function(data) {
                                   //alert(JSON.stringify(data));
                                    var parameter_unit = '<option></option>';
                                    $.each(data, function(i){
                                        if(data[i].parameterunit == paremeter_unit ){
                                            parameter_unit += "<option value='"+data[i].parameterunit+"' selected>"+data[i].parameterunit+"</option>";
                                        }
                                        else{
                                            parameter_unit += "<option value='"+data[i].parameterunit+"'>"+data[i].parameterunit+"</option>";
                                        }
                                    });
                                    current_popup.parents('.popup-edit').find('.parameter_unit_update').empty().append(parameter_unit);
                               }});
                               //alert(data.test_parameter_unit);

                               current_popup.parents('.popup-edit').find('.parameter_format_update').empty().append("<option value='"+data.test_parameter_unit+"'>"+data.test_parameter_unit+"</option>");

                    }else{
                        //alert('others');
                         var paremeter_unit = data.test_parameter_unit;
                         //alert(data.test_parameter_type);
                        $.ajax({
                             type: "POST",
                             url: "functions/parameter_unitfunction.php?param_unit_for_test_edit=true",
                             data:{'type':data.test_parameter_type},
                             cache: false,
                             dataType:'json',
                              success: function(data) {
                                  var parameter_unit = '<option></option>';
                                  $.each(data, function(i){
                                      if(data[i].parameterunit == paremeter_unit ){
                                          parameter_unit += "<option value='"+data[i].parameterunit+"' selected>"+data[i].parameterunit+"</option>";
                                      }
                                      else{
                                          parameter_unit += "<option value='"+data[i].parameterunit+"'>"+data[i].parameterunit+"</option>";
                                      }
                                  });
                                  //alert(data);
                                  current_popup.parents('.popup-edit').find('.parameter_unit_update').empty().append(parameter_unit);
                              }});

                              current_popup.parents('.popup-edit').find('.parameter_format_update').empty().append('<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>');

                              current_popup.parents('.popup-edit').find('.parameter_format_update option[value="'+data.test_parameter_format+'"]').attr('selected','selected');

                    }
                    //current_popup.parents('.popup-edit').find('.parameter_unit_update option[value="'+data.test_parameter_unit+'"]').attr('selected','selected');
                     current_popup.parents('.popup-edit').find('.parameter_update').val(test_attr_id);
                     current_popup.parents('.popup-edit').find('.test_update_id').val(data.test_id);
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
                     //$('.edit_test_sport option[value="'+obj.sports_id+'"]').attr('selected','selected');
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
                  url: "functions/test_battery_functions.php?getsportsdata=true",
                  data:{'id':test_battery_id},
                  cache: false,
                  success: function(data) {
                      var obj = JSON.parse(data);
                      $.each(obj, function(i){
                          $('input.sprts_get:checkbox[value="'+obj[i].wc_testbattery_sports_id +'"]').attr('checked', 'checked');
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
        $(document).on('change','.parameter_type_add',function(){
            var parameter_type_count = 0;
            var parametet_type = $(this).val();
            $('#test_form .parameter_type_add').each(function(index) {
                if($(this).val() == parametet_type){
                    parameter_type_count++;
                }
            });
            //alert(parameter_type_count);
            if(parameter_type_count == 2){
                //alert('already exist!');
                success_align();
	           $('.success_msg span').html('already exist!');
	           $('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
	           $('.success_msg').show();
	           $('.popup_fade').show();
	           document.body.style.overflow = 'hidden';
                $(this).prop('selectedIndex',0);
                $(this).parents('.clone_content').find('.paremeter_unit_add').empty().append('<option>UNIT</option>');
            }
        });

        $(document).on('change','.parameter_type_update',function(){
            var test_id = $(this).parents('#test_updation_form').find('.test_update_id').val();
            var parameter_id =$(this).val();
            var current_select = $(this).prop('selectedIndex');
            var current_content = $(this);
            $.ajax({
                 type: "POST",
                 url: "functions/test_functions.php?check_parameter=true",
                 data:{'testid':test_id,'param_name':parameter_id},
                 cache: false,
                 success: function(data) {

                    if(data.trim() == 'error'){
                        //alert('already exist!');
                        success_align();
			            $('.success_msg span').html('already exist!');
			            $('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
			            $('.success_msg').show();
			            $('.popup_fade').show();
			            document.body.style.overflow = 'hidden';
                        current_content.prop('selectedIndex',0);
                        current_content.parents('#test_updation_form').find('.parameter_unit_update').empty().append('<option>UNIT</option>');
                        current_content.parents('#test_updation_form').find('.parameter_format_update').prop('selectedIndex',0);

                    }
                }
             });
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
		$(document).on('click','.alert_btn',function(){
		  	$('.success_msg').hide();
		  	$('.popup_fade').hide();
		  	document.body.style.overflow = 'auto';
		  	location.reload();
	  	}); 
	  	$(document).on('click','.alert_btn_without_refresh',function(){
		  	$('.success_msg').hide();
		  	$('.popup_fade').hide();
		  	document.body.style.overflow = 'auto';
		  	
	  	}); 
        $(document).delegate('.cancel_btn','click',function(){
            $('.popup_fade').hide();
            $('.state_div,.delete_div,.login_div,.register_div,.test_div,.district_div,.test_battery_div,.range_div,.paramter_div,.athletes_div,.createschedule_div').hide();
            document.body.style.overflow = 'auto';
             location.reload();

        });


        $('.submenu_list li').hide();
        $('.master-list li').click(function(e){
          e.stopPropagation();
        });
        $(".master-holder").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('.master-list li').show();
            $(".transaction-list li").hide();
        });
        $(document).click(function() {
            $('.master-list li').hide();
        });

        $('.transaction-list li').click(function(e){
          e.stopPropagation();
        });
        $(".transaction-holder").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('.transaction-list li').show();
            $(".master-list li").hide();
        });
        $(document).click(function() {
            $('.transaction-list li').hide();
        });





    	// Autocomplete results for states list while add
    	var states_list = [];
    	$('.states_list li').each(function(){
    		states_list.push($(this).text());
      });
    	$('.statesname,.edit_states_name').focus(function (e) {
    		$(this).autocomplete({
    			source: states_list.sort(),
    	 	});
    	});

      // Autocomplete results for states list while edit
      var edit_states_list = [];
      $('.edit_states_list li').each(function(){
        edit_states_list.push($(this).text());
      });
      $('.edit_states_name').focus(function (e) {
        $(this).autocomplete({
          source: edit_states_list.sort(),
        });
      });

      // Autocomplete results for district list
      //var district_list = [];
      $('.choose_state,.edit_choose_state').on('change',function () {
          selected_state = $('option:selected',this).text();
          form_data = {'states_name':selected_state};
          // district_list.length = 0;
          d1_list.length = 0;
           $.ajax({
                 type: "POST",
                 url: "functions/district_function.php?loaddistrict=true",
                 data: form_data,
                 cache: false,
                 success: function(data) {
                  if(data){
                    var obj = JSON.parse(data);
                    $.each(obj, function(i){
                      // district_list.push(obj[i]);
                      d1_list.push(obj[i]);
                    });
                  }
                 }
             });
       });

      $(".athlete_state_act").on('change',function () {
        selected_state = $('option:selected',this).text();
        selected_state_id = $('option:selected',this).val();
        form_data = {'states_name':selected_state,'states_id':selected_state_id};
         $.ajax({
               type: "POST",
               url: "functions/district_function.php?loaddistrictfromdb=true",
               data: form_data,
               cache: false,
               success: function(data) {
                var obj = JSON.parse(data);
                var options = '<option value="">District</option>';
                  $.each(obj, function(i){
                    options += '<option value="'+obj[i].district_id+'">'+obj[i].district_name+'</option>';
                  });
                  $('.athlete_district_act').html(options);
               }
           });
       });


        // load test and category on change Testbattery in range form
        $("[name=range_testbattery],[name=edit_range_testbattery]").on('change',function () {
          // alert("change")
          selected_testbattery_id = $('option:selected',this).val();
          form_data = {'testbattery_id':selected_testbattery_id};
           $.ajax({
                 type: "POST",
                 url: "functions/range_function.php?loaddatafromdb=true",
                 data: form_data,
                 cache: false,
                 success: function(data) {
                    data =  data.split('#####');
                    var category_obj = JSON.parse(data[0]);
                    var test_obj = JSON.parse(data[1]);

                    var cat_options = '<option></option>';
                    $.each(category_obj, function(i){
                      cat_options += '<option value="'+category_obj[i].categories_id+'">'+category_obj[i].categories_name+'</option>';
                    });
                    $('.range_category').html(cat_options);

                    var test_options = '<option></option>';
                    $.each(test_obj, function(i){
                      test_options += '<option value="'+test_obj[i].test_id+'">'+test_obj[i].test_name+'</option>';
                    });
                    $('.range_test').html(test_options);
                    $('.range_parameter').html('');
                    //newly added
                    $('.range_note').hide();

                 }
             });
       });

       $(document).on('focus','.districts',function(e){
           $(this).autocomplete({
           // source: district_list,
           source: d1_list.sort(),
           });
       });
       
       // Overrides the default autocomplete filter function to search only from the beginning of the string
       $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
       };

        $('.sports_form').submit(function(e) {
          e.preventDefault();
          var res = true;
          $('input[type="text"]',this).each(function() {
            if($(this).val().trim() == "") {
            res = false;
            }
          });
         if(res){
              var form_data = $(this).serialize();
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
                     //alert('Sports already exist!');
                     success_align();
	             	    $('.success_msg span').html('Sport already exist!');
	             	    $('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
	                    $('.success_msg').show();
	                    $('.popup_fade').show();
	                    document.body.style.overflow = 'hidden';
                   }else{
                       //alert('Sport inserted successfully!');
                       	success_align();
                       	if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	             	    $('.success_msg span').html('Sport inserted successfully!');
	                    $('.success_msg').show();
	                    $('.popup_fade').show();
	                     document.body.style.overflow = 'hidden';
                       //location.reload();
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
                     //alert(result_split[1]);
                     success_align();
	                   $('.success_msg span').html(result_split[1]);
	                   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
	                  html ="<tr class='align_center delete_color'>\
                     <input type='hidden' name='states_id' value="+result_split[2]+">\
                     <td class='t_states_id'>"+result_split[2]+"</td>\
                        <td class='t_states_name'>"+result_split[3]+"</td>\
                        <td>\
                          <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                          <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                        </td></tr> ";
                     // $('.state_table tr:last').after(html);
                     document.states_form.reset();
                     document.body.style.overflow = 'hidden';
                     //location.reload();
                   }
                   else{
                    // $('.add_states_error').text(result_split[1]).show();
                    alert(result_split[1]);
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
                      //$('.parameter_type_table tr:first').after(html);
                       success_align();
	                   $('.success_msg span').html('Parameter Type inserted successfully!');
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                      document.parameter_type_form.reset();
                      //alert('Parameter Type inserted successfully!');
                      //location.reload();
                      document.body.style.overflow = 'hidden';
                    }
                    else if(result_split[0].indexOf("duplicate") !== -1){
                    	alert('Parameter Type inserted successfully!');
                        location.reload();
                    }
                    else{
                        //alert('Parameter Type already exists!');
                        //location.reload();
                        success_align();
		                $('.success_msg span').html('Parameter Type already exists!');
		                $('.success_msg').show();
		                $('.popup_fade').show();
	                    document.body.style.overflow = 'hidden';
                    }
                    }
                })
             }
         });

        $('.edit_state_form').submit(function(e){
            e.preventDefault();
          var res = true;
          $('input[type="text"]',this).each(function() {
            if($(this).val().trim() == "") {
            res = false;
            }
          });
          if(res){
          var form_data = $(this).serializeArray();
            $.ajax({
               type: "POST",
               url: "functions/edit_and_delete_function.php?editdata=true",
               data: form_data,
               cache: false,
               success: function(html) {
                   var result_split = html.split('#');
                   if (result_split[0].indexOf("success") !== -1){
                     // $('.edit_states_error').hide();
                     $('.state_table').find("input[value="+result_split[2]+"]").siblings('.t_states_name').html(result_split[3]);
                     success_align();
	         	     $('.success_msg span').html(result_split[1]);
	                 $('.success_msg').show();
	                 $('.popup_fade').show();
                     $('.state_div, .close_btn').hide();
                     document.body.style.overflow = 'hidden';
                     //alert(result_split[1]);
                     //location.reload();
                   }
                   else{
                    // $('.edit_states_error').text(result_split[1]).show();
                    alert(result_split[1]);
                   }
               }
           });
          }
        });

        $(document).delegate('.delete_state','click',function(){
            $('#delete_id').val($(this).attr("data-value"));
            // // $('.popup_fade').show();
            // // $('.delete_div, .close_btn').show();
            // $(this).parents('td').children('.delete_div').show();
            // // $(this).parents('tr').siblings('.state_div').hide();
            $(this).parents('tr').find('.delete_div').show();
            $(this).parents('tr').siblings('tr').find('.delete_div').hide();
            $(this).parents('tr').siblings().children('.range_div').hide();
            document.body.style.overflow = 'auto';
        });

        // Jquery and ajax functionality for district
        $('.districts_form').submit(function(e){
            e.preventDefault();
            var res = true;
            $('input[type="text"],select',this).each(function() {
              if($(this).val().trim() == "") {
                $(this).siblings('.hided').addClass('custom_error').show();
                res = false;
              }
            });
            if($(":input").siblings('span').hasClass("custom_error")){
              res =  false;
            }
            if(res){
              var form_data = $(this).serialize();
              $.ajax({
                   type: "POST",
                   url: "functions/district_function.php?adddata=true",
                   data: form_data,
                   cache: false,
                   success: function(html) {
                       if(html){
                           //alert(html+' District already exists!');
                           //location.reload();
                           success_align();
		                   $('.success_msg span').html(html+' District already exists!');
		                   $('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
		                   $('.success_msg').show();
		                   $('.popup_fade').show();
		                   document.body.style.overflow = 'hidden';
                       }else{
                           //alert('District inserted successfully!');
                           success_align();
		                   $('.success_msg span').html('District inserted successfully!');
		                   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                   $('.success_msg').show();
		                   $('.popup_fade').show();
		                   document.body.style.overflow = 'hidden';
                            //location.reload();
                        }
                   }
              });
            }
        });

        $('.edit_district_form').submit(function(e){
            e.preventDefault();
          var res = true;
          $('input[type="text"], select',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
            }
          });
          if(res){
          var form_data = $(this).serialize();
          // alert(JSON.stringify(form_data));
            $.ajax({
               type: "POST",
               url: "functions/district_function.php?editdata=true",
               data: form_data,
               cache: false,
               success: function(html) {
                   var result_split = html.split('#');
                   if (result_split[0].indexOf("success") !== -1){
                     // $('.edit_states_error').hide();
                     //alert(result_split[1]);
                     $('.district_table').find(".t_district_id:contains("+result_split[2]+")").next('.t_district_name').html(result_split[3]);
                     success_align();
	                   $('.success_msg span').html(result_split[1]);
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                     $('.district_div, .close_btn').hide();
                     document.body.style.overflow = 'hidden';
                     //location.reload();
                   }
                   else{
                    // $('.edit_district_error').text(result_split[1]).show();
                    alert(result_split[1]);
                   }
               }
           });
          }
        });

        // end (added by kalai)

        $('.sports_update_form').submit(function(e) {
          e.preventDefault();
          var res = true;
          $('input[type="text"]',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
            }
          });
          if(res){
            var form_data = $(this).serialize();
            $.ajax({
               type: "POST",
               url: "functions/sports_function.php",
               data: form_data,
               cache: false,
               success: function(html) {
                   //alert(html);
                   if(html=='error'){
                     //alert('Sport edited successfully!');
                     success_align();
                     $('.success_msg span').html('Sport edited successfully!');
                     $('.success_msg').show();
                     $('.popup_fade').show();
                    $('.state_div,.delete_div').hide();
                    document.body.style.overflow = 'hidden';
                    //location.reload();
                   }else{
                    //alert(html);
                    var sports_split = html.split('-');
                    //alert(sports_split[1]);
                    $('#sports_table').find("input[value="+sports_split[1]+"]").siblings('.sports_name').html(sports_split[0]);
                    //alert('Sport edited successfully');
                     success_align();
                     $('.success_msg span').html('Sport edited successfully!');
                     $('.success_msg').show();
                     $('.popup_fade').show();
                    $('.state_div,.delete_div').hide();
                    document.body.style.overflow = 'hidden';
                    //location.reload();
                   }

               }
           });
          }
        });
        $(document).on('click','.yes_btn',function() {
            var del_id =$('#delete_id').val();
            if (window.location.href.indexOf("category.php") !== -1){
                var form_data = {'category_del':'1','del_id':del_id};
                $.ajax({
                   type: "POST",
                   url: "functions/category_function.php",
                   data: form_data,
                   cache: false,
                   success: function(html) {
                       //alert('Category deleted successfully!');
                       $('#category_table').find(".category_id:contains("+html+")").parents('tr').remove();
                       success_align();
	                   $('.success_msg span').html('Category deleted successfully!');
	                    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                       $('.state_div,.delete_div').hide();
                       document.body.style.overflow = 'hidden';
                       //location.reload();
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
                       //alert('Sport deleted successfully! ');
                       $('#sports_table').find(".sports_id:contains("+html+")").parents('tr').remove();
                       success_align();
	                   $('.success_msg span').html('Sport deleted successfully!');
	                    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                       $('.state_div,.delete_div').hide();
                       document.body.style.overflow = 'hidden';
                       //location.reload();
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
                      //alert(result_split[1]);
                      $('.state_table').find("input[value="+result_split[2]+"]").parents('tr').remove();
                      success_align();
	                   $('.success_msg span').html(result_split[1]);
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                      $('.state_div,.delete_div').hide();
                      document.body.style.overflow = 'hidden';
                      //location.reload();
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
                      //alert(result_split[1]);
                      $('.district_table').find(".t_district_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                       success_align();
	                   $('.success_msg span').html(result_split[1]);
	                    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                      $('.state_div,.delete_div').hide();
                      document.body.style.overflow = 'hidden';
                      //location.reload();
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
                      //alert(result_split[1]);
                      $('.athletes_table').find("input[value="+result_split[2]+"]").parents('tr').remove();
                      success_align();
	                   $('.success_msg span').html(result_split[1]);
	                    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                      $('.state_div,.delete_div').hide();
                      document.body.style.overflow = 'hidden';
                      //location.reload();
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
                      //alert(result_split[1]);
                      $('.createschedule_table').find("input[value="+result_split[2]+"]").parents('tr').remove();
                       success_align();
	                   $('.success_msg span').html(result_split[1]);
	                    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                      $('.createschedule_div,.delete_div').hide();
                      document.body.style.overflow = 'hidden';
                      //location.reload();
                     }
                     // location.reload();
                     }
                 });
           } else if (window.location.href.indexOf("test.php") !== -1){
               var delete_data = $(this).attr('data-delete');
               if(delete_data.trim()=='test_name'){
                   var form_data = {'delete_id':$(this).attr('data-id')};
                   //alert(JSON.stringify(form_data));
                   $.ajax({
                        type: "POST",
                        url: "functions/test_functions.php?delete_test_name=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
                         //alert('Test deleted successfully!');
                         success_align();
		                 $('.success_msg span').html('Test deleted successfully!');
		                  if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                 $('.success_msg').show();
		                 $('.popup_fade').show();
                         $('.state_div,.delete_div').hide();
                         document.body.style.overflow = 'hidden';
                         //location.reload();
                        }
                    });
               }else if(delete_data.trim()=='test_attribute'){
                   var form_data = {'delete_test_id':$(this).attr('data-test-id'),'delete_id':$(this).attr('data-id')};
                   //alert(JSON.stringify(form_data));
                   $.ajax({
                        type: "POST",
                        url: "functions/test_functions.php?delete_test_attribute=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
						 //alert('Test parameter deleted successfully!');
                         success_align();
		                 $('.success_msg span').html('Test parameter deleted successfully!');
		                  if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                 $('.success_msg').show();
		                 $('.popup_fade').show();
                         $('.state_div,.delete_div').hide();
                         document.body.style.overflow = 'hidden';
                         //location.reload();
                        }
                    });
               }

           } else if (window.location.href.indexOf("test_battery.php") !== -1){
               var delete_data = $(this).attr('data-delete');
               if(delete_data.trim()=='test_battery_name'){
                   var form_data = {'delete_id':$(this).attr('data-id')};
                   //alert(JSON.stringify(form_data));
                   $.ajax({
                        type: "POST",
                        url: "functions/test_battery_functions.php?delete_test_battery_name=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
                            //alert(html);
                        //alert('Test Battery Name deleted successfully!');
                         success_align();
		                 $('.success_msg span').html('Test Battery Name deleted successfully!');
		                  if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                 $('.success_msg').show();
		                 $('.popup_fade').show();
                         $('.state_div,.delete_div').hide();
                         document.body.style.overflow = 'hidden';
                         //location.reload();
                        }
                    });
               }else if(delete_data.trim()=='test_battery_attribute'){
                   var form_data = {'delete_id':$(this).attr('data-id')};
                   //alert(JSON.stringify(form_data));
                   $.ajax({
                        type: "POST",
                        url: "functions/test_battery_functions.php?delete_test_battery_name=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
                             //alert('Test battery deleted successfully');
                             success_align();
			                 $('.success_msg span').html('Test battery deleted successfully');
			                  if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
			                 $('.success_msg').show();
			                 $('.popup_fade').show();
                             $('.state_div,.delete_div').hide();
                             document.body.style.overflow = 'hidden';
                             //location.reload();
                        }
                    });
               }
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
                        //alert(result_split[1]);
                        $('.range_table').find(".t_range_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                        success_align();
		                 $('.success_msg span').html(result_split[1]);
		                  if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                 $('.success_msg').show();
		                 $('.popup_fade').show();
                        $('.delete_div').hide();
                        document.body.style.overflow = 'hidden';
                        //location.reload();
                      }
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
                      //alert('Parameter Type deleted successfully! ');
                      success_align();
                 	  $('.success_msg span').html('Parameter Type deleted successfully!');
                 	   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                  $('.success_msg').show();
	                  $('.popup_fade').show();
                      $('.state_div,.delete_div').hide();
                      document.body.style.overflow = 'hidden';
                      //location.reload();

                     }
                 });
           }else if (window.location.href.indexOf("assign_schedule.php") !== -1){
               var delete_data = $(this).attr('data-delete');
               if(delete_data.trim()=='assign_schedule_name'){
                   var form_data = {'delete_id':$(this).attr('data-id')};
                   //alert(JSON.stringify(form_data));
                   $.ajax({
                        type: "POST",
                        url: "functions/assign_schedule_function.php?delete_assign_create_schedule=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
                            //alert(html);
                        //alert('Schedule deleted successfully');
                        success_align();
	                 	 $('.success_msg span').html('Schedule deleted successfully');
	                 	  if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                 $('.success_msg').show();
		                 $('.popup_fade').show();
                         $('.state_div,.delete_div').hide();
                         document.body.style.overflow = 'hidden';
                         //location.reload();
                        }
                    });
               }else if(delete_data.trim()=='assign_schedule_attribute'){
                   var form_data = {'cate_id':$(this).attr('data-category'),'sche_id':$(this).attr('data-schedule')};
                   //alert(JSON.stringify(form_data));
                   $.ajax({
                        type: "POST",
                        url: "functions/assign_schedule_function.php?delete_assign_create_schedule_and_cate=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
                             //alert('Assign Schedule deleted successfully');
                             success_align();
		                 	 $('.success_msg span').html('Schedule category deleted successfully!');
		                 	 if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       			$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       			}
			                 $('.success_msg').show();
			                 $('.popup_fade').show();
                             $('.state_div,.delete_div').hide();
                             document.body.style.overflow = 'hidden';
                             //location.reload();
                        }
                    });
               }
           }    
           else if (window.location.href.indexOf("parameter_unit.php") !== -1){
               //alert('dsfsdfds');
                var delete_name = $(this).attr('data-delete');
                if(delete_name == 'parametertype_name'){
                var form_data = {'delete_id':$(this).attr('data-id')};
                $.ajax({
                     type: "POST",
                     url: "functions/parameter_typefunction.php?deletedata=true",
                     data: form_data,
                     cache: false,
                     success: function(html) {
                        //alert(html);
                      //alert('Parameter Type deleted Successfully! ');
                      success_align();
                 	  $('.success_msg span').html('Parameter Type deleted Successfully!');
                 	   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                  $('.success_msg').show();
	                  $('.popup_fade').show();
                      $('.state_div,.delete_div').hide();
                      document.body.style.overflow = 'hidden';
                      //location.reload();

                     }
                 });
             }
             else{
                 var form_data = {'delete_id':$(this).attr('data-id')};
                 $.ajax({
                      type: "POST",
                      url: "functions/parameter_unitfunction.php?deletedata=true",
                      data: form_data,
                      cache: false,
                      success: function(html) {
                          //alert(html);
                       //alert('Parameter unit deleted Successfully! ');
                        success_align();
                 	   $('.success_msg span').html('Parameter unit deleted Successfully!');
                 	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                       $('.state_div,.delete_div').hide();
                       document.body.style.overflow = 'hidden';
                       //location.reload();

                      }
                  });
             }

             }
        });
        $(document).on('click','.no_btn',function(){
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
                     //alert('Category already exist!');
                     success_align();
                 	   $('.success_msg span').html('Category already exist!');
                 	   $('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                   }else{
                     //alert('Category inserted successfully!');
                     //$('#category_table tr:last').after(html);
                    // location.reload();
                    success_align();
                 	   $('.success_msg span').html('Category inserted successfully!');
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                   }
               }
           });
          }
        });

        $('.category_update_form').submit(function(e) {
          e.preventDefault();
          var res = true;
          $('input[type="text"]',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
            }
          });
          if(res){
            var form_data = $(this).serialize();
           //alert(form_data);
            $.ajax({
               type: "POST",
               url: "functions/category_function.php",
               data: form_data,
               cache: false,
               success: function(html) {
                   //alert(html);
                   if(html=='error'){
                     //alert('Category edited successfully!');
                      success_align();
                 	   $('.success_msg span').html('Category edited successfully!');
                 	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                    $('.state_div,.delete_div').hide();
                    document.body.style.overflow = 'hidden';
                   }else{

                     //alert('Category edited successfully!');
                     //location.reload();
                     var category_split = html.split('-');
                    $('#category_table').find("input[value="+category_split[1]+"]").next('.category_name').html(category_split[0]);
                    //alert('Sports name updated successfully');
                    success_align();
             	    $('.success_msg span').html('Category edited successfully!');
             	     if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
                    $('.success_msg').show();
                    $('.popup_fade').show();
                    $('.state_div,.delete_div').hide();
                    document.body.style.overflow = 'hidden';

                   }

               }
           });
          }
        });

       var current_id = 1;
        $(document).on('click','.parameter_btn',function(e){
            if(($('.clone_content:last').children().find('.parameter_name').val() == '') || ($('.clone_content:last').children().find('.parameter_type').val() == '') || ($('.clone_content:last').children().find('.parameter_unit').val() == '') || ($('.clone_content:last').children().find('.parameter_format').val() == '') || ($('.clone_content').children().find('.parameter_name').val() == '') || ($('.clone_content').children().find('.parameter_type').val() == '') || ($('.clone_content').children().find('.parameter_unit').val() == '') || ($('.clone_content').children().find('.parameter_format').val() == ''))
            {            
              e.preventDefault();            
            }
            else{          
            var id = current_id+1;
            nextElement($('.clone_content:last'));
            $('.clone_content:last').attr('id','parameter_count'+id);
           }
        });

        $(".reset_form,.test_submit_act").on('click', function() {
          $("span .custom_error").hide();
          $(".custom_error").removeClass("custom_error");
        });

        $('#test_form .test_submit_act').click(function(e) {
          e.preventDefault();  
          var submitOK = true;
          $('#test_form').find('input[type="text"],select').each(function() {
                if ($(this).val() == "") {
                      $(this).next().addClass('custom_error');                     
                      submitOK = false;
                      return false;  
               }
          });
          $('.clone_content:last').children().find('input[type="text"],select').each(function() {
             if ($(this).val() == ""){
                      $(this).next().addClass('custom_error');                      
                      var cntrl=$('.clone_content:last').children().find('> select');
                          $(cntrl).each(function(index) {
                          if (index==""){                          
                            $(cntrl).next().addClass('custom_error');
                            submitOK = false;
                            return false; 
                          }
                          else  
                            $(cntrl).next().removeClass('custom_error');
                      });                     
               }
          });
          if (submitOK) {
                $(this).next().removeClass('custom_error');              
                $('#test_form').submit();
          }
        });

        $(".reset_form").on('click', function() {
           $(".parameter_count").each(function() {
              if($('.clone_content').length !=1){
                $('.clone_content:last').remove();
              }
            });
            
            if($(this).parents('form').attr('id') == 'test_updation_form'){
            	
            	$(this).parents('form').find('.parameter_type_update option').removeAttr('selected').prop('selectedIndex',0);
            	$(this).parents('form').find('.parameter_unit_update').empty().append('<option>Unit</option>');
            	$(this).parents('form').find('.parameter_format_update').empty().append('<option>Format</option>');
            }
        });

        $('.add_createschedule_act,.edit_createschedule_act,.add_athletes_act,.edit_athletes_act').on('click', function(){
         var x = document.getElementById('athletes_mobile1').value;
          if($("#athletes_mobile1").siblings('span').hasClass("help-block form-error")){
            return false;
          }
          if (x.length == 10) {
            $('#athletes_mobile1').next('span').hide();
            return true;
          }
        });         
       

        function nextElement(element){
        	var last_id = parseInt(element.find('.parameter_count').val());
            var newElement = element.clone();
            var id = last_id+1;
            current_id = id;
            newElement.find('.parameter_count').val(id);
            newElement.find('.parameter_name').removeAttr('name').attr('name', 'parameter_name'+id).val('');
            newElement.find('#type').removeAttr('name').attr('name', 'type'+id);
            newElement.find('#unit').removeAttr('name').attr('name', 'unit'+id).removeClass('error').removeAttr('style').empty().append("<option value='' selected>UNIT</option>");
            // newElement.find('#unit').next('span').remove();
            // newElement.find('label').remove();
            newElement.find('#format').removeAttr('name').attr('name', 'format'+id).empty().append('<option value="">Format</option>');
            newElement.appendTo($(".parameter_holder1"));
        }

        // var test_id = 1;
        // $('.add_athelete').click(function(){
            // nextElement1($('.assign_clone_content:last'));
        // });
              var test_id = 1;  
           $(document).on('click','.add_athelete',function(e){
            if($('.assign_clone_content:last').children().find('#combobox').val() == '' || $('.assign_clone_content:last').children().find('#bib').val() == '' ){
              $('.assign_clone_content:last').children().find('#combobox').next().next().addClass('custom_error');
              $('.assign_clone_content:last').children().find('#bib').next().addClass('custom_error');
              $('.assign_clone_content:last').children().find('#combobox').next().next().next().next().remove('span');                   
               e.preventDefault();
            }        
            else{
              $('.assign_clone_content:last').children().find('input[type="text"]').next().removeClass('custom_error');
              $('.assign_clone_content:last').children().find('#combobox').next().next().removeClass('custom_error');
              $('.assign_clone_content:last').children().find('#bib').next().removeClass('custom_error');
              nextElement1($('.assign_clone_content:last'));
           }
           return false;     
        });

        function nextElement1(element){
            var current_id = parseInt(element.find('.assign_athelete_count_add').val());
            var newElement = element.clone();
            var id = current_id+1;
            test_id = id;
            newElement.find('.assign_athelete_count_add').val(id);
            newElement.find('.athlete_name').removeAttr('name').attr('name', 'athlete_name'+id).removeClass('class name');
            newElement.find('.athlete_bib').removeAttr('name').attr('name', 'athlete_bib'+id).val('');
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
                          // alert(html.athlete_dob);
                          var res = html.athlete_dob.split('-');
                          var new_date = res[2]+'/'+res[1]+'/'+res[0];
                            newElement.find('.dob').val(new_date).attr('disabled', 'disabled');
                            //alert(newElement.html());
                            newElement.find('.mobile').val(html.athlete_mobile).attr('disabled', 'disabled');
                            newElement.find('.athlete_bib').val('');
                            newElement.find('#combobox').next().next().removeClass('custom_error');

                       }
                   });
                }
            });
            newElement.find('.custom-combobox:nth-child(3)').remove();
            newElement.appendTo($(".assign_content_holder"));

        }

        // $(document).on('click','.edit_assign_schedule_add_btn',function(){
            // var element = $(this).parents('#edit_assign_schedule_form').find('.assign_clone_content_edit:last');
            // var last_id = parseInt(element.find('.assign_athelete_count_edit').val());
            // //alert(last_id);
            // var newElement = element.clone();
            // var id = last_id+1;
            // test_id = id;
            // //alert(newElement.find('.athlete_name option:selected').html());
            // newElement.find('.assign_athelete_count_edit').val(id);
            // //newElement.find('.athlete_name').removeAttr('name').attr('name', 'athlete_name'+id);
            // newElement.find('.athlete_name option:selected').removeAttr('selected');
            // //newElement.find('.athlete_bib').removeAttr('name').attr('name', 'athlete_bib'+id).val('');
            // newElement.find('.dob').val('');
            // newElement.find('.athlete_bib').val('');
            // //newElement.find('.create_schedule_update_id').removeAttr('name').attr('name', 'create_schedule_update_id'+id);
            // newElement.find('.mobile').val('');
            // newElement.find('.custom-combobox:nth-child(3)').remove();
            // newElement.appendTo($(".assign_clone_content_edit_holder"));
		// 
        // });
        var test_id = 1;  
           $(document).on('click','.edit_assign_schedule_add_btn',function(e){            
            if($('.assign_clone_content_edit:last').children().find('#bibo, #athlete_sel').val() == ''){   
            e.preventDefault();          
              $('.assign_clone_content_edit:last').children().find('#bibo').next().addClass('custom_error');
              $('.assign_clone_content_edit:last').children().find('#athlete_sel').next().next().addClass('custom_error');                      
            }           
            else{
              $('.assign_clone_content_edit:last').children().find('#bibo').next().removeClass('custom_error');
              $('.assign_clone_content_edit:last').children().find('#athlete_sel').next().next().removeClass('custom_error');
              newElement($('.assign_clone_content_edit:last'));
           }
           return false;
     
        });

        function newElement(element){
          var last_id = parseInt(element.find('.assign_athelete_count_edit').val()); 
            var newElement = element.clone();
            var id = last_id+1;
            test_id = id;            
            newElement.find('.assign_athelete_count_edit').val(id);           
            newElement.find('.athlete_name option:selected').removeAttr('selected');            
            newElement.find('.dob').val('');
            newElement.find('.athlete_bib').val('');           
            newElement.find('.mobile').val('');
            newElement.find('.custom-combobox:nth-child(3)').remove();   
            newElement.appendTo($(".assign_clone_content_edit_holder"));
        }  

       // $(document).on('click','.edit_assign_schedule_delete',function(){
        // if($('.assign_clone_content_edit').length !=1){
          // $('.assign_clone_content_edit:last').remove();
        // }
        // return false;
        // });        

        $('.reset_form_edit_schedule').click(function(){   
          $("#bibo").next('span').removeClass('custom_error');          
           $(".assign_clone_content_edit").each(function() {
               if($('.assign_clone_content_edit').length !=1){
                   $('.assign_clone_content_edit:last').remove();
               }
           });
       });
        
       
       $('.reset_form_assign_schedule').click(function(){   
          $("#bib").next('span').removeClass('custom_error');
         $("#combobox").next().next('span').removeClass('custom_error');
           $(".assign_clone_content").each(function() {
               if($('.assign_clone_content').length !=1){
                   $('.assign_clone_content:last').remove();
               }
           });
       });

         $('.schedule_submit').on('click',function(e){         
          var res = true;         
            if($('.assign_clone_content_edit:last').children().find('#bibo').val().trim() == "" || $('.assign_clone_content_edit:last').children().find('#athlete_sel').val() == '') {
              e.preventDefault();
             $('.assign_clone_content_edit:last').children().find('#bibo').next('span').addClass('custom_error');
             $('.assign_clone_content_edit:last').children().find('#athlete_sel').next('span').addClass('custom_error');
             res = false;
              // alert('false');
            }       
          if(res){
            $('.assign_clone_content_edit:last').children().find('#bibo').next('span').removeClass('custom_error');
            $('.assign_clone_content_edit:last').children().find('#athlete_sel').next('span').removeClass('custom_error');
            return true;
          }
        });
        // var dist_id = 1;
        // $('.district_add').on('click',function(e){
        //     if($('.district_clone_content:last').find('input').val() == ''){
        //       e.preventDefault();
        //      $('.district_clone_content :last').find('input').siblings('.add_district_error').next().removeClass('category_text');
        //       $('.district_clone_content:last').find('input').siblings('.add_district_error').next().addClass('help-block form-error');
        //     }
        //     else{
        //       if($('.district_clone_content:last').find('input').val() !== ''){
        //         // var id = dist_id+1;
        //           $('.district_clone_content:last').find('input').siblings('.add_district_error').next().removeClass('help-block form-error');
        //           $('.district_clone_content :last').find('input').siblings('.add_district_error').next().addClass('category_text');
        //         nextElement2($('.district_clone_content:last'));
        //         // $('.district_clone_content').find('input[type="hidden"]').attr('id','district_add_for_clone'+id);
        //       }
        //     }
        // });

        var dist_id = 1;
        $('.district_add').on('click',function(e){
            if($('.district_clone_content:last').find('.districts').val() == ''){
              e.preventDefault();
              $('.district_clone_content:last').children().find('input[type="text"]').siblings('.hided').addClass('custom_error');
            }
            else{
              if($('.district_clone_content:last').find('input').val() !== ''){
                $('.district_clone_content:last').children().find('input[type="text"]').siblings('.hided').removeClass('custom_error');
                nextElement2($('.district_clone_content:last'));
                // $('.district_clone_content').find('input[type="hidden"]').attr('id','district_add_for_clone'+id);
              }
            }
        });

        function nextElement2(element){
            var newElement = element.clone();
            newElement.find('.districts').val('');
            newElement.appendTo($(".district_clone"));

        }
        $('.district_remove').click(function(){
          if($('.district_clone_content').length !=1){
            $('.district_clone_content:last').remove();
          }
          return false;
       });
       // $('form[name="district_form"]').submit(function(e){

       //   // var res = true;
       //   $('select, input[type="text"]',this).each(function() {
       //     if($(this).val().trim() == "") {
       //     e.preventDefault();
       //       $(this).next().removeClass('category_text');
       //       $(this).next().addClass('help-block form-error');
       //         $('.district_clone_content :last').find('input').siblings('.add_district_error').next().removeClass('category_text');
       //       $('.district_clone_content:last').find('input').siblings('.add_district_error').next().addClass('help-block form-error');
       //     }
       //   });

       // });

       $('.reset_form_dist').click(function(){
          $('.choose_state').next().find('span').removeClass("help-block form-error");
           $('.choose_state').next().find('span').addClass('hided');
            $('.district_clone_content:last').find('input[type="text"]').siblings('.hided').removeClass('custom_error');
            // $('.district_clone_content :last').children().find('span').removeClass('custom_error');
           $(".district_clone_content").each(function() {
               if($('.district_clone_content').length !=1){
                   $('.district_clone_content:last').remove();
               }
           });
       });
        $(document.body).delegate('.parameter_type_update','change',function() {
            var current = $(this);
            var param_name = $(this).val();
            var this_content = $(this).attr('name');
            //alert(current.parents('.parameter_holder').html());
            $.ajax({
               type: "POST",
               url: "common.php?param_name='true'",
               data: {'parameter_name':param_name},
               cache: false,
               success: function(html) {
                   if(html !=''){
                       current.parents('.parameter_holder').find('.parameter_unit').html(html);
                   }else{
                        current.parents('.parameter_holder').find('.parameter_unit').html("<option value=''>UNIT</option>");
                        //alert('No parameter unit found');
                        success_align();
                 	    $('.success_msg span').html('No parameter unit found');
                       	$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
	                    $('.success_msg').show();
	                    $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                   }
               }
           });
            //$(this).attr('value', $(this).val())
        });
        $(document.body).delegate('.paremeter_unit_add','change',function() {
            var param_unit = $(this).val();
            var param_type = $(this).parents('.schedule_test').find('.parameter_type').val();
            //alert(param_type);
            if(param_type.toLowerCase() == 'time'){
                $(this).parents('.schedule_test').find('.parameter_format').empty().append("<option value="+param_unit+">"+param_unit+"</option>");
            }else{
                $(this).parents('.schedule_test').find('.parameter_format').empty().append("<option value=''>Format</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>");
            }
        });
        $(document.body).delegate('.parameter_unit_update','change',function() {
            //alert($(this).html());
            var param_unit = $(this).val();
            var param_type = $(this).parents('#test_updation_form').find('.parameter_type_update').val().trim();
			//alert(param_type);
            if(param_type.toLowerCase() == 'time'){
                $(this).parents('.parameter_holder').find('.parameter_format').empty().append("<option value="+param_unit+">"+param_unit+"</option>");
            }else{
                $(this).parents('.parameter_holder').find('.parameter_format').empty().append("<option value=''>Format</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>");
            }
        });

        $(document.body).delegate('.parameter_type_add','change',function() {
            //alert($(this).html());
            var current = $(this);
            var param_name = $(this).val();
            var this_content = $(this).attr('name');

            //alert('sdfsdf');
            $.ajax({
               type: "POST",
               url: "common.php?param_name='true'",
               data: {'parameter_name':param_name},
               cache: false,
               success: function(html) {
                   if(html !=''){
                       current.parents('.schedule_test').find('.parameter_unit').html(html);
                   }else{
                        current.parents('.schedule_test').find('.parameter_unit').html("<option value=''>UNIT</option>");
                        //alert('Parameter Unit Not availabel!');
                        success_align();
                 	    $('.success_msg span').html('Parameter Unit Not available!');
                   		$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
	                    $('.success_msg').show();
	                    $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                   }
               }
           });
        });

        //Jquery and Ajax Functionality for Athletes Form added by kalai
        $('#athlete_form').submit(function(e){
         e.preventDefault();
          var res = true;
          $('input[type="text"],select',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;

            }
          });
           if($(".date-dropdowns").next('span').hasClass("help-block form-error")){
              res =  false;
            }
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
                       //alert(result_split[1]);
                       success_align();
                 	    $('.success_msg span').html(result_split[1]);
	                    $('.success_msg').show();
	                    $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
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
                       // $('.athletes_table tr:last').after(html);
                     //location.reload();
                     }
                     else{
                      //alert(result_split[1]);
                       success_align();
                 	    $('.success_msg span').html(result_split[1]);
                 	     if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                    $('.success_msg').show();
	                    $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                     }
                 }
             });
         }
        });

        $('.edit_athletes_form').submit(function(e){
          e.preventDefault();
          var res = true;
          $('input[type="text"],select',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
            }
          });
          if(res){
              var form_data = $(this).serialize();
                $.ajax({
                   type: "POST",
                   url: "functions/athletes_functions.php?editdata=true",
                   data: form_data,
                   cache: false,
                   success: function(html) {
                       var result_split = html.split('#');
                       if (result_split[0].indexOf("success") !== -1){
                         //alert(result_split[1]);
                         $('.athletes_table').find("input[value="+result_split[2]+"]").siblings('.t_athlete_name').html(result_split[3])
                         .siblings('.t_athlete_gender').html(result_split[4]).siblings('.t_athlete_dob').html(result_split[5]).siblings('.t_athlete_address').html(result_split[6]);
                         success_align();
                 	     $('.success_msg span').html(result_split[1]);
	                     $('.success_msg').show();
	                     $('.popup_fade').show();
                         $('.athletes_div, .close_btn').hide();
                         document.body.style.overflow = 'hidden';
                        //location.reload();
                       }
                       else{
                        //alert(result_split[1]);
                        success_align();
                 	     $('.success_msg span').html(result_split[1]);
                 	     if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                   		}
	                     $('.success_msg').show();
	                     $('.popup_fade').show();
	                     document.body.style.overflow = 'hidden';
                       }
                   }
               });
          }
        });

        //Jquery and Ajax Functionality for CreateSchedule Form added by kalai
        $('.createschedule_form').submit(function(e){
          e.preventDefault();
          var res = true;
          $('input[type="text"],select',this).each(function() {
            if($(this).val().trim() == ""){
              res = false;
              // alert('false  comes');
            }
          });
          if(res){
             var form_data = $(this).serialize();
              $.ajax({
                 type: "POST",
                 url: "functions/create_schedule_function.php?adddata=true",
                 data: form_data,
                 cache: false,
                 success: function(html) {
                    var result_split = html.split('#');
                     if (result_split[0].indexOf("success") !==-1){
                      //alert(result_split[1]);
                      success_align();
                 	  $('.success_msg span').html(result_split[1]);
	                  $('.success_msg').show();
	                  $('.popup_fade').show();
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
                       // $('.createschedule_table tr:last').after(html);
                        document.body.style.overflow = 'hidden';
                       //location.reload();
                     }
                     else{
                      //alert(result_split[1]);
                      success_align();
             	      $('.success_msg span').html(result_split[1]);
             	       if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                  $('.success_msg').show();
	                  $('.popup_fade').show();
	                  document.body.style.overflow = 'hidden';
                     }
                 }
             });
          }
        });
        // $(document).on('change','.check_parametertype', function(event) {
           // //alert($(this).attr('data-id'));
           // if(this.checked){
            // $('#param_unit_table tbody').empty();
           // var params_id = $(this).attr('data-id');
           // $.ajax({
                // type: "POST",
                // url: "functions/parameter_unitfunction.php?find_params_units=true",
                // data:{'id':params_id},
                // cache: false,
                // dataType:'json',
                // success: function(data) {
                    // //alert(JSON.stringify(data.test[0].parametertype_name));
                    // $('#test_table tbody').empty();
                    // if(data.test[0]){
                         // var param_dynamic = '';
                         // var selected_param_id = '';
                       // $.each(data.param, function(i){
                           // if(data.test[0].parametertype_name == data.param[i].parametertype_name ){
                           	   // selected_param_id += data.param[i].parametertype_id;
                               // param_dynamic += "<option value='"+data.param[i].parametertype_id+"' selected>"+data.param[i].parametertype_name+"</option>";
                           // }else{
                               // param_dynamic += "<option value='"+data.param[i].parametertype_id+"'>"+data.param[i].parametertype_name+"</option>";
                           // }
                        // });
                         // $.each(data.test, function(i){
                             // $('#param_unit_table tbody').append('\
                   // <tr class=" delete_color">\
               // <input type="hidden" value="'+data.test[i].parameterunit_id+'" id="parameterunit_id">\
                     // <td>'+data.test[i].parameterunit+'</td>\
                     // <td class="popup-edit">\
                      // <span class="edit_state edit_parameter_unit" data-value="'+data.test[i].parameterunit_id+'" data-test-id="'+data.test[i].parameterunit_id+'"><i class="fa fa-pencil-square-o"></i></span>\
                      // <span class="delete_state" data-value="'+data.test[i].parameterunit_id+'"><i class="fa fa-trash-o"></i></span>\
                      // <div class="paramter_div edit_parameterunit_div popup_hidden">\
                          // <code class="close_btn cancel_btn"> </code>\
                          // <div class="edit_title">\
                              // <span class="del_txt">Edit detail</span>\
                          // </div><!--edit_title-->\
                          // <div class="container state-content col-md-12" style="padding: 0px;">\
                              // <div class="col-xs-12 col-md-12 align_margin">\
                                  // <form id="edit_parameter_unit" name="edit_parameter_unit_form">\
                                      // <div class="form-group">\
                                            // <label for="sel1">Select Parameter Type</label>\
                                            // <input type="hidden" class="edit_param_unit_id" name="edit_param_unit_id"  value=""/>\
                                            // <input type = "hidden" name="parameter_type" value="'+selected_param_id+'">\
                                            // <select class="form-control adjust_width adjust_popup_width classic edit_param_type" id="sel1" data-validation-error-msg="Please Select the Type of the Parameter" data-validation="required" disabled>\
                                              // <option value="">Select Parameter Type</option> \
                                               // '+param_dynamic+' \
                                            // </select>\
                                      // </div>\
                                      // <div class="form-group">\
                                          // <label>Enter Parameter Unit</label><br>\
                                          // <input type="text" class="adjust_width adjust_popup_width edit_param_unit" name="parameter_unit" autocomplete="off">\
                                          // <span class="hided">Please enter Parameter Unit</span>\
                                      // </div>\
                                      // <div class="col-md-10 align_right schedule_btn">\
                                          // <input type="submit" class="btn btn-primary clear edit_parameter_unit_act" value="Save">\
                                          // <input type="reset" class="btn btn-primary clear reset_form_param_unit" value="Cancel">\
                                      // </div>\
                                  // </form>\
                              // </div>\
                          // </div>\
                      // </div><!--paramter_div-->\
                // <div class="delete_div delete_test_div">\
                             // <div class="del_title">\
                               // <span class="del_txt">DELETE</span>\
                             // </div>\
                             // <div class="del_content">\
                               // <span class="del_content_txt">Are you sure you want to delete this record?</span>\
                               // <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="parameter_unit_name" data-id ="'+data.test[i].parameterunit_id+' ">\
                               // <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                               // <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                             // </div>\
                   // </div>\
                     // </td>\
               // <input type="hidden" name="test_attribute_id" id="test_attribute_id" value="'+data.test[i].parameterunit_id+'" />\
                   // </tr>');
                         // });
                    // }else{
                        // //alert('No Parameter availabel!');
                        // success_align();
             	        // $('.success_msg span').html('No Parameter availabel!');
	                    // $('.success_msg').show();
	                    // $('.popup_fade').show();
	                    // document.body.style.overflow = 'hidden';
                    // }
                // }
           // });
       // }
       // });
       // / Edit the Parameter Unit module - Start /
         $(document).on('click','.edit_parameter_unit',function(){
            var test_attr_id = $(this).attr("data-value");
            var test_id = $(this).attr("data-test-id");
            var current_popup = $(this);
            $.ajax({
                 type: "POST",
                 url: "functions/parameter_unitfunction.php?getunitdata=true",
                 data:{'id':test_attr_id,},
                 cache: false,
                 dataType:'json',
                 success: function(data) {
                     current_popup.parents('.popup-edit').find('.params_typeoption option[value="'+data.parametertype_name+'"]').attr('selected','selected');
                     current_popup.parents('.popup-edit').find('.params_unit').val(data.parameterunit);

                }
             });
        });

        $('.edit_create_schedule_form').submit(function(e){
            e.preventDefault();         
            var res = true;
            $('input[type="text"],textarea,select',this).each(function() {
              if($(this).val().trim() == "") {
                res = false;
              }
            });
            if(res){
                var form_data = $(this).serialize();
                    $.ajax({
                       type: "POST",
                       url: "functions/create_schedule_function.php?editdata=true",
                       data: form_data,
                       cache: false,
                       success: function(html) {
                           var result_split = html.split('#');
                           if (result_split[0].indexOf("success") !== -1){
                            //alert(result_split[1]);
                             $('.createschedule_table').find("input[value="+result_split[2]+"]").siblings('.t_createschedule_name').html(result_split[3])
                             .siblings('.t_testbattery_name').html(result_split[4]).siblings('.t_createschedule_date').html(result_split[5]).siblings('.t_createschedule_time')
                             .html(result_split[6]).siblings('.t_createschedule_venue').html(result_split[7]);
                             success_align();
	             	         $('.success_msg span').html(result_split[1]);
	             	          if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                     $('.success_msg').show();
		                     $('.popup_fade').show();
                             $('.createschedule_div, .close_btn').hide();
                             document.body.style.overflow = 'hidden';
                             //location.reload();
                           }
                           else{
                            //alert(result_split[1]);
                             success_align();
	             	         $('.success_msg span').html(result_split[1]);
		                     $('.success_msg').show();
		                     $('.popup_fade').show();
		                     document.body.style.overflow = 'hidden';
                           }
                       }
                   });
            }
            });

      function date_check()
      {    
       var day_from = $('.day').val();                     
       var month_from = $('.month').val();                         
       var year_from = $('.year').val();
        var trans_date = day_from + "/" + month_from + "/" + year_from; 
        // alert(trans_date);          
        var d = new Date();
        var today = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();   
        // alert(today);
        if(new Date(trans_date) < new Date(today)){
          $('.date-dropdowns').next().removeClass('help-block form-error');
         // return true;
       }
       else{
        if(new Date(trans_date) > new Date(today)){
          $('.date-dropdowns').next().addClass('help-block form-error');
          $('.date-dropdowns').next().next().removeClass('help-block form-error').addClass('hided');
          return false;
        } 
       }
    }
    //range
    //Jquery and Ajax Functionality for Range Form added by kalai
         $('.range_form_id').submit(function(e){
            e.preventDefault();
            var res = true;
            $('input[type="text"],textarea,select',this).each(function() {
              if($(this).val().trim() == "") {
                $(this).next('.hided').addClass('custom_error').show();
                res = false;
              }
            });
            if($(":input").siblings('span').hasClass("custom_error")){
              res =  false;
            }
            if(res){
              clone_length = $(this).find('.clone_content').length;
              var form_data = $(this).serialize();
               $.ajax({
                 type: "POST",
                 url: "functions/range_function.php?adddata=true",
                 data: form_data + '&counter=' + clone_length,
                 cache: false,
                 success: function(html) {
                    var result_split = html.split('#');
                     if (result_split[0].indexOf("success") !==-1){
                       //alert(result_split[1]);
                       success_align();
             	       $('.success_msg span').html(result_split[1]);
             	        if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
                       html ="<tr class='align_center delete_color'>\
                          <input type='hidden' name='range_id' value="+result_split[2]+">\
                          <td class='t_range_id'>"+result_split[2]+"</td>\
                          <td class='t_range_testname'>"+result_split[3]+"</td>\
                          <td>\
                            <span class='edit_state' onclick='editfunction("+result_split[2]+")'>Edit</span>\
                            <span class='delete_state' data-value="+result_split[2]+">Delete</span>\
                          </td></tr> ";
                       // $('.range_table tr:last').after(html);
                       document.range_form.reset();
                       document.body.style.overflow = 'hidden';
                       //location.reload();
                     }
                     else{
                      //alert(result_split[1]);
                      success_align();
             	       $('.success_msg span').html(result_split[1]);
             	        if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	                   $('.success_msg').show();
	                   $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                     }
                 }
              });
            }
          });

        $('.edit_range_form_id').submit(function(e){
            e.preventDefault();
            var res = true;
            $('input[type="text"],textarea,select',this).each(function() {
              if($(this).val().trim() == "") {
                $(this).next('.hided').addClass('custom_error').show();
                res = false;
              }
            });
            if($(this).find(":input").siblings('span').hasClass("custom_error")){
              res =  false;
            }
            if(res){
                edit_clone_length = $(this).find('.edit_clone_content').length;
                var form_data = $(this).serialize();
                // alert(JSON.stringify(form_data));
                $.ajax({
                       type: "POST",
                       url: "functions/range_function.php?editdata=true",
                       data: form_data + '&counter=' + edit_clone_length,
                       cache: false,
                       success: function(html) {
                           var result_split = html.split('#');
                           if (result_split[0].indexOf("success") !== -1){
                            //alert(result_split[1]);
                             $('.range_table').find(".t_range_id:contains("+result_split[2]+")").siblings('.t_range_testname').html(result_split[3]);
                             success_align();
		             	     $('.success_msg span').html(result_split[1]);
		             	      if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       			$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       		}
			                 $('.success_msg').show();
			                 $('.popup_fade').show();
                             $('.range_div, .close_btn').hide();
                             document.body.style.overflow = 'hidden';
                            //location.reload();
                           }
                           else{
                            //alert(result_split[1]);
                            success_align();
	             	       	$('.success_msg span').html(result_split[1]);
	             	       	 if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		                   	$('.success_msg').show();
		                   	$('.popup_fade').show();
		                    document.body.style.overflow = 'hidden';
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

        $('.edit_parameter_act ').click(function(e){
              e.preventDefault();
              var res = true;
              $(this).parents('.edit_parameter_type').find('input[type="text"],textarea,select').each(function() {
                if($(this).val().trim() == "") {
                  res = false;
                  //alert(res);
                  //alert('parameter_type false');
                }
              });

              if(res){
                  //alert($(this).parents('edit_parameter_type').html());
                  var form_data = $(this).parents('.edit_parameter_type').serialize();
                  //alert(form_data);
                  $.ajax({
                        type: "POST",
                        url: "functions/parameter_typefunction.php?editdata=true",
                        data: form_data,
                        cache: false,
                        success: function(html) {
                            if(html == 'success'){
                                //alert('Parameter Type edited successfully!');
                                //location.reload();
                                success_align();
			             	     $('.success_msg span').html('Parameter Type edited successfully!');
			             	      if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
				                 $('.success_msg').show();
				                 $('.popup_fade').show();
			                  	document.body.style.overflow = 'hidden';
                            }else if(html == 'exist'){
                                //alert('Parameter Type edited successfully!');
                                //location.reload();
	                            success_align();
			             	    $('.success_msg span').html('Parameter Type edited successfully!');
			             	     if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
				                $('.success_msg').show();
				                $('.popup_fade').show();
			                   document.body.style.overflow = 'hidden';
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
                      //alert('parameter_unit false');
                    }
                  });
                  if(res){
                      var form_data = $('[name=parameter_unit_add]').serialize();
                      //alert(form_data);
                      $.ajax({
                            type: "POST",
                            url: "functions/parameter_unitfunction.php?adddata=true",
                            data: form_data,
                            cache: false,
                            success: function(html) {
                                if(html == 'success'){
                                    //alert('Parameter Unit inserted successfully!');
                                    //location.reload();
                                     success_align();
				             	     $('.success_msg span').html('Parameter Unit inserted successfully!');
				             	      if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
					                 $('.success_msg').show();
					                 $('.popup_fade').show();
				                    document.body.style.overflow = 'hidden';
                                }else if(html == 'error'){
                                    //alert('Parameterunit already exist!');
                                     success_align();
				             	     $('.success_msg span').html('Parameter Unit already exists!');
				             	     
                       					$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
                       				
					                 $('.success_msg').show();
					                 $('.popup_fade').show();
				                    document.body.style.overflow = 'hidden';
                                }
                            }
                         });
                  }
                });
		$(document).on('submit','#edit_parameter_unit', function(e){
          e.preventDefault();
              var res = true;
              $('input[type="text"]',this).each(function() {
                if($(this).val().trim() == "") {
                   $('[name="parameter_unit"]').next().addClass('custom_error');
                  res = false;              
                }
              });
              if(res){      
                  $('[name="parameter_unit"]').next().removeClass('custom_error');             
                  var form_data = $(this).serialize();
	                  $.ajax({
                       type: "POST",
                       url: "functions/parameter_unitfunction.php?updateunitdata=true",
                       data:form_data,
                       cache: false,
                       success: function(data) {
                          if(data=='success'){
                              //alert('Parameter unit edited successfully!');
                              //location.reload();
                               success_align();
			             	   $('.success_msg span').html('Parameter unit edited successfully!');
			             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
				               $('.success_msg').show();
				               $('.popup_fade').show();
			                   document.body.style.overflow = 'hidden';
                          }else if(data == 'exist'){
                              //alert('Parameter unit edited successfully!');
                              //location.reload();
                               success_align();
			             	   $('.success_msg span').html('Parameter unit edited successfully!');
			             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
				               $('.success_msg').show();
				               $('.popup_fade').show();
			                   document.body.style.overflow = 'hidden';
                          }
                      }
                   });
              }
        });
       $(document).on('click',".reset_form_param_unit", function(){     
           $('[name="parameter_unit"]').next().removeClass('custom_error');    
        });

    //ASSIGN SCHEDULE

      $('#assignschedule_form').submit(function(e){
        e.preventDefault();
         $('#combobox').next().next().removeClass('custom_error');           
        var res = true;
        $('input[type="text"],textarea,select',this).each(function() {
          if($(this).val().trim() == "") {
            $('#bib').next().addClass('custom_error');
            res = false;
          }
        });	
        if(res){
          $('#bib').next().removeClass('custom_error');         
            var form_data = $('#assignschedule_form').serialize();
           //alert(form_data);
            $.ajax({
               type: "POST",
               url: "functions/assign_schedule_function.php?add_assign_schdule=true",
               data: form_data,
               cache: false,
               success: function(html) {
                   if(html=='success'){
                       //alert('Schedule assigned successfully! ');
                       //location.reload();
                       success_align();
	             	   $('.success_msg span').html('Schedule assigned successfully!');
	             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		               $('.success_msg').show();
		               $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                   }else if(html=='error'){
                       //alert('Schedule already exist!');
                       success_align();
	             	   $('.success_msg span').html('Schedule already exist!');
	             	   
                       	$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
                       
		               $('.success_msg').show();
		               $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                   }
               }
           });
        }
      });

      //contains with exact match
      $.expr[':'].textEquals = $.expr.createPseudo(function(arg) {
        return function( elem ) {
            return $(elem).text().match("^" + arg + "$");
        };
      });

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
               $('.result_error_content').html('');
              var test_ar = [];
              var form_data = $('[name=result_form]').serialize();
              $('.result_createscheduleid').val($('.resultcreateschedule_act option:selected').val());
              $.ajax({
                   type: "POST",
                   url: "functions/result_function.php?loadtestparam=true",
                   data: form_data,
                   cache: false,
                   // dataType:'json',
                   success: function(html) {
                    // console.log(html);
                    $('.result_table tbody tr:not(:last)').remove();
                      var result_split = html.split('###');
                      var obj = JSON.parse(result_split[0]);
                      // obj=result_split[0];
                      $.each(obj, function(i){
                        ranges = JSON.stringify(obj[i].ranges);
                        test_ar.push(obj[i].test_name);
                        if(obj[i].ranges.length == 0){
                           html = "<tr class='align_center delete_color assign_table'>\
                                    <input type='hidden' name='result_id' class='result_id' value=''>\
                                    <input type='hidden' name='result_athleteid' class='result_athleteid' value="+obj[i].athlete_id+">\
                                    <input type='hidden' name='result_parametertype' class='result_parametertype' value="+obj[i].parameter_type+">\
                                    <input type='hidden' name='result_parameterunit' class='result_parameterunit' value="+obj[i].parameter_unit+">\
                                    <input type='hidden' name='result_parameterformat' class='result_parameterformat' value="+obj[i].parameter_format+">\
                                    <input type='hidden' name='result_ranges' class='result_ranges' value="+ranges+">\
                                    <td class='error_icon'></td>\
                                    <td class='result_test_name'>"+obj[i].test_name+"</td>\
                                    <td class='result_parameter_name'>"+obj[i].parameter_name+"</td>\
                                    <td><input type='text' class='assign_border enter_result' name='enter_result'><br><span class='enter_result_error'></span></td>";
                            if(obj[i].parameter_type.toLowerCase() == "time")
                              html+="<td><span class='result_error' name='result_error'>Enter " +obj[i].parameter_name+ " in " +obj[i].parameter_unit+"</span></td>";
                            else
                              html+="<td><span class='result_error' name='result_error'>Enter " +obj[i].parameter_name+ " in " +obj[i].parameter_unit+ " in "+obj[i].parameter_format+" decimals</span></td>";
                            html+="<td></td>\
                            <td><input type='checkbox' name='status_incomplete' class='status_incomplete' style='display:none;'></td></tr>\
                           </tr>";
                        }
                        else{
                          html = "<tr class='align_center delete_color assign_table'>\
                                    <input type='hidden' name='result_id' class='result_id' value=''>\
                                    <input type='hidden' name='result_athleteid' class='result_athleteid' value="+obj[i].athlete_id+">\
                                    <input type='hidden' name='result_parametertype' class='result_parametertype' value="+obj[i].parameter_type+">\
                                    <input type='hidden' name='result_parameterunit' class='result_parameterunit' value="+obj[i].parameter_unit+">\
                                    <input type='hidden' name='result_parameterformat' class='result_parameterformat' value="+obj[i].parameter_format+">\
                                    <input type='hidden' name='result_ranges' class='result_ranges' value="+ranges+">\
                                    <td class='error_icon'></td>\
                                    <td class='result_test_name'>"+obj[i].test_name+"</td>\
                                    <td class='result_parameter_name'>"+obj[i].parameter_name+"</td>\
                                    <td><input type='text' class='assign_border enter_result' name='enter_result'><br><span class='enter_result_error'></span></td>";
                          if(obj[i].parameter_type.toLowerCase() == "time")
                            html+="<td><span class='result_error' name='result_error'>Enter " +obj[i].parameter_name+ " in " +obj[i].parameter_unit+"</span></td>";
                          else
                            html+="<td><span class='result_error' name='result_error'>Enter " +obj[i].parameter_name+ " in " +obj[i].parameter_unit+ " in "+obj[i].parameter_format+" decimals</span></td>";
                          html+="<td><span class='assign_border enter_points'></span></td>\
                          <td><input type='checkbox' name='status_incomplete' class='status_incomplete'></td></tr>";
                        }
                        $('.result_table tr:last').before(html);
                      });

                        test_data = $.unique(test_ar);
                        $.each(test_data, function(i,val){
                          select_element = $('.result_table').find(".result_test_name:contains("+val+"):first");
                          select_ranges = select_element.siblings('.result_ranges').val();
                          select_test = select_element.text();
                          select_parameter_element = select_element.next('.result_parameter_name');
                          select_parameter = select_element.next('.result_parameter_name').text();
                          if(select_ranges == '[]'){
                            $('.note_range').show();
                            // error_html = "<span class='result_table_error custom_error'>Please assign range for test " +select_test+ " and parameter " +select_parameter+ "</span><br>";
                            // $('.result_error_holder').append(error_html);
                            // $('.result_error_content').show();
                            select_element.addClass('error_range');
                            select_parameter_element.addClass('error_range');
                            select_element.prev('.error_icon').html("<i class='fa fa-exclamation-circle error-font'></i>");

                          }
                        });

                        var obj1 = JSON.parse(result_split[1]);
                        console.log(JSON.stringify(obj1));
                        // $.each(obj1, function(i){
                        //   $('.result_table').find("td:contains("+obj1[i].resultparameter_name+")").siblings('.result_id').val(obj1[i].result_id);
                        //   $('.result_table').find("td:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_result').val(obj1[i].result);
                        //   $('.result_table').find("td:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_points').text(obj1[i].points);
                        // });

                        //changed the above code to below new one because of incorrect result placed issues
                        $.each(obj1, function(i){
                          $('.result_table').find("td:contains("+obj1[i].resulttest_name+")").siblings(".result_parameter_name:contains("+obj1[i].resultparameter_name+")").siblings('.result_id').val(obj1[i].result_id);
                          // $('.result_table').find("td:contains("+obj1[i].resulttest_name+")").siblings(".result_parameter_name:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_result').val(obj1[i].result);
                          $('.result_table').find("td:contains("+obj1[i].resulttest_name+")").siblings(".result_parameter_name:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_points').text(obj1[i].points);
                          if (obj1[i].result_status == 0){
                            $('.result_table').find("td:contains("+obj1[i].resulttest_name+")").siblings(".result_parameter_name:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_result').val('0').addClass('result_restrict').attr('disabled',true);
                            $('.result_table').find("td:contains("+obj1[i].resulttest_name+")").siblings(".result_parameter_name:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.status_incomplete').attr('checked','checked');
                          }
                          else{
                            $('.result_table').find("td:contains("+obj1[i].resulttest_name+")").siblings(".result_parameter_name:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_result').val(obj1[i].result);
                          }
                        });

                         //Points total result
                          var val=0;
                          $(".enter_points").each(function() {
                            val += Number($(this).text());
                            $('.total_result').text(val);
                          });
                          $('.select_all').show();
                  }
              });
          }
        });


        $('.paramter_menu').click(function(){
          $(".parameter-list").show();
        });
         $('.parameter-list').mouseleave(function(){
          $(".parameter-list").fadeOut(1000);
        });


      $(document).on('click','.restrict_form',function(e){
        return false;
      });

      // Jquery functions for Range Form added by kalai
        var current_id = 1;
        $(document).on('click','.add_range_points',function(e){
          $('.clone_content:last').children().find('input[type="text"]',this).each(function(){
            if($(this).val() == '')
            {            
              $('.clone_content:last').children().find('input[type="text"]').next().addClass('custom_error');
              e.preventDefault();             
            }
            else if($('.range_holder').find('.hided').hasClass('custom_error')){
                e.preventDefault();
            }
            else{
              $('.clone_content:last').children().find('input[type="text"]').next().removeClass('custom_error');
              var id = current_id+1;
              nextrangeElement($('.clone_content:last'));
              $('.clone_content:last').attr('id','range_counter'+id);
           }
           return false;
            });
        });

        // var current_id = 1;
        // $(document).on('click','.add_range_points',function(e){

        //     if(($('.clone_content:last').children().find('.r_strt').val() == '') || ($('.clone_content:last').children().find('.r_end').val() == '') || ($('.clone_content:last').children().find('.r_point').val() == '') || ($('.clone_content').children().find('.r_strt').val() == '') || ($('.clone_content').children().find('.r_end').val() == '') || ($('.clone_content').children().find('.r_point').val() == ''))
        //     {
        //       $('.clone_content:last').children().find('input[type="text"]').next().addClass('custom_error');
        //       e.preventDefault();
        //       // alert('please fill all the fields');
        //     }
        //     else if($('.range_holder').find('.hided').hasClass('custom_error')){
        //         e.preventDefault();
        //     }
        //     else{
        //       $('.clone_content:last').children().find('input[type="text"]').next().removeClass('custom_error');
        //       var id = current_id+1;
        //       nextrangeElement($('.clone_content:last'));
        //       $('.clone_content:last').attr('id','range_counter'+id);
        //    }
        //    return false;
        // });

        // $(document).on('click','.add_range_points',function(e){
        //   $('.r_strt .r_end .r_point').filter(function() {
        //     if (this.value != '') {
        //       alert("not empty");
        //       var id = current_id+1;
        //       nextrangeElement($('.clone_content:last'));
        //       $('.clone_content:last').attr('id','range_counter'+id);
        //     }
        //     else{
        //       alert("empty");
        //     }
        //   });
        // });

        function nextrangeElement(element){
            var newElement = element.clone();
            var id = current_id+1;
            current_id = id;
            newElement.find('.range_label').remove();
            //newly commented for range updation
            // if($('.range_parameter_type').val() == "time"){
            //   data = $('#end'+(id-1)).val().split(':').pop(-1);
            //   startrange = Number(data) + 1;
            //   startrange = $('#end'+(id-1)).val().replace($('#end'+(id-1)).val().substr($('#end'+(id-1)).val().length - 2),startrange);
            // } else if($('#end'+(id-1)).val().indexOf(".") !== -1){
            //   data = $('#end'+(id-1)).val().split('.').pop(-1);
            //   startrange = Number(data) + 1;
            //   s = $('#end'+(id-1)).val().substring(0, $('#end'+(id-1)).val().indexOf('.'));
            //   startrange = s +'.'+ startrange;
            // }
            // else{
            //    startrange = Number($('#end'+(id-1)).val())+1;
            // }
            newElement.find('.r_strt').removeAttr('name').attr('name', 'range_start'+id).val($('#end'+(id-1)).val());
            newElement.find('.r_end').removeAttr('name').attr('name', 'range_end'+id).val('');
            newElement.find('.r_point').removeAttr('name').attr('name', 'range_points'+id).val('');
            newElement.find('.r_strt').removeAttr('id').attr('id','strt'+id);
            newElement.find('.r_end').removeAttr('id').attr('id','end'+id);
            newElement.find('.r_point').removeAttr('id').attr('id','point'+id);
            newElement.appendTo($(".range_holder"));
        }

        $('.reset_form_range').click(function(){         
           $(".clone_content").each(function() {
               if($('.clone_content').length !=1){
                   $('.clone_content:last').remove();
               }
           });
       });
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

        $(document).delegate('.edit_assign_schedule', 'click', function(event) {
            $(this).parents('.popup-edit').find(".clone_schedule_update:not(:first-child)").remove();
            var main_content_assign_popup = $(this).parents('.popup-edit');
            var assign_schedule_id = $(this).attr('data-schedule');
            var assign_category_id = $(this).attr('data-category');
            $.ajax({
               type: "POST",
               url: "functions/assign_schedule_function.php?edit_get_data=true",
               data: {'shdl_id':assign_schedule_id,'cate_id':assign_category_id},
               cache: false,
               dataType:'json',
               success: function(data) {
               		
                   var assign_id = data[0].assigncategory_id;
                   main_content_assign_popup.find('.schedule_update').val(data[0].createschedule_name);
                   main_content_assign_popup.find('.schedule_update_id').val(data[0].createschedule_id);
                   $.ajax({
                        type: "POST",
                        url: "functions/assign_schedule_function.php?cate_list_edit=true",
                        data:{'id':data[0].createschedule_id,'assign_id':data[0].assigncategory_id},
                        cache: false,
                        success: function(data) {
                            main_content_assign_popup.find('.category_update').empty().append("<option value=''>Select Category Name</option>"+data);
                       }
                    });
                   main_content_assign_popup.find('.category_update1').val(data[0].assigncategory_id);
                   main_content_assign_popup.find('.clone_schedule_update .athlete_name option[value="'+data[0].assignathlete_id+'"]').attr('selected','selected');
                   var res =data[0].athlete_dob.split('-');
                   var new_date = res[2]+'/'+res[1]+'/'+res[0];
                   main_content_assign_popup.find('.clone_schedule_update .dob_update').val(new_date);
                   //$('.clone_schedule_update:first .assign_athelete_count_edit').val(1);
                   main_content_assign_popup.find('.clone_schedule_update .custom-combobox-input').val(data[0].athlete_name);
                   main_content_assign_popup.find('.clone_schedule_update .mobile_update').val(data[0].athlete_mobile);
                   main_content_assign_popup.find('.clone_schedule_update .athlete_bib').val(data[0].assignbib_number);
                   //$('.clone_schedule_update:first .assing_schedule_update_id').val(data[0].assignschedule_id);
                   main_content_assign_popup.find('.create_schedule_update_id').val(data[0].createschedule_id);
                   //$('.category_update option[value="'+data[0].assigncategory_id+'"]').attr('selected','selected');
				   
                   var cnt = 0;
                   $.each(data, function(i){
                       if(cnt!=i){
                           var last_id = parseInt($('.clone_schedule_update:first .assign_athelete_count_edit').val());

                           var newElement = main_content_assign_popup.find('.clone_schedule_update:first').clone();
                           var id = i+1;
                           test_id = id;
                           newElement.find('.assign_athelete_count_edit').val(id);
                           newElement.find('.athlete_name option:selected').removeAttr('selected');
                           newElement.find('.athlete_name option[value="'+data[i].assignathlete_id+'"]').attr('selected','selected');
                           //newElement.find('.athlete_name').removeAttr('name').attr('name', 'athlete_name'+id);
                          // newElement.find('.assing_schedule_update_id').removeAttr('name').attr('name', 'assing_schedule_update_id'+id).val(data[i].assignschedule_id);
                           newElement.find('.create_schedule_update_id').val(data[i].createschedule_id);
                           //newElement.find('.athlete_bib').removeAttr('name').attr('name', 'athlete_bib'+id).val(data[i].assignbib_number);
                           newElement.find('.athlete_bib').val(data[i].assignbib_number);
                           var res =data[i].athlete_dob.split('-');
                           var new_date = res[2]+'/'+res[1]+'/'+res[0];
                           newElement.find('.dob_update').val(new_date);
                           newElement.find('.mobile_update').val(data[i].athlete_mobile);
                           newElement.find('.custom-combobox:nth-child(3)').remove();
                           newElement.appendTo($(".clone_schedule_update_content"));
                           //id++;
                       }
                       //cnt++;
                   });

               }
           });
        });
        $(document).delegate('.athlete_name_update', 'change', function(event) {
            var newElement= $(this).parents('.assign_clone_content_edit');
            var ath_id = $(this).val();
            //alert(ath_id);
            $.ajax({
               type: "POST",
               url: "functions/athletes_functions.php?get_ath=true",
               data: {'ath_id':ath_id},
               cache: false,
               dataType:'json',
               success: function(html) {
                   //alert(html.athlete_dob);
                   var res = html.athlete_dob.split('-');
                   var new_date = res[2]+'/'+res[1]+'/'+res[0];
                    newElement.find('.dob').val(new_date);
                    //alert(newElement.html());
                    newElement.find('.mobile').val(html.athlete_mobile);
                    newElement.find('.athlete_bib').val('');
               }
           });
        });

        //Sort By athlete name in result module while return autosuggestion results
        function SortByName(x,y) {
          return ((x.ath_name == y.ath_name) ? 0 : ((x.ath_name > y.ath_name) ? 1 : -1 ));
        }
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
                   var result_split = data.split('#');
                   if (result_split[0].indexOf("success") !== -1){
                    var obj = JSON.parse(result_split[1]);
                    // var options = '<option></option>';
                    // var options = '<select class="ath_list">';
                      $.each(obj, function(i){
                        // athletes_list.push(obj[i].athlete_name);
                        athletes_list.push({'ath_id':obj[i].athlete_id,'ath_name':obj[i].athlete_name,'ath_dob':obj[i].athlete_dob,'ath_mobile':obj[i].athlete_mobile,'ath_bib':obj[i].assignbib_number});
                        athlete_json.push({'athlete_id':obj[i].athlete_id,'athlete_name':obj[i].athlete_name,'athlete_dob':obj[i].athlete_dob,'athlete_mobile':obj[i].athlete_mobile,'athlete_bibno':obj[i].assignbib_number})
                        // options += '<option value="'+obj[i].athlete_id+'">'+obj[i].athlete_name+'</option>';
                        $('.result_athletename,.result_athletedate,.result_athletemobile,.result_athletebib').val('');
                        $('.result_table tbody tr:not(:last)').remove();
                        $('.note_range').hide();
                      });
                      // options += '</select>';
                      // $('.athletes_list').html(options);

                      // $('.result_athletename').html(options);
                      // alert(JSON.stringify(athlete_json));
                      athletes_list.sort(SortByName);
                    }
                    else{
                      //alert(result_split[1]);
                      success_align();
	             	   $('.success_msg span').html(result_split[1]);
	             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		               $('.success_msg').show();
		               $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                    }
                  }
            });
        });

        // $('.result_athletename').focus(function (e) {
        //   // alert(athlete_json);
        //   $(this).autocomplete({
        //     source: athletes_list,
        //   });
        // });

        $(".result_athletename").autocomplete({
          source: function(req, add) {
              add($.map(athletes_list, function(el) {
                if (el.ath_name.toLowerCase().indexOf(req.term.toLowerCase()) === 0) {
                  return {
                      label: el.ath_name,
                      value: el.ath_name,
                      data:el.ath_id
                  };
                }
              }));
          },
          select: function(event, ui) {
              // alert(JSON.stringify(athletes_list));
              var obj = athlete_json;
              $.each(obj, function(i){
                if((obj[i].athlete_name == ui.item.value) && (obj[i].athlete_id == ui.item.data)){
                  var res = obj[i].athlete_dob.split('-');
                  var new_date = res[2]+'/'+res[1]+'/'+res[0];
                  $('.result_athleteid').val(obj[i].athlete_id).prop("readonly", true);
                  $('.result_athletedate').val(new_date).prop("readonly", true);
                  $('.result_athletemobile').val(obj[i].athlete_mobile).prop("readonly", true);
                  $('.result_athletebib').val(obj[i].athlete_bibno).prop("readonly", true);
                }
            });
          }
        });

        $(".result_athletebib").autocomplete({
          source: function(req, add) {
              add($.map(athletes_list, function(el) {
                if (el.ath_bib.toLowerCase().indexOf(req.term.toLowerCase()) === 0) {
                  return {
                      label: el.ath_bib,
                      value: el.ath_bib,
                      data:el.ath_id
                  };
                }
              }));
          },
          select: function(event, ui) {
              // alert(JSON.stringify(athletes_list));
              var obj = athlete_json;
              $.each(obj, function(i){
                if((obj[i].athlete_bibno == ui.item.value) && (obj[i].athlete_id == ui.item.data)){
                  var res = obj[i].athlete_dob.split('-');
                  var new_date = res[2]+'/'+res[1]+'/'+res[0];
                  $('.result_athleteid').val(obj[i].athlete_id).prop("readonly", true);
                  $('.result_athletedate').val(new_date).prop("readonly", true);
                  $('.result_athletename').val(obj[i].athlete_name).prop("readonly", true);
                  $('.result_athletemobile').val(obj[i].athlete_mobile).prop("readonly", true);
                }
            });
          }
        });

        $(".result_athletemobile").autocomplete({
          source: function(req, add) {
              add($.map(athletes_list, function(el) {
                if (el.ath_mobile.toLowerCase().indexOf(req.term.toLowerCase()) === 0) {
                  return {
                      label: el.ath_mobile,
                      value: el.ath_mobile,
                      data:el.ath_id
                  };
                }
              }));
          },
          select: function(event, ui) {
              // alert(JSON.stringify(athletes_list));
              var obj = athlete_json;
              $.each(obj, function(i){
                if((obj[i].athlete_mobile == ui.item.value) && (obj[i].athlete_id == ui.item.data)){
                  var res = obj[i].athlete_dob.split('-');
                  var new_date = res[2]+'/'+res[1]+'/'+res[0];
                  $('.result_athleteid').val(obj[i].athlete_id).prop("readonly", true);
                  $('.result_athletedate').val(new_date).prop("readonly", true);
                  $('.result_athletename').val(obj[i].athlete_name).prop("readonly", true);
                  $('.result_athletebib').val(obj[i].athlete_bibno).prop("readonly", true);
                }
            });
          }
        });

         // $('.result_athletename').blur(function (e) {
         //  // alert(JSON.stringify(athlete_json));
         //  select_name = $('.result_athletename').val();
         //  var obj = athlete_json;
         //  $.each(obj, function(i){
         //    if(obj[i].athlete_name == select_name){
         //      var res = obj[i].athlete_dob.split('-');
         //      var new_date = res[2]+'/'+res[1]+'/'+res[0];
         //      $('.result_athleteid').val(obj[i].athlete_id).prop("readonly", true);
         //      $('.result_athletedate').val(new_date).prop("readonly", true);
         //      $('.result_athletemobile').val(obj[i].athlete_mobile).prop("readonly", true);
         //      $('.result_athletebib').val(obj[i].athlete_bibno).prop("readonly", true);
         //    }
         //  });
         // });

        // $(document).on('change','.result_athletename',function(e){
        //   // alert(JSON.stringify(athlete_json));
        //   select_id = $('option:selected',this).val();
        //   var obj = athlete_json;
        //   $.each(obj, function(i){
        //     if(obj[i].athlete_id == select_id){
        //       $('.result_athleteid').val(obj[i].athlete_id).prop("readonly", true);
        //       $('.result_athletedate').val(obj[i].athlete_dob).prop("readonly", true);
        //       $('.result_athletemobile').val(obj[i].athlete_mobile).prop("readonly", true);
        //       $('.result_athletebib').val(obj[i].athlete_bibno).prop("readonly", true);
        //     }
        //   });
        //  });

        // $(document).on('keypress','.enter_result',function(e){
        //   var theEvent = e || window.event;
        //       var key = theEvent.keyCode || theEvent.which;
        //       key = String.fromCharCode(key);
        //       if (key.length == 0) return;
        //       var regex = /^[0-9.\b]+$/;
        //       if (!regex.test(key)) {
        //           theEvent.returnValue = false;
        //           if (theEvent.preventDefault) theEvent.preventDefault();
        //       }
        //  });

$(document).on('blur','.enter_result',function(e){
            ranges = $(this).parents('tr').find('.result_ranges').val();
            parameter_type = $(this).parents('tr').find('.result_parametertype').val().toLowerCase();
            parameter_unit = $(this).parents('tr').find('.result_parameterunit').val().toLowerCase();
            parameter_format = $(this).parents('tr').find('.result_parameterformat').val().toLowerCase();
            ranges = JSON.parse(ranges);
            value=$(this).val();
            if (value == ''){
              $(this).siblings('.enter_result_error').removeClass('error').hide();
              $(this).parents('tr').find('.enter_points').text('0');
              $(this).val('-');
            }
            if(((parameter_type == "time") && (value!='') && (value!='-'))||((parameter_type == "Time") && (value!=''))){
              // alert("time");
              if((parameter_format=="hh:mm:ss")&&(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):[0-5][0-9]$/).test(value))){
                  // alert("if1");
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  status=1;
                  // break;
                } else if((parameter_format=="hh:mm")&&(!(/^(?:[0-2][0-4]|[0-1][0-9]):[0-5][0-9]$/).test(value))){
                  // alert("if2");
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  status=1;
                  // break;
                }
                else if((parameter_format=="mm:ss")&&(!(/^(?:[0-5][0-9]):[0-5][0-9]$/).test(value))){
                  // alert("if3");
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  status=1;
                  // break;
                }
                else if((parameter_format=="hh:mm:ss:mss")&&(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value))){
                  // alert("if4");
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  status=1;
                  // break;
                }
                else if((parameter_format=="mm:ss:mss")&&(!(/^(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value))){
                  // alert("if5");
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  status=1;
                  // break;
                }
                else if((parameter_format=="ss:mss")&&(!(/^(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value))){
                  // alert("if6");
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  status=1;
                  // break;
                }
                else if((parameter_format=="mss")&&(!(/^(?:[0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value))){
                  // alert("if6");
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  status=1;
                  // break;
                }
                else{
                  // alert("else time");
                  if(ranges.length!=0){
                    // alert("if");
                    for (var i = 0; i < ranges.length; i++) {
                    rangestart = ranges[i].range_start;
                    rangeend = ranges[i].range_end;
                      if (value >= rangestart && value < rangeend){
                        status = 1;
                        $(this).parents('tr').find('.enter_points').text(ranges[i].range_point);
                        $(this).siblings('.enter_result_error').removeClass('error').hide();
                        break;
                      }
                      else{
                        status = 0;
                      }
                    }
                  }
                  else{
                    // alert("else");
                    $(this).parents('tr').find('.enter_points').text('0');
                    $(this).siblings('.enter_result_error').removeClass('error').hide();
                  }

                }
            }
            else{
              // alert("else number");
                  //Checking entered Result
                  if((value!='') && (value!='-')){
                    if(value.indexOf(".")==-1){
                      decimals = 0;
                    }
                    else{
                    decimals = value.toString().split(".")[1].length;
                    }
                    // alert(decimals);
                    if(value.indexOf(":")==-1){
                      $(this).siblings('.enter_result_error').removeClass('error').hide();
                      if(ranges.length!=0){
                        // alert("ranges not empty");
                        // status = 0;
                        for (var i = 0; i < ranges.length; i++) {
                          // alert(ranges[i].range_start);
                          rangestart = Number(ranges[i].range_start);
                          rangeend = Number(ranges[i].range_end);
                          // alert(ranges[i].range_end);
                          // alert(value);
                          if (value >= rangestart && value < rangeend){
                            // alert("if");
                            status = 1;
                            if(decimals <= parameter_format){
                               // alert("yes");
                               $(this).siblings('.enter_result_error').removeClass('error').hide();
                               $(this).parents('tr').find('.enter_points').text(ranges[i].range_point);
                               break;
                            }
                            else{
                               $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                               totalvlaue = $('.total_result').text();
                               pointvalue = $(this).parents('tr').find('.enter_points').text();
                               result = totalvlaue - pointvalue;
                               $('.total_result').text(result);
                               $(this).parents('tr').find('.enter_points').text('');
                            }
                            break;
                          }
                          else{
                            // alert("status");
                            if(decimals <= parameter_format){
                              // alert("if");
                               status = 0;
                               $(this).siblings('.enter_result_error').removeClass('error').hide();
                            }
                            else{
                              // alert("else");
                              status = 1;
                              $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                            }
                          }
                        }
                  }
                  else{
                    // alert("range empty");
                    $(this).parents('tr').find('.enter_points').text('0');
                    if(decimals <= parameter_format){
                       $(this).siblings('.enter_result_error').removeClass('error').hide();
                    }
                    else{
                      $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                    }
                  }
                }
                else{
                  status = 1;
                  $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                }
                 
                  if (value.indexOf(".") !== -1 && decimals == 0){
                    $(this).siblings('.enter_result_error').addClass('error').text('Please enter result in correct format').show();
                  }
                  // else{
                  //   $(this).siblings('.enter_result_error').removeClass('error').hide();
                  // }
                }
            }
            // if(status == 0 && value!=''){
            if(status == 0 && status !='' && value != '' && ranges.length!=0){
              // alert(status);
              // alert(value);
              // alert(JSON.stringify(ranges));
              $(this).siblings('.enter_result_error').addClass('error').text('Entered value is not in range').show();
              totalvlaue = $('.total_result').text();
              pointvalue = $(this).parents('tr').find('.enter_points').text();
              result = totalvlaue - pointvalue;
              $('.total_result').text(result);
              $(this).parents('tr').find('.enter_points').text('');
            }

            if(($(this).siblings('.enter_result_error').is(':not(.error)')) && (parameter_type!="time") &&(value!='')&&(value!='-')){
              // alert("no error");
              // alert(parameter_format);
              // alert(decimals);
              result_data = '0';
              if(parameter_format != decimals){
                // alert($(this).val());
                if( decimals == 0 ){
                  for(i=1;i<parameter_format;i++){
                    result_data = result_data + '0';
                  }
                  // alert(result_data);
                }  
                else{
                  calc = parameter_format - decimals;
                  // alert(calc);
                  for(i=1;i<calc;i++){
                    result_data = result_data + '0';
                  }
                }  
                if ($(this).val().indexOf(".") !== -1)
                    $(this).val(value + result_data);
                else
                    $(this).val(value + '.' + result_data); 
              }
            }

            //Points total result
            var val=0;
            $(".enter_points").each(function() {
              val += Number($(this).text());
              $('.total_result').text(val);
            });

         });

         $('.result_submit_act').click(function(){
            res = true;
            if($('.enter_result_error').hasClass('error')){
              res = false;
            } else if($(this).parents().siblings('.result_table').find('td').hasClass('error_range')){
              res = false;
            }
            else{
              var result_data = [];
              createschedule_id = $('.result_createscheduleid').val();
              athlete_id = $('.result_athleteid').val();
              $(".result_table tr:not(:last-child)").each(function(i) {
                  test_name = $(this).find('.result_test_name').text();
                  parameter_name = $(this).find('.result_parameter_name').text();
                  //newly added for reports module
                  //start
                  parameter_unit = $(this).find('.result_parameterunit').val();
                  parameter_format = $(this).find('.result_parameterformat').val();
                  //end
                  enter_result = $(this).find('.enter_result').val();
                  enter_points = $(this).find('.enter_points').text();
                  result_id = $(this).find('.result_id').val();
                  // if($(this).find('.status_incomplete').is(':checked'))
                  if($(this).find('.status_incomplete').attr('checked'))
                    result_incomplete = 0;
                  else
                    result_incomplete = 1;
                  // alert(result_incomplete);
                  // result_data.push({'result_id':result_id,'createschedule_id':createschedule_id,'athlete_id':athlete_id,'test_name':test_name,
                  //                   'parameter_name':parameter_name,'enter_result':enter_result,
                  //                   'enter_points':enter_points,'result_incomplete':result_incomplete});
                  //newly changed the above code for reports module
                  result_data.push({'result_id':result_id,'createschedule_id':createschedule_id,'athlete_id':athlete_id,'test_name':test_name,
                                    'parameter_name':parameter_name,'parameter_unit':parameter_unit,'parameter_format':parameter_format,
                                    'enter_result':enter_result,'enter_points':enter_points,'result_incomplete':result_incomplete});
              });
              if((result_data.length != 0)){
                  $.ajax({
                   type: "POST",
                   url: "functions/result_function.php?storeresult=true",
                   data: JSON.stringify(result_data),
                   // dataType: 'json',
                   cache: false,
                   success: function(data) {
                   var result_split = data.split('#');
                     if (result_split[0].indexOf("success") !== -1){
                      //alert(result_split[1]);
                      success_align();
	             	   $('.success_msg span').html(result_split[1]);
	             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		               $('.success_msg').show();
		               $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                      document.result_form.reset();
                      $('.result_table tbody tr:not(:last)').remove();
                      $('.total_result').text('');
                     }
                     else{
                      //alert(result_split[1]);
                      success_align();
	             	   $('.success_msg span').html(result_split[1]);
	             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		               $('.success_msg').show();
		               $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                     }
                    }
                });
              }
              else{
                //alert("Please enter the result");
                success_align();
         	    $('.success_msg span').html('Please enter the result');
         	    
           		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn_without_refresh');
                      
                $('.success_msg').show();
                $('.popup_fade').show();
                document.body.style.overflow = 'hidden';
              }
            }
         });

         $('.result_clear_act').click(function(){
          $('.enter_result').val('');
          $('.enter_points').text('');
          $('.total_result').text('');
         });

         $('.result_clear').click(function(){
          document.result_form.reset();
          $('.result_table tbody tr:not(:last)').remove();
          $('.total_result').text('');
         });

         $(document).on('click','.edit_parameter_unit',function(event) {
             var parameterunit_id = $(this).attr('data-value');
             //alert('parameterunit_id');
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
                      $('.edit_param_type_id').val(data.parametertype_id);
                 }
              });
         });
        $('.edit_range_parameter').attr("disabled",true);
        // Load parameter in range form based on selected test
        $('[name=range_test],[name=edit_range_test]').on('change',function () {
          var $this = $(this);
          selected_test = $("option:selected", this).val();
          form_data = {'test_id':selected_test};
           $.ajax({
               type: "POST",
               url: "functions/range_function.php?loadparameter=true",
               data: form_data,
               cache: false,
               success: function(data) {
                var obj = JSON.parse(data);
                var options = '<option></option>';
                  $.each(obj, function(i){
                    options += '<option value="'+obj[i].testattribute_id+'">'+obj[i].testparameter_name+'</option>';
                  });
                  if($this.hasClass('range_test')){
                    $('.range_parameter').html(options);
                    $('.range_note').hide();
                  }
                  else{
                    $('.edit_range_parameter').html(options);
                    $('.edit_range_note').hide();
                  }
                  
               }
           });
        });

        $('.parameter_remove').click(function(){
          if($('.clone_content').length !=1){
            $('.clone_content:last').remove();
          }
          return false;
        });
        $('.range_remove').click(function(){
          if($('.clone_content').length !=1){
            $('.clone_content:last').remove();
            current_id -=1;
          }
          return false;
        });

        var remove_rattr_id = [];
        $('.edit_range_remove').click(function(){
          clone_content = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content').length;
          if(clone_content!=1){
            remove_element = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last');
            remove_rattr_id.push(remove_element.find('.edit_rattr_id').val());
            remove_element.remove();
            $('.edit_remove_rattr_id').val(remove_rattr_id);
          }
          return false;
        });

        $('.assign_remove').click(function(){
          if($('.assign_clone_content').length !=1){
            $('.assign_clone_content:last').remove();
          }
          return false;
        });
        $('.assign_remove_edit').click(function(){
          if($(this).parents('.assign-schedule-popup').find('.assign_clone_content_edit').length !=1){
            $(this).parents('.assign-schedule-popup').find('.assign_clone_content_edit:last').remove();
          }
          return false;
        });



        $('[name=states_name],[name=district_name],[name=edit_states_name],[name=edit_district_name]').focus(function(){
          if($('.add_states_error').text()!='')
            $('.add_states_error').hide();
          if($('.add_district_error').text()!='')
            $('.add_district_error').hide();
          if($('.edit_states_error').text()!='')
            $('.edit_states_error').hide();
          if($('.edit_district_error').text()!='')
            $('.edit_district_error').hide();
        });

        $('.range_parameter').on('change',function () {
          var $this = $(this);
          selected_test = $("option:selected", this).val();
          form_data = {'testattribute_id':selected_test};
           $.ajax({
               type: "POST",
               url: "functions/range_function.php?paramformat=true",
               data: form_data,
               cache: false,
               success: function(data) {
                var obj = JSON.parse(data);
                $.each(obj, function(i){
                  if($this.hasClass('edit_range_parameter')){
                    $this.siblings('.range_parameter_type').val(obj[i].test_parameter_type);
                    $this.siblings('.range_parameter_unit').val(obj[i].test_parameter_unit);
                    $this.siblings('.range_parameter_format').val(obj[i].test_parameter_format);
                    if($this.siblings('.range_parameter_type').val().toLowerCase()=="time")
                      // $this.parents('.edit_range_form_id').find('.edit_range_notes').text("Enter the range in "+obj[i].test_parameter_unit);
                      $this.parents('.edit_range_form_id').find('.edit_range_notes').text("Enter Ranges for "+obj[i].test_parameter_name+" in "+obj[i].test_parameter_unit);
                    else
                      // $this.parents('.edit_range_form_id').find('.edit_range_notes').text("Enter the range in "+obj[i].test_parameter_unit+ " with "+obj[i].test_parameter_format+" formats");
                      $this.parents('.edit_range_form_id').find('.edit_range_notes').text("Enter Ranges for "+obj[i].test_parameter_name+" in "+obj[i].test_parameter_unit+ " in "+obj[i].test_parameter_format+" decimals");
                    $this.parents('.edit_range_form_id').find('.edit_range_note').show();   
                  }
                  else{
                    $('.range_parameter_type').val(obj[i].test_parameter_type);
                    $('.range_parameter_unit').val(obj[i].test_parameter_unit);
                    $('.range_parameter_format').val(obj[i].test_parameter_format);
                    if($('.range_parameter_type').val().toLowerCase()=="time")
                      $('.range_notes').text("Enter Ranges for "+obj[i].test_parameter_name+" in "+obj[i].test_parameter_unit);
                    else
                      $('.range_notes').text("Enter Ranges for "+obj[i].test_parameter_name+" in "+obj[i].test_parameter_unit+ " in "+obj[i].test_parameter_format+" decimals");
                    $('.range_note').show();
                  }
                  
                });
               }
           });
        });

        // $(document).on('blur','.r_end,.edit_r_end',function(e){
        //   value=$(this).val();
        //   start_value = $(this).parent().prev().children('.r_strt').val();
        //   if((start_value >= value) && (value!='')){
        //     $(this).next().next('.hided').addClass('custom_error').hide();
        //     $(this).next('.hided').addClass('custom_error').hide();
        //     $(this).next().next().next('.hided').addClass('custom_error').show();
        //   }
        //   else{
        //     $(this).next().next().next('.hided').removeClass('custom_error').hide();
        //   }

        // });

         $(document).on('blur','.districts',function(e){
            value=$(this).val();
            if(value == ''){
              $(this).siblings('.hided').addClass('custom_error').show();
            }
            else{
              $(this).siblings('.hided').removeClass('custom_error').hide();
            }
         });

         $(document).on('blur','.r_strt,.r_end,.edit_r_strt,.edit_r_end',function(e){
            //Checking entered range
            value=$(this).val();
            $range_parameter_type = $(this).parents('form').find('.range_parameter_type');
            $range_parameter_unit = $(this).parents('form').find('.range_parameter_unit');
            $range_parameter_format = $(this).parents('form').find('.range_parameter_format');
            if(value == ''){
              $(this).next().next().next('.hided').removeClass('custom_error').hide();
              $(this).next().next('.hided').addClass('custom_error').hide();
              $(this).next('.hided').addClass('custom_error').show();
            }
            else{
              $(this).next('.hided').removeClass('custom_error').hide();
            }
            if(($range_parameter_type.val().toLowerCase()=="time") && (value!='')){
              if($(this).hasClass('check_end_range')){
                // alert("check_end_range");
                if($(this).hasClass('r_end'))
                  start_value = $(this).parents('.clone_content').find('.r_strt').val();
                if($(this).hasClass('edit_r_end'))
                  start_value = $(this).parents('.edit_clone_content').find('.edit_r_strt').val();
                  // alert(start_value);
                  if (value <= start_value){
                    // alert("less");
                    $(this).next().next('.hided').addClass('custom_error').show();
                    $(this).next().next().next('.hided').addClass('custom_error').show();
                  }
                  else{
                    // alert("greater");
                    $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  }
              }
              if($range_parameter_format.val().toLowerCase()=="hh:mm:ss"){
                // regex=/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/;
                if(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):[0-5][0-9]$/).test(value)){
                  // alert("check time format");
                  $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                }
                else{
                  $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                }
              }
              else if($range_parameter_format.val().toLowerCase()=="hh:mm"){
                if(!(/^(?:[0-2][0-4]|[0-1][0-9]):[0-5][0-9]$/).test(value)){
                  $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                }
                else{
                  $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                }
              }
              else if($range_parameter_format.val().toLowerCase()=="mm:ss"){
                if(!(/^(?:[0-5][0-9]):[0-5][0-9]$/).test(value)){
                  $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                }
                else{
                  $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                }
              }
              else if($range_parameter_format.val().toLowerCase()=="hh:mm:ss:mss"){
                if(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value)){
                  $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                }
                else{
                  $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                }
              }
              else if($range_parameter_format.val().toLowerCase()=="mm:ss:mss"){
                if(!(/^(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value)){
                  $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                }
                else{
                  $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                }
              }
              else if($range_parameter_format.val().toLowerCase()=="ss:mss"){
                if(!(/^(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value)){
                  $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                }
                else{
                  $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                }
              }
              else if($range_parameter_format.val().toLowerCase()=="mss"){
                if(!(/^(?:[0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value)){
                  $(this).next().next().next('.hided').removeClass('custom_error').hide();
                  $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                }
                else{
                  $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                }
              }
            }
            else{
              // alert("else");
              if($(this).hasClass('check_end_range')){
                // alert("check_end_range");
                  if($(this).hasClass('r_end'))
                    start_value = $(this).parents('.clone_content').find('.r_strt').val();
                  if($(this).hasClass('edit_r_end'))
                    start_value = $(this).parents('.edit_clone_content').find('.edit_r_strt').val();
                  // alert(start_value);
                  if(value!=''){
                    if (Number(value) <= Number(start_value)){
                      $(this).next().next().next('.hided').addClass('custom_error').show();
                    }
                    else{
                      $(this).next().next().next('.hided').removeClass('custom_error').hide();
                    }
                   }
              }
              if(value!=''){
                  if(value.indexOf(".")==-1){
                  decimals = 0;
                  }
                  else{
                    decimals = value.toString().split(".")[1].length;
                  }
                  paramter_unit = $range_parameter_unit.val();
                  parameter_format = $range_parameter_format.val();
                  if(decimals > parameter_format || value.indexOf(":") !== -1){
                     $(this).next().next().next('.hided').removeClass('custom_error').hide();
                     $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                  }
                  else{
                     // $(this).next().next().next('.hided').removeClass('custom_error').hide();
                     $(this).next().next('.hided').removeClass('custom_error').text('').hide();
                  }
                  if (value.indexOf(".") !== -1 && decimals == 0){
                    $(this).next().next().next('.hided').removeClass('custom_error').hide();
                    $(this).next().next('.hided').addClass('custom_error').text('Please enter ranges in correct format').show();
                  }
              }
            }
            //add decimal places after enter the range
            if(($(this).siblings('span').is(':not(.custom_error)')) && ($range_parameter_type.val().toLowerCase()!="time") &&(value!='')){
              // alert("no error");
              // alert($range_parameter_format.val());
              // alert(decimals);
              if(value.indexOf(".")==-1){
                decimals = 0;
              }
              else{
                decimals = value.toString().split(".")[1].length;
              }
              range_data = '0';
              if($range_parameter_format.val() != decimals){
                // alert($(this).val());
                if( decimals == 0 ){
                  for(i=1;i<$range_parameter_format.val();i++){
                    range_data = range_data + '0';
                  }
                  // alert(result_data);
                }  
                else{
                  calc = $range_parameter_format.val() - decimals;
                  // alert(calc);
                  for(i=1;i<calc;i++){
                    range_data = range_data + '0';
                  }
                }  
                if ($(this).val().indexOf(".") !== -1)
                    $(this).val(value + range_data);
                else
                    $(this).val(value + '.' + range_data); 
              }
            }

         });

        $(document).on('blur','.r_point,.edit_r_point',function(e){
          value=$(this).val();
           if(value == ''){
             $(this).next('.hided').addClass('custom_error').show();
           }
           else{
             $(this).next('.hided').removeClass('custom_error').hide();
           }
        });

        //To clear selected dropdown values in edit form
        // $('.edit_athlete_clear,').click(function(){
        //   $('option').removeAttr('selected');
        // });

        $(document).on('change','.range_parameter',function () {
          current_id -= $('.clone_content:not(:first-child)').length;
          $('.clone_content:not(:first-child)').remove();
          $('.r_strt,.r_end,.r_point').val('');
        });

        //newly added for v2 by kalai
        //***********start**********
        $(document).on('change','.check_list',function () {
          $('.check_list').not(this).prop('checked', false);
          if($(this).is(':checked')){
            //$('.test-name').addClass('list_active');
            check_data = $(this).siblings('.check_data').val();
            $('.check_table').find("input[value="+check_data+"]").parents('tr').show();
            $('.check_table').find('.check_id').not("input[value="+check_data+"]").parents('tr').hide();
          }
          else{
            $('.check_table tr').show();
          }

        });

        $(document).on('change','.check_state',function () {
          $('.check_state').not(this).prop('checked', false);
          if($(this).is(':checked')){
            //$('.test-name').addClass('list_active');
            check_data = $(this).next('.check_stateid').val();
            $('.check_table').find('.districtstates_id').find("input[value="+check_data+"]").parents('tr').show();
            $('.check_table').find('.districtstates_id').not("input[value="+check_data+"]").parents('tr').hide();
          }
          else{
            $('.check_table tr').show();
          }
        });

        //newly added when change grid structure in range
        $(document).on('change','.check_testbattery',function () {
          $('.check_testbattery').not(this).prop('checked', false);
          if($(this).is(':checked')){
            //$('.test-name').addClass('list_active');
            check_data = $(this).next('.check_testbatteryid').val();
            $('.check_table').find('.rangetestbattery_id').find("input[value="+check_data+"]").parents('tr').show();
            $('.check_table').find('.rangetestbattery_id').not("input[value="+check_data+"]").parents('tr').hide();
          }
          else{
            $('.check_table tr').show();
          }
        });

        $(document).on('change','.check_parametertype',function () {
          $('.check_parametertype').not(this).prop('checked', false);
          if($(this).is(':checked')){
            check_data = $(this).attr('data-id');
            $('#param_unit_table').find('.parametertype_id').find("input[value="+check_data+"]").parents('tr').show();
            $('#param_unit_table').find('.parametertype_id').not("input[value="+check_data+"]").parents('tr').hide();
          }
          else{
            $('#param_unit_table tr').show();
          }
        });
         $(document).on('change','.test_name_hover_check',function () {
         	
          $('.test_name_hover_check').not(this).prop('checked', false);
          if($(this).is(':checked')){
            check_data = $(this).attr('data-id');
	         $('.test_attr_table').each(function(){
	         	if($(this).attr('data-id')==check_data){
	         		$(this).show();
	         	}else{
	         		$(this).hide();
	         	}
	         		
	         });
	        }
          else{
            $('#test_table tr').show();
          }
        });

		$(document).on('change','.assign_schedule_name_hover',function () {
			  $('.assign_schedule_name_hover').not(this).prop('checked', false);
			  if($(this).is(':checked')){
			    check_data = $(this).attr('data-id');
			     $('.assignschedule_category_table').each(function(){
			     	if($(this).attr('data-id')==check_data){
			     		$(this).show();
			     	}else{
			     		$(this).hide();
			     	}
			     		
			     });
			    }
			  else{
			    $('#assign_schedule_table tr').show();
			  }
		});
        // Autocomplete results for atheletes list while search
        // var at_list = [];
        // $('.athlete_list li').each(function(){
        //   at_list.push($(this).text());
        // });

        // alert(at_list);
        // $('.at_search').focus(function (e) {
        //   $(this).autocomplete({
        //     source: at_list,
        //   });
        // });

      $(document).on('keyup','.at_search,.cs_search,.dt_search,.tb_search',function(e){
        // alert("yes");
        search_value = $('.search_text').val();
          if(search_value == ''){
            $('.test-name').show();
          }else{
            $('.test-name').hide();
            $('.list_edit').each(function(){
                // if($(this).val().toLowerCase().startsWith(search_value) !== -1){
                 // alert($(this).val());
                 // alert(search_value.toLowerCase());
               if($(this).val().toLowerCase().indexOf(search_value.toLowerCase()) == 0){
                  $(this).parents('.test-name').show();
                }
            });
          }
       });

        //Autocomplete results for create schedule list while search
        // var cs_list = [];
        // $('.createschedule_list li').each(function(){
        //   cs_list.push($(this).text());
        // });

        // $('.cs_search').focus(function (e) {
        //   $(this).autocomplete({
        //     source: cs_list,
        //   });
        // });

        // $('.delete_search,.at_namelist,.cs_namelist').hide();
        // $('.search_button').click(function(){
        //   search_value = $('.search_text').val();
        //   if(search_value == ''){
        //     $('.test-name').show();
        //   }else{
        //     $('.test-name').hide();
        //     $('.test-list').find("input[value='"+search_value+"']").parents('.test-name').show();
        //   }
        // });
        
        $('.ui-district').keyup(function(){
          $('#ui-id-1').addClass('width_search');
          // $('#ui-id-1').removeAttr('style');
          // alert('test');
        });


        $('.save_athlete').click(function(e){
          athlete_id = $(this).parents('.test-name').find('.check_athleteid').val();
          athlete_name = $(this).parents('.test-name').find('.check_athletename').val();
          athlete_element = $(this).parents('.test-name').find('.check_athletename');
          form_data = {'check_athleteid':athlete_id,'check_athletename':athlete_name};
          if(athlete_name!=''){
           $.ajax({
               type: "POST",
               url: "functions/athletes_functions.php?athletename_update=true",
               data: form_data,
               cache: false,
               success: function(data) {
                var result_split = data.split('#');
                if (result_split[0].indexOf("success") !== -1){
                  //alert(result_split[1]);
                  success_align();
             	   $('.success_msg span').html(result_split[1]);
             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	               $('.success_msg').show();
	               $('.popup_fade').show();
                   document.body.style.overflow = 'hidden';
                  athlete_element.val(result_split[2]);
                  $('.search_text').val('');
                }
                else{
                  //alert(result_split[1]);
              	success_align();
         	    $('.success_msg span').html(result_split[1]);
         	     if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
                $('.success_msg').show();
                $('.popup_fade').show();
                document.body.style.overflow = 'hidden';
                }
              }
             });
           }else{
              //alert('Invalid Athlete Name!');
              success_align();
	     	  $('.success_msg span').html('Invalid Athlete Name!');
	     	  
                       		$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
                    
	          $('.success_msg').show();
	          $('.popup_fade').show();
	          document.body.style.overflow = 'hidden';
          }
        });

        $('.save_createschedule').click(function(){
          createschedule_id = $(this).parents('.test-name').find('.check_scheduleid').val();
          createschedule_name = $(this).parents('.test-name').find('.check_createschedulename').val();
          schedule_element = $(this).parents('.test-name').find('.check_createschedulename');
          form_data = {'check_scheduleid':createschedule_id,'check_createschedulename':createschedule_name};
          if(createschedule_name!=''){
          $.ajax({
               type: "POST",
               url: "functions/create_schedule_function.php?createschedulename_update=true",
               data: form_data,
               cache: false,
               success: function(html) {
                var result_split = html.split('#');
                if (result_split[0].indexOf("success") !== -1){
                  //alert(result_split[1]);
                  success_align();
		     	  $('.success_msg span').html(result_split[1]);
		     	   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		          $('.success_msg').show();
		          $('.popup_fade').show();
		          document.body.style.overflow = 'hidden';
                  // $(this).find('.check_athletename').val(result_split[2]);
                  schedule_element.val(result_split[2]);
                  $('.search_text').val('');
                }
                else{
                  //alert(result_split[1]);
                  success_align();
		     	  $('.success_msg span').html(result_split[1]);
		     	   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		          $('.success_msg').show();
		          $('.popup_fade').show();
		          document.body.style.overflow = 'hidden';
                }
              }
             });
          }else{
             //alert('Invalid Schedule Name!');
              success_align();
	     	  $('.success_msg span').html('Invalid Schedule Name!');
	     	   
              $('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
                       
	          $('.success_msg').show();
	          $('.popup_fade').show();
	          document.body.style.overflow = 'hidden';
            }
        });

        $('.save_state').click(function(){
          state_id = $(this).parents('.test-name').find('.check_stateid').val();
          state_name = $(this).parents('.test-name').find('.check_statename').val();
          state_element = $(this).parents('.test-name').find('.check_statename');
          form_data = {'edit_states_id':state_id,'edit_states_name':state_name};
          if(state_name!=''){
              $.ajax({
                   type: "POST",
                   url: "functions/edit_and_delete_function.php?editdata=true",
                   data: form_data,
                   cache: false,
                   success: function(html) {
                    var result_split = html.split('#');
                    if (result_split[0].indexOf("success") !== -1){
                      //alert(result_split[1]);
                       success_align();
			     	   $('.success_msg span').html(result_split[1]);
			     	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
			           $('.success_msg').show();
			           $('.popup_fade').show();
			           document.body.style.overflow = 'hidden';
                      // $(this).find('.check_athletename').val(result_split[2]);
                      state_element.val(result_split[3]);
                      $('.search_text').val('');
                    }
                    else{
                      //alert(result_split[1]);
                       success_align();
			     	  $('.success_msg span').html(result_split[1]);
			     	   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
			          $('.success_msg').show();
			          $('.popup_fade').show();
			          document.body.style.overflow = 'hidden';
                    }
                    //location.reload();
                  }
                 });
          }else{
              //alert('Invalid State Name!');
              success_align();
	     	  $('.success_msg span').html('Invalid State Name!');
	     	  
   				$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn_without_refresh');
                   
	          $('.success_msg').show();
	          $('.popup_fade').show();
	          document.body.style.overflow = 'hidden';
          }
        });
        //newly added when change grid structure in range
        $('.save-testbattery').click(function(){
          testbattery_id = $(this).parents('.test-name').find('.check_testbatteryid').val();
          testbattery_name = $(this).parents('.test-name').find('.check_testbatteryname').val();
          testbattery_element = $(this).parents('.test-name').find('.check_testbatteryname');
          form_data = {'edit_testbattery_id':testbattery_id,'edit_testbattery_name':testbattery_name};
          // alert(JSON.stringify(form_data));
          if(testbattery_name!=''){
              $.ajax({
                   type: "POST",
                   url: "functions/test_battery_functions.php?testbatteryname_edit=true",
                   data: form_data,
                   cache: false,
                   success: function(html) {
                    // alert(html);
                    var result_split = html.split('#');
                    if (result_split[0].indexOf("success") !== -1){
                      //alert(result_split[1]);
                      // $(this).find('.check_athletename').val(result_split[2]);
                      success_align();
	             	   $('.success_msg span').html(result_split[1]);
	             	    if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
		               $('.success_msg').show();
		               $('.popup_fade').show();
	                   document.body.style.overflow = 'hidden';
                      testbattery_element.val(result_split[3]);
                      $('.search_text').val('');
                    }
                    else{
                      //alert(result_split[1]);
                      success_align();
			     	  $('.success_msg span').html(result_split[1]);
			     	   if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
			          $('.success_msg').show();
			          $('.popup_fade').show();
			          document.body.style.overflow = 'hidden';
                    }
                    //location.reload();
                  }
                 });
          }else{
              alert('Invalid Testbattery Name!');
               success_align();
	     	  $('.success_msg span').html('Invalid Testbattery Name!');
	     	   
                       		$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
                     
	          $('.success_msg').show();
	          $('.popup_fade').show();
	          document.body.style.overflow = 'hidden';
          }
        });


        $(document).on('click','.edit_range_points',function(e){
            element = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last');
            if((element.children().find('.edit_r_strt').val() == '') || (element.children().find('.edit_r_end').val() == '') || (element.children().find('.edit_r_point').val() == '') || (element.children().find('.edit_r_strt').val() == '') || (element.children().find('.edit_r_end').val() == '') || (element.children().find('.edit_r_point').val() == ''))
            {
              element.children().find('input[type="text"]').next().addClass('custom_error');
              e.preventDefault();
            }
            else if($('.edit_range_holder').find('.hided').hasClass('custom_error')){
                e.preventDefault();
            }
            else{
              element.children().find('input[type="text"]').next().removeClass('custom_error');
              length = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content').length;
              var id = length+1;
              newElement = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last').clone();
              previous_end_value = newElement.find('#edit_end'+(id-1)).val();
              newElement.find('.edit_range_label').remove();
              newElement.find('.edit_rattr_id').removeAttr('name').attr('name', 'edit_rangeattr_id'+id).val('');
              newElement.find('.edit_r_id').removeAttr('name').attr('name', 'edit_range_id'+id).val('');
              // newElement.find('.edit_r_strt').removeAttr('name').attr('name', 'edit_range_start'+id).val($('#edit_end'+(id-1)).val());
              newElement.find('.edit_r_strt').removeAttr('name').attr('name', 'edit_range_start'+id).val(previous_end_value);
              newElement.find('.edit_r_end').removeAttr('name').attr('name', 'edit_range_end'+id).val('');
              newElement.find('.edit_r_point').removeAttr('name').attr('name', 'edit_range_points'+id).val('');
              newElement.find('.edit_r_strt').removeAttr('id').attr('id','edit_strt'+id);
              newElement.find('.edit_r_end').removeAttr('id').attr('id','edit_end'+id);
              newElement.find('.edit_r_point').removeAttr('id').attr('id','edit_point'+id);
              newElement.appendTo($(".edit_range_holder"));
              $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last').attr('id','edit_range_counter'+id);
           }
           return false;
        });

        $('.edit_district_add').click(function(){
            length = $(this).parents('.popup-add-district').siblings('.edit_clone_district').find('.edit_form_district').length;
            var id = length+1;
            newElement = $(this).parents('.popup-add-district').siblings('.edit_clone_district').find('.edit_form_district:last').clone();
            newElement.find('.edit_district_label').remove();
            newElement.find('.edit_district_input').removeAttr('name').attr('name', 'edit_district_name'+id).val('');
            newElement.find('.edit_district_input').removeAttr('id').attr('id','edit_d'+id);
            newElement.appendTo($(".edit_clone_district"));
            $(this).parents('.popup-add-district').siblings('.edit_clone_district').find('.edit_form_district:last').attr('id','edit_district_counter'+id);
        });

        // $('.edit_add_assign').click(function(){
        //   length = $(this).parents('.assign-add-button').siblings('.clone_schedule_update_content').find('.clone_schedule_update').length;
        //   var id = length+1;
        //   newElement = $(this).parents('.assign-add-button').siblings('.clone_schedule_update_content').find('.clone_schedule_update:last').clone();
        //   newElement.find('.athlete_name_update').removeAttr('name').attr('name','athlete_name'+id);
        //   newElement.find('.athlete_name_update option:selected').removeAttr('selected');
        //   newElement.find('.bib_update').removeAttr('name').attr('name','athlete_bib'+id).val('');
        //   newElement.find('.bib_update').removeAttr('name').attr('name','athlete_bib'+id).val('');dob_update
        //   newElement.appendTo($(".clone_schedule_update_content"));
        // });

        // var st_list = [];
        // $('.check_statename').each(function(){
        //   st_list.push($(this).val());
        // })
        // $('.dt_search').focus(function (e) {
        //   $(this).autocomplete({
        //     source: st_list,
        //   });
        // });
        //newly added for result to handle incomplete results
        $(document).on('change','.status_incomplete',function () {
          test_value = $(this).parents('tr').find('.result_test_name').text();
          if($(this).is(':checked')){
            $('.result_test_name').each(function(){
              if($(this).text() == test_value){
                $(this).siblings().find('.enter_result').val('0').addClass('result_restrict').attr('disabled',true);
                $(this).siblings().find('.enter_points').text('0');
                $(this).siblings().find('.enter_result_error').removeClass('error').hide();
                $(this).siblings().find('.status_incomplete').attr("checked",true);
              }
            });
           //Points total result
            var val=0;
            $(".enter_points").each(function() {
              val += Number($(this).text());
              $('.total_result').text(val);
            });
          }
          else{
            $('.result_test_name').each(function(){
              if($(this).text() == test_value){
                 $(this).siblings().find('.enter_result').val('').removeClass('result_restrict').attr('disabled',false);
                 $(this).siblings().find('.enter_points').text('');
                 $(this).siblings().find('.status_incomplete').attr("checked",false);
              }
            });
            $('.result-select').attr("checked",false);
          }
        });

        //newly added for select all logic for dnf(did not finish) in result
        $(document).on('change','.result-select',function () {
          if($(this).is(':checked')){
            $('.result_table input[name="status_incomplete"]').each(function(){
              $(this).prop("checked",true);
              //newly added
              $(this).parents('tr').find('.enter_result').val('0').addClass('result_restrict').attr('disabled',true);
              $(this).parents('tr').find('.enter_points').text('0');
              $(this).parents('tr').find('.enter_result_error').removeClass('error').hide();
              $(this).parents('tr').find('.status_incomplete').attr("checked",true);
            });
          }
          else{
            $('.result_table input[name="status_incomplete"]').each(function(){
              $(this).prop("checked",false);
              //newly added
               $(this).parents('tr').find('.enter_result').val('').removeClass('result_restrict').attr('disabled',false);
               $(this).parents('tr').find('.enter_points').text('');
               $(this).parents('tr').find('.status_incomplete').attr("checked",false);   
            });
          }
        });

        $(document).on('click','.yes_btn_dt',function() {
          var del_id =$('#delete_id').val();
          var form_data = {'delete_id':del_id};
          $.ajax({
               type: "POST",
               url: "functions/district_function.php?deletestate=true",
               data: form_data,
               cache: false,
               success: function(html) {
               var result_split = html.split('#');
               if (result_split[0].indexOf("success") !== -1){
                //alert(result_split[1]);
                //location.reload();
                success_align();
		     	$('.success_msg span').html(result_split[1]);
		        $('.success_msg').show();
		        $('.popup_fade').show();
		        document.body.style.overflow = 'hidden';
                }
               }
           });
        });
        $(document).on('click','.yes_btn_tb',function() {
          var del_id =$('#delete_id').val();
          var form_data = {'delete_id':del_id};
          // alert(JSON.stringify(form_data));
          $.ajax({
               type: "POST",
               url: "functions/test_battery_functions.php?delete_test_battery_name=true",
               data: form_data,
               cache: false,
               success: function(html) {
                //alert("Testbattery Deleted");
                //location.reload();
                success_align();
	     	  	$('.success_msg span').html('Testbattery Deleted');
	     	  	 if($('.success_msg input').hasClass('alert_btn_without_refresh')){
                       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
                       	}
	          	$('.success_msg').show();
	          	$('.popup_fade').show();
	          	document.body.style.overflow = 'hidden';
               }
           });
        });
        $('.assign_schedule_search').keyup(function() {
              $('.test-list').empty();
              var assign_sch_name = $(this).val();
              //alert(testname);
              if(assign_sch_name != ''){
                  $.ajax({
                       type: "POST",
                       url: "functions/assign_schedule_function.php?find_create_schedule=true",
                       data:{'id':assign_sch_name},
                       cache: false,
                       dataType:'json',
                       success: function(data) {
                           $('.test-list').empty();
                           //alert(data);
                           if(data !=''){
                               $.each(data, function(i){
                                   //alert(data[i].test_name);
                                   $('.test-list').append(
                                   '<span class="test-name assign-test_name">\
                                       <input type="checkbox" name="test" value="test" class="check_test check_list assign_schedule_name_hover" id="check-select"  data-id ="'+data[i].createschedule_id+'">\
                                       <input type="text" name="test" value="'+data[i].createschedule_name+'" class="list_edit assing_name_hover input_wrap">\
                                       <span class="test-alter">\
                                           <i class="fa fa-floppy-o save_item save_assign_schdule_name"></i>\
                                           <i class="fa fa-pencil-square-o edit_item"></i>\
                                           <i class="fa fa-trash-o delete_item"></i>\
                                       </span>\
                                   </span>\
                                   <div class="delete_div delete_search">\
                                       <!-- <code class="close_btn cancel_btn"> </code>  -->\
                                         <div class="del_title">\
                                           <span class="del_txt">DELETE</span>\
                                         </div>\
                                         <div class="del_content">\
                                           <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                           <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                           <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="assign_schedule_name" data-id ="'+data[i].createschedule_id+'">\
                                           <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                         </div>\
                                   </div>');
                                    $('.edit_item,.save_item,.delete_item').hide();
                               });
                           }
                      }
                   });
              }else{
                  $.ajax({
                       type: "POST",
                       url: "functions/assign_schedule_function.php?find_all_create_schedule=true",
                       data:{'id':'all'},
                       cache: false,
                       dataType:'json',
                       success: function(data) {
                           $('.test-list').empty();
                           //alert(data);
                           if(data !=''){
                               $.each(data, function(i){
                                   //alert(data[i].test_name);
                                   $('.test-list').append(
                                   '<span class="test-name assign-test_name">\
                                       <input type="checkbox" name="test" value="test" class="check_test check_list assign_schedule_name_hover" id="check-select"  data-id ="'+data[i].createschedule_id+'">\
                                       <input type="text" name="test" value="'+data[i].createschedule_name+'" class="list_edit input_wrap assing_name_hover">\
                                       <span class="test-alter">\
                                           <i class="fa fa-floppy-o save_item save_assign_schdule_name"></i>\
                                           <i class="fa fa-pencil-square-o edit_item"></i>\
                                           <i class="fa fa-trash-o delete_item"></i>\
                                       </span>\
                                   </span>\
                                   <div class="delete_div delete_search">\
                                       <!-- <code class="close_btn cancel_btn"> </code>  -->\
                                         <div class="del_title">\
                                           <span class="del_txt">DELETE</span>\
                                         </div>\
                                         <div class="del_content">\
                                           <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                           <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                                           <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="assign_schedule_name" data-id ="'+data[i].createschedule_id+'">\
                                          	<input type="hidden" name="delete_id" value="" id="delete_id"/>\
                                         </div>\
                                   </div>');
                                    $('.edit_item,.save_item,.delete_item').hide();
                               });
                           }
                      }
                   });
              }
          });
  		// $(document).on('change','.assign_schedule_name_hover',function(){
			// if(this.checked){
			 	// $('#assign_schedule_table tbody').empty();
				// var create_schedule_id = $(this).attr('data-id');
				// $.ajax({
			    	// type: "POST",
			    	// url: "functions/assign_schedule_function.php?append_schedules=true",
			    	// data:{'id':create_schedule_id},
			    	// cache: false,
			    	// dataType:'json',
			    	// success: function(data) {
 						// var category_dynamic = '';
						// $.each(data.cate, function(i){
							 // category_dynamic += "<option value='"+data.cate[i].categories_id+"'>"+data.cate[i].categories_name+"</option>";
                        // });
                        // var athelete_dynamic = '';
						// $.each(data.athe, function(i){
							 // athelete_dynamic += "<option value='"+data.athe[i].athlete_id+"'>"+data.athe[i].athlete_name+"</option>";
                        // });
                        // $.each(data.assign, function(i){
                        	// $('#assign_schedule_table tbody').append('\
                        		// <tr class="delete_color assignschedule_popup_open">\
			      					// <input value="'+data.assign[i].assignschedule_id+'" type="hidden">\
									// <td>'+data.assign[i].categories_name+'</td>\
			        				// <td class="popup-edit">\
			        					// <span class="edit_state edit_assign_schedule" data-schedule="'+data.assign[i].createschedule_id+'" data-category="'+data.assign[i].assigncategory_id+'"><i class="fa fa-pencil-square-o"></i></span>\
		        						// <span class="delete_state" data-value="'+data.assign[i].assignschedule_id+'"><i class="fa fa-trash-o"></i></span>\
										// <div class="assign-schedule-popup popup_hidden">\
			          						// <code class="close_btn cancel_btn"> </code>\
			          						// <div class="edit_title"><span class="del_txt">Edit Schedule Details</span></div>\
			          						// <div class="container state-content col-md-12 assign-scroll">\
				          						// <div class="col-xs-12 col-md-12 align_margin">\
													// <form id="edit_assign_schedule_form" action="functions/assign_schedule_function.php" method="post">\
														// <div class="form-group">\
															  // <input type="hidden" class="schedule_update_id" value="" />\
																// <input type="hidden" class="create_schedule_update_id" name="create_schedule_update_id" value="" />\
														// </div>\
														// <div class="form-group">\
											  				// <label for="sel1" class="popup_label">Select Category Name</label>\
											  				 // <input type="hidden" class="category_update1" name="category" value="" />\
											  				// <select class="form-control adjust_width classic category_update box-width" id="sel1" name="category" data-validation-error-msg="Please Select Category of the Schedule" data-validation="required" disabled="">\
																// <option value="">Select Category Name</option>\
																// '+category_dynamic+'\
										  					// </select>\
														// </div>\
														// <label for="athlete" class="email_txt popup_label">Add Athletes</label><br>\
														// <div class=" clone_schedule_update_content assign_clone_content_edit_holder col-md-12">\
															// <div class="assign_clone_content_edit clone_schedule_update">\
																// <input type="hidden" class="assign_athelete_count_edit" value="1" />\
																// <div class="form-group col-md-6"  style="padding: 0px;">\
																	// <div class="col-md-7 combo--align--popup align_atheletes_schedules">\
																	// <select class="form-control name_align_popup fl athlete_name athlete_name_update athlete_name1" placeholder="Name" name="athlete_name[]"  data-validation-error-msg="Please Select Athlete" data-validation="required">\
																		// <option value="">Athletes</option>\
																		// '+athelete_dynamic+'\
																	// </select>\
																// </div>\
																// <div class="col-md-5" style="position: relative; top: 20px;">\
														      		// <input type="text" class="form-control bib_popup fl dob_update dob"  placeholder="Date" value="" disabled>\
														    	// </div>\
											    			// </div>\
											    			// <div class="form-group col-md-6">\
														    	// <div class="col-md-4">\
														      		// <input type="text" class="form-control schedule-name fl mobile_update mobile" placeholder="Mobile no" value="" disabled>\
														      	// </div>\
														      	// <div class="col-md-8">\
														      		// <input type="text" class="form-control bib_popup athlete_bib popup_bib fl bib_update"  placeholder="BIB NO" name="athlete_bib[]" autocomplete="off" data-validation-error-msg="Please Enter the BIBO NO" data-validation="number">\
																// </div>\
											    			// </div>\
														    // <div class="assign-delete col-md-12 edit_assign_schedule_delete">\
																// <span><i class="fa fa-trash-o"></i>Delete</span>\
															// </div>\
														// </div>\
													// </div>\
													// <div class="form-group assign-add-button popup-add-assign col-md-4">\
														// <div class="add-assign">\
															// <span class="edit_assign_schedule_add_btn">Add<i class="fa fa-plus plus_align_assign "></i></span>\
														// </div>\
													// </div>\
													// <input type="hidden" name="assing_schedule_update" value="1" />\
													// <div class="col-md-9 align_right schedule_btn">\
					  									// <input type="submit" value="Save" class="btn btn-primary test-submit clear">\
					  									// <input type="reset" value="Cancel" class="btn btn-primary clear" maxlength="50">\
													// </div>\
												// </form>\
											// </div>\
										// </div>\
									// </div>\
									// <div class="delete_div delete_catagory_div delete-assign">\
						            	// <div class="del_title">\
						                	// <span class="del_txt">DELETE</span>\
						              	// </div>\
						              	// <div class="del_content">\
						                	// <span class="del_content_txt">Are you sure you want to delete this record?</span>\
						                	// <input type="button" class="btn btn-primary align_right no_btn" value="No">\
						                	// <input type="button" class="btn btn-primary align_right yes_btn" data-delete= "assign_schedule_attribute" value="Yes" data-schedule="'+data.assign[i].createschedule_id+'" data-category="'+data.assign[i].assigncategory_id+'">\
						                	// <input type="hidden" name="delete_id" value="" id="delete_id"/>\
						              	// </div>\
									// </div>\
				   				// </td>\
		      				// </tr>\
                        	// ');
                        // });
//                         
			    	// }
				// });
			// }
  		// });
  		
  		$(document).delegate('.assign_clone_content .athlete_bib','blur',function(){
          var j = 0;
          var currentInput  = $(this).val();
        $(this).parents('.assign_content_holder').find(".athlete_bib").each(function(index) {
          if(currentInput === $(this).val()) {
              j++;
          }
        });
        if(j=='2'){
                success_align();
	     	  	$('.success_msg span').html('Bib No. already assigned!');
	     	  	
           		$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
                 
	          	$('.success_msg').show();
	          	$('.popup_fade').show();
	          	document.body.style.overflow = 'hidden';
            $(this).parents('.assign_clone_content').find('.athlete_bib').val('');
        }
      });
      
      $(document).delegate('.assign_clone_content_edit .athlete_bib','blur',function(){
          var j = 0;
          var currentInput  = $(this).val();
        $(this).parents('.assign_clone_content_edit_holder').find(".athlete_bib").each(function(index) {
          if(currentInput === $(this).val()) {
              j++;
          }
        });
        if(j=='2'){
           
            success_align();
	     	  	$('.success_msg span').html('Bib No. already assigned!');
	     	  	
           		$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
                 
	          	$('.success_msg').show();
	          	$('.popup_fade').show();
	          	document.body.style.overflow = 'hidden';
            $(this).parents('.assign_clone_content_edit').find('.athlete_bib').val('');
        }
      });
  	$(document).on('change','.report_checkbox', function(event) {
		if(this.checked){
			$(this).parents('.checkbox').find('.report_checkbox_name').prop( "checked", true );
		}else{
			$(this).parents('.checkbox').find('.report_checkbox_name').prop( "checked", false );
		}
	});
        
        //********* end *********
    });
    
    $(document).bind("click", function(e) {
    	if (document.location.href.match(/[^\/]+$/)[0] != 'assign_schedule.php'){
         var popup = $(".popup_hidden");
         if (!$('.fa-pencil-square-o,.ui-menu-item').is(e.target) && !popup.is(e.target) && popup.has(e.target).length == 0) {
             popup.hide();
             $('.edit_state').parents('tr').siblings().children('.popup-edit').show();
             $('.edit_remove_rattr_id').val('');
          }
         var del_popup = $(".delete_div");
          if (!$('.fa-trash-o').is(e.target) && !del_popup.is(e.target) && del_popup.has(e.target).length == 0) {
             del_popup.hide();
             $('.edit_remove_rattr_id').val('');
         }
        }
      });
     
     
    $(document).on('click','.edit_assign_schedule_delete',function(){
  		$(this).parents('.assign_clone_content_edit').remove();
  		//alert($(this).parents('.assign_clone_content_edit').html());
  		return false;
    });

    
     
     $(document).on("click",".edit_state",function(){
        // get the scollTop (distance scrolled from top)
        var scrollTop = $("table").scrollTop();
        // get the top offset of the dropdown (distance from top of the page)
        var topOffset = $(".table").offset().top;
        // calculate the dropdown offset relative to window position
        var relativeOffset = topOffset-scrollTop;
        // get the window height
        var windowHeight = $(window).height();

        // if the relative offset is greater than half the window height,
        // reverse the dropdown.
        if(relativeOffset > windowHeight/2){
            $(".popup_hidden").addClass("reverse");
        }
        else{
            $(".popup_hidden").removeClass("reverse");
        }
    });
	
	
