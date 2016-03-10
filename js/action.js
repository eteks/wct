// function state_center_align(){
//       var height=$('.state_div').height();
//       var width=$('.state_div').width();
//       $('.state_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
// function delete_center_align(){
//       var height=$('.delete_div').height();
//       var width=$('.delete_div').width();
//       $('.delete_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
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
// function test_center_align(){
//       var height=$('.test_div').height();
//       var width=$('.test_div').width();
//       $('.test_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
// function district_center_align(){
//       var height=$('.district_div').height();
//       var width=$('.district_div').width();
//       $('.district_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
// function athletes_center_align(){
//       var height=$('.athletes_div').height();
//       var width=$('.athletes_div').width();
//       $('.athletes_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
// function createschedule_center_align(){
//       var height=$('.createschedule_div').height();
//       var width=$('.createschedule_div').width();
//       $('.createschedule_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
// function test_battery_center_align(){
//       var height=$('.test_battery_div').height();
//       var width=$('.test_battery_div').width();
//       $('.test_battery_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
// function range_center_align(){
//       var height=$('.range_div').height();
//       var width=$('.range_div').width();
//       $('.range_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }
// function parameter_center_align(){
//       var height=$('.paramter_div').height();
//       var width=$('.paramter_div').width();
//       $('.paramter_div').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
// }

// function package_menu() {
//     var wh = window.innerHeight;
//     var smh = wh - 43;
//     if (wh < 150) {
//         $('.footer').css({'top': smh + "px"});
//         $('body').css({'height': wh + "px", 'max-height': "150px"});
//     } else {
//         $('.footer').css('top', '50%');
//         $('body').css('height', "150px", 'max-height', "150px");
//     }
// }
function package_menu(){
  var dh = $(document).height();
  var wh = $(window).innerHeight() - 34;
  if ( dh > wh ) {
      $('.footer_txt').css('bottom', "0px");
      $('.footer_txt').addClass('bottom_alignment_footer');
      $('.footer_txt').fadeIn();
    }
  else {
    $('.footer_txt').css({'top': wh + "px"});
    $('.footer_txt').fadeIn();

  }

}

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
              $('.popup_fade').show();
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
            });
            $('.popup_fade').show();
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
          $('.popup_fade').show();
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
            $('.popup_fade').show();
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
            $('[name=edit_range_test]').html(rangetest_options);

            var rangecategory_options = '<option></option>';
            $.each(rangecategory_obj, function(i){
              rangecategory_options += '<option value="'+rangecategory_obj[i].categories_id+'">'+rangecategory_obj[i].categories_name+'</option>';
            });
            $('[name=edit_range_category]').html(rangecategory_options);

            $.each(range_obj, function(i){
              $('[name=edit_range_id').val(range_obj[i].range_id);
              $('[name=edit_range_testbattery]').find("option:contains("+range_obj[i].rangetestbattery_name+")").attr("selected","selected");
              $('[name=edit_range_category]').find("option[value="+range_obj[i].rangecategory_id+"]").attr("selected","selected");
              $('[name=edit_range_test]').find("option[value="+range_obj[i].rangetest_id+"]").attr("selected","selected");

              $('[name=edit_range_parameter]').html('<option value="'+range_obj[i].rangetestattribute_id+'" selected>'+range_obj[i].rangeparameter_name+'</option>');
              if(range_obj[i].rangeparameter_type == "time" || range_obj[i].rangeparameter_type == "Time")
                $('.edit_range_notes').text("Enter the range in "+range_obj[i].rangeparameter_unit+ " format");
              else
                $('.edit_range_notes').text("Enter the range in "+range_obj[i].rangeparameter_unit+ " with "+range_obj[i].rangeparameter_format +" format");
              $('.range_parameter_type').val(range_obj[i].rangeparameter_type);
              $('.range_parameter_unit').val(range_obj[i].rangeparameter_unit);
              $('.range_parameter_format').val(range_obj[i].rangeparameter_format);
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
                    alert('This athelete already assigned another category!');
                    main.val('');
                    main.parents('.assign_clone_content').find('.dob').val('');
                    main.parents('.assign_clone_content').find('.mobile').val('');
                }
          }
       });
    $(".assign_clone_content .custom-combobox-input").each(function(index) {
      if(currentInput === $(this).val()) {
          j++;
      }
    });
    if(j=='2'){
        alert('Already Exists!');
        $(this).val('');
        $(this).parents('.assign_clone_content').find('.dob').val('');
        $(this).parents('.assign_clone_content').find('.mobile').val('');
        //alert($(this).parents('.assign_clone_content').find('date_assign dob').val('').html());
    }
  });
  $(document).delegate('.assign_clone_content_edit .athlete_name','change',function(){
      var j = 0;
      var main_content =  $(this).parents('.assign_clone_content_edit');
      var schedule = $('.create_schedule_update_id').val();
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
                    alert('This athelete already assigned another category!');
                    $('option:selected',main_content).removeAttr('selected');

                    main_content.find('.dob').val('');
                    main_content.find('.mobile').val('');
                }
          }
       });
    $(".assign_clone_content_edit .athlete_name").each(function(index) {
      if(currentInput === $(this).val()) {
          j++;
      }
    });
    if(j=='2'){
        alert('Already Exists!');
        //$(this).val('');
        $('option:selected',this).removeAttr('selected');
        $(this).parents('.assign_clone_content').find('.dob').val('');
        $(this).parents('.assign_clone_content').find('.mobile').val('');
        //alert($(this).parents('.assign_clone_content').find('date_assign dob').val('').html());
    }
  });

$(window).load(function() {
    $('.check_table').find('tbody tr').not(':first').hide();
});

$(document).ready(function () {

   $(".edit_state").click(function(){
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
  package_menu();

  $('.add_createschedule_act,.edit_createschedule_act,.add_athletes_act,.edit_athletes_act').on('click', function(){
     $('.day, .month, .year').attr('data-validation', 'required');
    });

    $('.edit_item,.save_item,.delete_item').hide();
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
                                     <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_name" data-id ="'+data[i].test_id+'">\
                                     <input type="button" class="btn btn-primary align_right no_btn" value="No">\
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
                                     <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_name" data-id ="'+data[i].test_id+'">\
                                     <input type="button" class="btn btn-primary align_right no_btn" value="No">\
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
                                       <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                                       <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_battery_name" data-id ="'+data[i].testbattery_id+'">\
                                       <input type="button" class="btn btn-primary align_right no_btn" value="No">\
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
                                       <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_battery_name" data-id ="'+data[i].testbattery_id+'">\
                                       <input type="button" class="btn btn-primary align_right no_btn" value="No">\
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
                                     <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="parametertype_name" data-id ="'+data[i].parametertype_id+'">\
                                     <input type="button" class="btn btn-primary align_right no_btn" value="No">\
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
                                     <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="parametertype_name" data-id ="'+data[i].parametertype_id+'">\
                                     <input type="button" class="btn btn-primary align_right no_btn" value="No">\
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
                  alert('Paramstype name updated successfully!');
                  location.reload();
              }
           }
      });

  });
    $(document).on('change','.test_name_hover_check',function(event) {
        //alert($(this).attr('data-id'));

      if(this.checked) {
        //alert($(this).attr('data-id'));
         $('#test_table tbody').empty();
        var test_id = $(this).attr('data-id');
        $.ajax({
             type: "POST",
             url: "functions/test_functions.php?find_test_attribute=true",
             data:{'id':test_id},
             cache: false,
             dataType:'json',
             success: function(data) {
                 //alert(JSON.stringify(data.test));
                 $('#test_table tbody').empty();
                 if(data.test){
                      var param_dynamic = '';
                    $.each(data.param, function(i){
                         param_dynamic += "<option value='"+data.param[i].parametertype_name+"'>"+data.param[i].parametertype_name+"</option>";
                     });
                      $.each(data.test, function(i){
                          $('#test_table tbody').append('\
      				      <tr class="align_center delete_color">\
      						<input type="hidden" value="'+data.test[i].test_attribute_id+'" id="test_attribute_id">\
      				        <td>'+data.test[i].test_parameter_name+'</td>\
      				        <td>'+data.test[i].test_parameter_type+'</td>\
      				        <td>'+data.test[i].test_parameter_unit+'</td>\
      				        <td>'+data.test[i].test_parameter_format+'</td>\
      				        <td class="popup-edit">\
      				        	<span class="edit_state edit_test" data-value="'+data.test[i].test_attribute_id+'" data-test-id="'+data.test[i].test_id+'"><i class="fa fa-pencil-square-o"></i></span>\
      			        		<span class="delete_state" data-value="'+data.test[i].test_attribute_id+'"><i class="fa fa-trash-o"></i></span>\
      			        			<div class="test_div popup_hidden">\
      					          		<code class="close_btn cancel_btn"> </code>\
      					          		<div class="edit_title">\
      					                	<span class="del_txt">Edit Detail</span>\
      					              	</div>\
      					          			<div class="container col-md-12">\
      						          			<div class="col-xs-12 col-md-12">\
      									<form id="test_updation_form" action="functions/test_functions.php" method="post">\
      										<div class="parameter_holder">\
      											<div class="form-group" style="margin: 0;">\
      												<label class="popup_label">Enter Parameter Name</label><br>\
      												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:220px !important;height: 30px;">\
      											</div>\
      											<div class="form-group col-md-8 test_percentage parameter_type_parent">\
      												<div class="col-md-12" style="padding: 0;">\
      													<label class="popup_label">Type</label>\
      													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">\
      														<option value=""></option>\
                                                            '+param_dynamic+'\
      													</select>\
      												</div>\
      												<div class="col-md-12" style="padding: 0;">\
      													<label class="popup_label">Unit</label>\
      													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">\
      													</select>\
      												</div>\
      												<div class="col-md-12" style="padding: 0;">\
      													<label class="popup_label">Format</label>\
      													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required">\
      														<option value="">Format</option>\
      														<option value="0">0</option>\
      														<option value="1">1</option>\
      														<option value="2">2</option>\
      														<option value="3">3</option>\
      														<option value="4">4</option>\
      														<option value="5">5</option>\
      													</select>\
      												</div>\
      											</div>\
      										</div>\
      										<input class="parameter_update" type="hidden" name="parameter_update" value="" />\
      										<input class="test_update_id" type="hidden" name="test_update_id" value="" />\
      										<div class="col-md-12 schedule_btn">\
      											<input type="submit" class="btn btn-primary align_right  clear" value="Save">\
      										</div>\
      									</form>\
      								</div>\
      							</div>\
      			                </div>\
      							<div class="delete_div delete_test_div">\
      						              <div class="del_title">\
      						                <span class="del_txt">DELETE</span>\
      						              </div>\
      						              <div class="del_content">\
      						                <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
      						                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_attribute" data-id ="'+data.test[i].test_attribute_id+' "data-test-id="'+data.test[i].test_id+'">\
      						                <input type="button" class="btn btn-primary align_right no_btn" value="No">\
      						                <input type="hidden" name="delete_id" value="" id="delete_id"/>\
      						              </div>\
        								</div>\
      				        </td>\
      						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="'+data.test[i].test_attribute_id+'" />\
      				      </tr>');
                      });
                 }else{
                     alert('No Parameter availabel!');
                 }
             }
        });
    }
    });
    $(document).on('change','.test_battery_name_hover_check', function(event) {
        //alert($(this).attr('data-id'));
         //$('#test_battery_table tbody').empty();
         if(this.checked){
        var test_battery_id = $(this).attr('data-id');
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
    }
    });
  // $('input:checkbox').change(function(){
  //   if($(this).is(":checked")) {
  //       $('.list_edit').addClass("list_edit_rollover");
  //   } else {
  //       $('.list_edit').removeClass("list_edit_rollover");
  //   }
  // });
  $(document).delegate('.edit_save_button','click',function() {
      var test_id = $(this).parents('.test-name').find('.list_edit').attr('data-id');
      var test_name = $(this).parents('.test-name').find('.list_edit').val();
      $.ajax({
           type: "POST",
           url: "functions/test_functions.php?test_name_update=true",
           data:{'test_id':test_id,'test_name':test_name},
           cache: false,
           success: function(data) {
              //alert(data);
              if(data.trim() == 'succeed'){
                  alert('Test name updated successfully!');
                  location.reload();
              }
           }
      });

  });
  $(document).delegate('.save_test_battery_name','click',function() {
      var test_battery_id = $(this).parents('.test-name').find('.list_edit').attr('data-id');
      var test_battery_name = $(this).parents('.test-name').find('.list_edit').val();
      $.ajax({
           type: "POST",
           url: "functions/test_battery_functions.php?testbattery_name_update=true",
           data:{'test_battery_id':test_battery_id,'test_battery_name':test_battery_name},
           cache: false,
           success: function(data) {
              //alert(data);
              if(data.trim() == 'succeed'){
                  alert('Test battery name updated successfully!');
                  location.reload();
              }
           }
      });

  });
  $(document).delegate('.edit_item', 'click', function(event) {
      $(this).parents('.test-name').find('.list_edit').removeAttr('disabled');
  });
  var test_name_for_edit_purpose = '';
  $(document).delegate('.test-name', 'mouseenter', function(event){
    $(this).children().find('.edit_item,.delete_item').show();
    $('.save_item').hide();
    test_name_for_edit_purpose = $(this).find('.test_name_value').val();
  });

   $(document).delegate('.test-name','mouseleave',function(event){
    $('.edit_item,.delete_item,.save_item').hide();
    $('.list_edit').removeClass('list_edit_rollover');
    $(this).find('.list_edit').attr('disabled', 'disabled');
    $(this).find('.test_name_value').val(test_name_for_edit_purpose);
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

  $("input").attr('maxlength','50').attr('autocomplete', 'off');;

 	// state_center_align();
  // delete_center_align();
  login_center_align();
  register_center_align();
  // test_center_align();
  // district_center_align();
  // test_battery_center_align();
  // range_center_align();
  // parameter_center_align();
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
$('.reset_form').on('click',function(){
  $("#cs_form").find("select").each(function (index) {
         var ctrl=$(this);
          $(ctrl.children()).each(function(index) {
              if (index===0) $(this).attr('required', 'required');
              else $(this).removeAttr('required');
          });
  });
});
   //Edit popup
  	$(document.body).delegate('.edit_state','click',function() {
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
                 current_popup.parents('.popup-edit').find('.test_parameter_name_update').val(data.test_parameter_name);
                 current_popup.parents('.popup-edit').find('.parameter_type_update option[value="'+data.test_parameter_type+'"]').attr('selected','selected');
                // current_popup.parents('.popup-edit').find('.parameter_format_update option[value="'+data.test_parameter_format+'"]').attr('selected','selected');
                 if(data.test_parameter_type.toLowerCase() == 'time'){
                     var paremeter_unit = data.test_parameter_unit;
                     $.ajax({
                          type: "POST",
                          url: "functions/parameter_unitfunction.php?param_unit_for_test_edit=true",
                          data:{'type':'time'},
                          cache: false,
                          dataType:'json',
                           success: function(data) {
                               //alert(JSON.stringify(data));
                                var parameter_unit = '';
                                $.each(data, function(i){
                                    if(data[i].parameterunit == paremeter_unit ){
                                        parameter_unit += "<option value='"+data[i].parameterunit+"' selected>"+data[i].parameterunit+"</option>";
                                    }
                                    else{
                                        parameter_unit += "<option value='"+data[i].parameterunit+"'>"+data[i].parameterunit+"</option>";
                                    }
                                });
                                current_popup.parents('.popup-edit').find('.parameter_unit_update').append(parameter_unit);
                           }});
                           //alert(data.test_parameter_unit);

                           current_popup.parents('.popup-edit').find('.parameter_format_update').empty().append("<option value='"+data.test_parameter_unit+"'>"+data.test_parameter_unit+"</option>");

                }else{
                     var paremeter_unit = data.test_parameter_unit;
                     //alert(paremeter_unit);
                    $.ajax({

                         type: "POST",
                         url: "functions/parameter_unitfunction.php?param_unit_for_test_edit=true",
                         data:{'type':data.test_parameter_type},
                         cache: false,
                         dataType:'json',
                          success: function(data) {
                              var parameter_unit = '';
                              $.each(data, function(i){
                                  if(data[i].parameterunit == paremeter_unit ){
                                      parameter_unit += "<option value='"+data[i].parameterunit+"' selected>"+data[i].parameterunit+"</option>";
                                  }
                                  else{
                                      parameter_unit += "<option value='"+data[i].parameterunit+"'>"+data[i].parameterunit+"</option>";
                                  }
                              });
                              current_popup.parents('.popup-edit').find('.parameter_unit_update').append(parameter_unit);
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
    // $('.edit_state').click(function(){
    //     // test_center_align();
    //     // $('.popup_fade').show();
    //     // $('.test_div, .close_btn').show();
    //     $(this).next().next().show();
    //     $(this).parents('tr').siblings().find('.test_div').hide();

    //     document.body.style.overflow = 'hidden';
    // });
    // $('.edit_state').click(function(){
    //     // district_center_align();
    //     // $('.popup_fade').show();
    //     // $('.district_div, .close_btn').show();
    //     $(this).next().next().show();
    //     $(this).parents('tr').siblings().find('.popup-edit_district').hide();
    //     document.body.style.overflow = 'hidden';
    // });
    // $('.edit_state').click(function(){
    //     // test_battery_center_align();
    //     $('.popup_fade').show();
    //     $('.test_battery_div, .close_btn').show();
    //     document.body.style.overflow = 'hidden';
    // });
    // $('.edit_state').click(function(){
    //     // athletes_center_align();
    //     $('.popup_fade').show();
    //     $('.athletes_div, .close_btn').show();
    //     document.body.style.overflow = 'hidden';
    // });
    // $('.edit_state').click(function(){
    //     // createschedule_center_align();
    //     $('.popup_fade').show();
    //     $('.createschedule_div, .close_btn').show();
    //     document.body.style.overflow = 'hidden';
    // });
    // $('.edit_state').click(function(){
    //     // range_center_align();
    //     $('.popup_fade').show();
    //     $('.range_div, .close_btn').show();
    //     document.body.style.overflow = 'hidden';
    // });
    // $('.edit_state').click(function(){
    //     // parameter_center_align();
    //     // $('.popup_fade').show();
    //     // $('.paramter_div, .close_btn').show();
    //     $(this).next().next().show();
    //     $(this).parents('tr').siblings().children('.popup-edit').hide();
    //     document.body.style.overflow = 'hidden';
    // });
    $(document).delegate('.cancel_btn','click',function(){
        $('.popup_fade').hide();
        $('.state_div,.delete_div,.login_div,.register_div,.test_div,.district_div,.test_battery_div,.range_div,.paramter_div,.athletes_div,.createschedule_div').hide();
        document.body.style.overflow = 'auto';
         location.reload();

    });

	// $('.collapse').on('shown.bs.collapse', function (e) {
	//     $('.collapse').not(this).removeClass('in');
	// });

	// $('[data-toggle=collapse]').click(function (e) {
	//    $('[data-toggle=collapse]').siblings('li').removeClass('active');
	//    $(this).siblings('li').toggleClass('active');
	// });

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
        source: district_list,
        });
    });

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
                 alert('Sports already exist');
               }else{

                   alert('Sports inserted successfully!');
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
                 // $('.state_table tr:last').after(html);
                 document.states_form.reset();
                 location.reload();
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
                  //$('.parameter_type_table tr:first').after(html);
                  document.parameter_type_form.reset();
                  alert('Parameter Type Inserted Successfully!');
                  location.reload();
                }
                else{
                    alert('Parameter Type already exist!');
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
                 $('.edit_states_error').hide();
                 $('.state_table').find("input[value="+result_split[2]+"]").siblings('.t_states_name').html(result_split[3]);
                 $('.popup_fade').hide();
                 $('.state_div, .close_btn').hide();
                 document.body.style.overflow = 'auto';
                 alert(result_split[1]);
                 location.reload();
               }
               else{
                $('.edit_states_error').text(result_split[1]).show();
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
        $('input[type="text"]',this).each(function() {
          if($(this).val().trim() == "") {
            res = false;
          }
        });
        if(res){
          var form_data = $(this).serialize();
          $.ajax({
               type: "POST",
               url: "functions/district_function.php?adddata=true",
               data: form_data,
               cache: false,
               success: function(html) {
                   if(html){
                       alert(html+' district already exist!');
                       location.reload();
                   }else{
                       alert('District Inserted Successfully!');
                        location.reload();
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
                 location.reload();
               }
               else{
                $('.edit_district_error').text(result_split[1]).show();
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
                 alert('Already sports name exists');
               }else{
                //alert(html);
                var sports_split = html.split('-');
                //alert(sports_split[1]);
                $('#sports_table').find("input[value="+sports_split[1]+"]").siblings('.sports_name').html(sports_split[0]);
                alert('Sports name updated successfully');
                $('.popup_fade').hide();
                $('.state_div,.delete_div').hide();
                document.body.style.overflow = 'auto';
                location.reload();
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
                   location.reload();
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
                  $('.state_table').find("input[value="+result_split[2]+"]").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();
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
                  location.reload();
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
                  $('.athletes_table').find("input[value="+result_split[2]+"]").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();
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
                  $('.createschedule_table').find("input[value="+result_split[2]+"]").parents('tr').remove();
                  $('.popup_fade').hide();
                  $('.createschedule_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();
                 }
                 location.reload();
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
                        //alert(html);
                     $('.popup_fade').hide();
                     $('.state_div,.delete_div').hide();
                     document.body.style.overflow = 'auto';
                     location.reload();
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
                     alert('Test parameter deleted successfully');
                     $('.popup_fade').hide();
                     $('.state_div,.delete_div').hide();
                     document.body.style.overflow = 'auto';
                     location.reload();
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
                    alert('Test battery deleted successfully');
                     $('.popup_fade').hide();
                     $('.state_div,.delete_div').hide();
                     document.body.style.overflow = 'auto';
                     location.reload();
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
                         alert('Test battery deleted successfully');
                         $('.popup_fade').hide();
                         $('.state_div,.delete_div').hide();
                         document.body.style.overflow = 'auto';
                         location.reload();
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
                    alert(result_split[1]);
                    $('.range_table').find(".t_range_id:contains("+$.trim(result_split[2])+")").parents('tr').remove();
                    $('.popup_fade').hide();
                    $('.delete_div').hide();
                    document.body.style.overflow = 'auto';
                    location.reload();
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
                  alert('Parameter unit deleted Successfully! ');
                  $('.popup_fade').hide();
                  $('.state_div,.delete_div').hide();
                  document.body.style.overflow = 'auto';
                  location.reload();

                 }
             });
         }else{
             var form_data = {'delete_id':$(this).attr('data-id')};
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
                 alert('Category inserted successfully!');
                 //$('#category_table tr:last').after(html);
                 location.reload();
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
                 alert('This category is already used');
               }else{

                 alert('Category updated successfully!');
                 location.reload();
                 var category_split = html.split('-');
                $('#category_table').find("input[value="+category_split[1]+"]").next('.category_name').html(category_split[0]);
                //alert('Sports name updated successfully');
                $('.popup_fade').hide();
                $('.state_div,.delete_div').hide();
                document.body.style.overflow = 'auto';

               }

           }
       });
      }
    });

    // var current_id = 1;
    // $('.parameter_btn').click(function(){

    //     if($('.clone_content:last').find('.parameter_name').val() == ''){
    //         $('.clone_content:last .param_name_error').addClass('custom_error');
    //         $('.clone_content:last .param_name_error').next().next().remove();
    //     }
    //     else{
    //         $('.clone_content:last .param_name_error').removeClass('custom_error');
    //     }
    //     if($('.clone_content:last').find('.parameter_type').val() == ''){
    //         $('.clone_content:last .param_type_error').addClass('custom_error');
    //         $('.clone_content:last .param_type_error').next().remove();
    //     }
    //     else{
    //         $('.clone_content:last .param_type_error').removeClass('custom_error');
    //     }
    //     if($('.clone_content:last').find('.parameter_unit').val() == ''){
    //         $('.clone_content:last .param_unit_error').addClass('custom_error');
    //         $('.clone_content:last .param_unit_error').next().remove();
    //     }
    //     else{
    //         $('.clone_content:last .param_unit_error').removeClass('custom_error');
    //     }
    //     if($('.clone_content:last').find('.parameter_format').val() == ''){
    //         $('.clone_content:last .param_format_error').addClass('custom_error');
    //         $('.clone_content:last .param_format_error').next().remove();
    //         return false;
    //     }
    //     else{
    //         $('.clone_content:last .param_format_error').removeClass('custom_error');
    //         nextElement($('.clone_content:last'));
    //     }
    // })

    var current_id = 1;
    $(document).on('click','.parameter_btn',function(e){
        if(($('.clone_content:last').children().find('.parameter_name').val() == '') || ($('.clone_content:last').children().find('.parameter_type').val() == '') || ($('.clone_content:last').children().find('.parameter_unit').val() == '') || ($('.clone_content:last').children().find('.parameter_format').val() == '') || ($('.clone_content').children().find('.parameter_name').val() == '') || ($('.clone_content').children().find('.parameter_type').val() == '') || ($('.clone_content').children().find('.parameter_unit').val() == '') || ($('.clone_content').children().find('.parameter_format').val() == ''))
        {
          $('.clone_content:last').children().find('select, input[type="text"]').next().addClass('custom_error');
          $('.clone_content:last select').next().next().remove();
          $('.clone_content:last input').next().next().next().remove();
          e.preventDefault();
          if($('.clone_content:last').children().find('select, input[type="text"]').hasClass('custom_error')){
            $("span .custom_error").hide();
            $(".custom_error").removeClass("custom_error");
          }
        }
        else{
        $('.clone_content:last').children().find('select, input[type="text"]').next().removeClass('custom_error');
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
      e.preventDefault();  // don't submit it
      var submitOK = true;
      $('#test_form').find("select").each(function() {
            if ($(this).val() == "") {
                  $('.clone_content:last').children().find('select, input[type="text"]').next().addClass('custom_error');
                  submitOK = false;
                  return false;  // breaks out of the each
           }
      });
      if (submitOK) {
            $('.clone_content:last').children().find('select, input[type="text"]').next().removeClass('custom_error');
            $('#test_form').submit();
      }
    });

    $(".reset_form").on('click', function() {
       $(".parameter_count").each(function() {
          if($('.clone_content').length !=1){
            $('.clone_content:last').remove();
          }
        });
    });

    $('.add_createschedule_act,.edit_createschedule_act,.add_athletes_act,.edit_athletes_act').on('click', function(){
     $('.day, .month, .year').attr('data-validation', 'required');
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
        newElement.find('#unit').next('span').remove();
        newElement.find('#format').removeAttr('name').attr('name', 'format'+id);
        newElement.appendTo($(".parameter_holder1"));
    }

    var test_id = 1;
    $('.add_athelete').click(function(){
        nextElement1($('.assign_clone_content:last'));
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

                   }
               });
            }
        });
        newElement.find('.custom-combobox:nth-child(3)').remove();
        newElement.appendTo($(".assign_content_holder"));

    }
    var test_id = 1;
    $('.edit_assign_schedule_add_btn').click(function(){
        var element = $('.assign_clone_content_edit:last');
        var last_id = parseInt(element.find('.assign_athelete_count_edit').val());
        //alert(last_id);
        var newElement = element.clone();
        var id = last_id+1;
        test_id = id;
        //alert(newElement.find('.athlete_name option:selected').html());
        newElement.find('.assign_athelete_count_edit').val(id);
        newElement.find('.athlete_name').removeAttr('name').attr('name', 'athlete_name'+id);
        newElement.find('.athlete_name option:selected').removeAttr('selected');
        newElement.find('.athlete_bib').removeAttr('name').attr('name', 'athlete_bib'+id).val('');
        newElement.find('.dob').val('');
        newElement.find('.create_schedule_update_id').removeAttr('name').attr('name', 'create_schedule_update_id'+id);
        newElement.find('.mobile').val('');
        // newElement.find('#combobox1').combobox({
        //     select: function (event, ui) {
        //
        //         var ath_id = $(this).val();
        //         //alert(ath_id);
        //         $.ajax({
        //            type: "POST",
        //            url: "functions/athletes_functions.php?get_ath=true",
        //            data: {'ath_id':ath_id},
        //            cache: false,
        //            dataType:'json',
        //            success: function(html) {
        //               //alert(html.athlete_dob);
        //               var res = html.athlete_dob.split('-');
        //               var new_date = res[2]+'/'+res[1]+'/'+res[0];
        //                 newElement.find('.dob_update').val(new_date);
        //                 //alert(new_date);
        //                 //alert(newElement.html());
        //                 newElement.find('.mobile_update').val(html.athlete_mobile).attr('disabled', 'disabled');
        //                 newElement.find('.athlete_bib').val('');
        //
        //            }
        //        });
        //     }
        // });
        newElement.find('.custom-combobox:nth-child(3)').remove();
        newElement.appendTo($(".assign_clone_content_edit_holder"));

    });
    var dist_id = 1;
    $('.district_add').click(function(){
        nextElement2($('.district_clone_content:last'));
    })

    function nextElement2(element){
        var newElement = element.clone();
        newElement.find('.districts').val('');
        newElement.appendTo($(".district_clone"));

    }
    $('.district_remove').click(function(){
      if($('.district_clone_content').length !=1){
        $('.district_clone_content:last').remove();
      }
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
                    alert('No parameter unit found');
               }
           }
       });
        //$(this).attr('value', $(this).val())
    });
    $(document.body).delegate('.paremeter_unit_add','change',function() {
        var param_unit = $(this).val();
        var param_type = $(this).parents('.schedule_test').find('.parameter_type').val();;
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
        var param_type = $('.parameter_type_update').val().trim();

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
                    alert('Parameter Unit Not availabel!');
               }
           }
       });
    });

    // $('.test_submit_act').click(function() {
    //     var test_form_data = $('#test_form').serialize();
    //     alert(test_form_data);
    // });

    //Jquery and Ajax Functionality for Athletes Form added by kalai
    $('#athlete_form').submit(function(e){
     e.preventDefault();
      var res = true;
      $('input[type="text"],select',this).each(function() {
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
                   // $('.athletes_table tr:last').after(html);
                 location.reload();
                 }
                 else{
                  alert(result_split[1]);
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
                     alert(result_split[1]);
                     $('.athletes_table').find("input[value="+result_split[2]+"]").siblings('.t_athlete_name').html(result_split[3])
                     .siblings('.t_athlete_gender').html(result_split[4]).siblings('.t_athlete_dob').html(result_split[5]).siblings('.t_athlete_address').html(result_split[6]);
                     $('.popup_fade').hide();
                     $('.athletes_div, .close_btn').hide();
                     document.body.style.overflow = 'auto';
                    location.reload();
                   }
                   else{
                    alert(result_split[1]);
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
        if($(this).val().trim() == "") {
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
                   // $('.createschedule_table tr:last').after(html);
                    document.body.style.overflow = 'auto';
                   location.reload();
                 }
                 else{
                  alert(result_split[1]);
                 }
             }
         });
      }
    });
    $(document).on('change','.check_parametertype', function(event) {
       //alert($(this).attr('data-id'));
       if(this.checked){
        $('#param_unit_table tbody').empty();
       var params_id = $(this).attr('data-id');
       $.ajax({
            type: "POST",
            url: "functions/parameter_unitfunction.php?find_params_units=true",
            data:{'id':params_id},
            cache: false,
            dataType:'json',
            success: function(data) {
                //alert(JSON.stringify(data.test));
                $('#test_table tbody').empty();
                if(data.test){
                     var param_dynamic = '';
                //    $.each(data.param, function(i){
                //         param_dynamic += "<option value='"+data.param[i].parametertype_name+"'>"+data.param[i].parametertype_name+"</option>";
                //     });
                     $.each(data.test, function(i){
                         $('#param_unit_table tbody').append('\
               <tr class=" delete_color">\
           <input type="hidden" value="'+data.test[i].parameterunit_id+'" id="parameterunit_id">\
                 <td>'+data.test[i].parameterunit+'</td>\
                 <td class="popup-edit">\
                  <span class="edit_state edit_test" data-value="'+data.test[i].parameterunit_id+'" data-test-id="'+data.test[i].parameterunit_id+'"><i class="fa fa-pencil-square-o"></i></span>\
                  <span class="delete_state" data-value="'+data.test[i].parameterunit_id+'"><i class="fa fa-trash-o"></i></span>\
            <div class="delete_div delete_test_div">\
                         <div class="del_title">\
                           <span class="del_txt">DELETE</span>\
                         </div>\
                         <div class="del_content">\
                           <span class="del_content_txt">Are you sure want to delete this whole record?</span>\
                           <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="parameter_unit_name" data-id ="'+data.test[i].parameterunit_id+' ">\
                           <input type="button" class="btn btn-primary align_right no_btn" value="No">\
                           <input type="hidden" name="delete_id" value="" id="delete_id"/>\
                         </div>\
               </div>\
                 </td>\
           <input type="hidden" name="test_attribute_id" id="test_attribute_id" value="'+data.test[i].parameterunit_id+'" />\
               </tr>');
                     });
                }else{
                    alert('No Parameter availabel!');
                }
            }
       });
   }
   });
   // / Edit the Parameter Unit module - Start /
     $(document).delegate('.edit_parameter_unit','click',function(){
        var test_attr_id = $(this).attr("data-value");
        var test_id = $(this).attr("data-test-id");
        var current_popup = $(this);
        //alert(test_id);
        $.ajax({
             type: "POST",
             url: "functions/parameter_unitfunction.php?getunitdata=true",
             data:{'id':test_attr_id,},
             cache: false,
             dataType:'json',
             success: function(data) {
                //alert(JSON.stringify(data));
                //  $('.test_name_update').val(data.test_name);
                //alert(current_popup.parents('.popup-edit').html());
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
                        alert(result_split[1]);
                         $('.createschedule_table').find("input[value="+result_split[2]+"]").siblings('.t_createschedule_name').html(result_split[3])
                         .siblings('.t_testbattery_name').html(result_split[4]).siblings('.t_createschedule_date').html(result_split[5]).siblings('.t_createschedule_time')
                         .html(result_split[6]).siblings('.t_createschedule_venue').html(result_split[7]);
                         $('.popup_fade').hide();
                         $('.createschedule_div, .close_btn').hide();
                         document.body.style.overflow = 'auto';
                         location.reload();
                       }
                       else{
                        alert(result_split[1]);
                       }
                   }
               });
        }
        });

//test

    // $('#test_form').submit(function(e){
    //     e.preventDefault();
    //     var res = true;
    //     $('input[type="text"]',this).each(function() {
    //       if($(this).val().trim() == "") {
    //         res = false;
    //         // alert('test_form false');
    //       }
    //     });
    //     if(res){
    //         // alert('test_form true');
    //     }
    //
    //     });

    // $('#test_updation_form').submit(function(e){
    //     //alert('dsfdsfds');
    //     e.preventDefault();
    //     var res = true;
    //     $('input[type="text"]',this).each(function() {
    //       if($(this).val().trim() == "") {
    //         res = false;
    //         // alert('test_updation_form false');
    //       }
    //     });
    //     });
//test battery
 // $('#test_battery_form').submit(function(e){
 //        e.preventDefault();
 //        var res = true;
 //        $('input[type="text"],textarea,select',this).each(function() {
 //          if($(this).val().trim() == "") {
 //            res = false;
 //            // alert('test_updation_form false');
 //          }
 //        });
 //        if(res){
 //            // var form_data = $('[name=edit_createschedule_form]').serialize();
 //            // alert('test_updation_form true');
 //        }
 //
 //        });

    //  $('#test_battery_update_form').submit(function(e){
    //     e.preventDefault();
    //     var res = true;
    //     $('input[type="text"],textarea,select',this).each(function() {
    //       if($(this).val().trim() == "") {
    //         res = false;
    //         // alert('test_updation_form false');
    //       }
    //     });
    //     if(res){
    //         // var form_data = $('[name=edit_createschedule_form]').serialize();
    //         // alert('test_updation_form true');
    //     }
     //
    //   });

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
                   alert(result_split[1]);
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
                   location.reload();
                 }
                 else{
                  alert(result_split[1]);
                 }
             }
          });
        }
      });

    $('.edit_range_form_id ').submit(function(e){
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
            $.ajax({
                   type: "POST",
                   url: "functions/range_function.php?editdata=true",
                   data: form_data + '&counter=' + edit_clone_length,
                   cache: false,
                   success: function(html) {
                       var result_split = html.split('#');
                       if (result_split[0].indexOf("success") !== -1){
                        alert(result_split[1]);
                         $('.range_table').find(".t_range_id:contains("+result_split[2]+")").siblings('.t_range_testname').html(result_split[3]);
                         $('.popup_fade').hide();
                         $('.range_div, .close_btn').hide();
                         document.body.style.overflow = 'auto';
                        location.reload();
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
                            alert('Parameter updated successfully!');
                            location.reload();
                        }else if(html == 'exist'){
                            alert('Parameter type already Exist!');
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
                                alert('Parameterunit added successfully!');
                                location.reload();
                            }else if(html == 'error'){
                                alert('Parameterunit already exist!');
                            }
                        }
                     });
              }
            });
    $('.edit_parameter_unit_act').click(function(e){
          e.preventDefault();
          var res = true;
          $(this).parents('#edit_parameter_unit').find('input[type="text"],textarea,select',this).each(function() {
            if($(this).val().trim() == "") {
              res = false;
              //alert('edit_parameter_unitfalse');
            }
          });
          if(res){
              var form_data =  $(this).parents('#edit_parameter_unit').serialize();
              //alert(form_data);
              $.ajax({
                   type: "POST",
                   url: "functions/parameter_unitfunction.php?updateunitdata=true",
                   data:form_data,
                   cache: false,
                   success: function(data) {
                      if(data=='success'){
                          alert('Parameter unit updated successfully');
                          location.reload();
                      }else if(data == 'exist'){
                          alert('Parameter unit already exist!');
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
       //alert(form_data);
        $.ajax({
           type: "POST",
           url: "functions/assign_schedule_function.php?add_assign_schdule=true",
           data: form_data,
           cache: false,
           success: function(html) {
               if(html=='success'){
                   alert('Schedule successfully assigned');
                   location.reload();
               }else if(html=='error'){
                   alert('Schedule already exist!');
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
                // alert(html);
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
                                <td><input type='text' class='assign_border enter_result' name='enter_result'><br><span class='enter_result_error'></span></td>\
                                <td><span class='result_error' name='result_error'>Enter the result in " +obj[i].parameter_unit+ " with "+obj[i].parameter_format+" formats</span></td>\
                                <td></td>\
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
                                <td><input type='text' class='assign_border enter_result' name='enter_result'><br><span class='enter_result_error'></span></td>\
                                <td><span class='result_error' name='result_error'>Enter the result in " +obj[i].parameter_unit+ " with "+obj[i].parameter_format+" formats</span></td>\
                                <td><span class='assign_border enter_points'></span></td></tr>";
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
                    $.each(obj1, function(i){
                      $('.result_table').find("td:contains("+obj1[i].resultparameter_name+")").siblings('.result_id').val(obj1[i].result_id);
                      $('.result_table').find("td:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_result').val(obj1[i].result);
                      $('.result_table').find("td:contains("+obj1[i].resultparameter_name+")").parents('tr').find('.enter_points').text(obj1[i].points);
                    });

                     //Points total result
                      var val=0;
                      $(".enter_points").each(function() {
                        val += Number($(this).text());
                        $('.total_result').text(val);
                      });
              }
          });
      }
    });


 //report
 // $('#report_form').submit(function(e){
 //      e.preventDefault();
 //      var res = true;
 //       $('input[type="checkbox"]',this).each(function() {
 //        if($(this).val().trim() == "") {
 //          res = false;
 //          alert('report_form alse');
 //        }
 //       });
 //      if(res){
 //          var form_data = $('[name=report_form]').serialize();
 //          alert(form_data);
 //      }
 //
 //    });

    $('.paramter_menu').click(function(){
      $(".parameter-list").show();
    });
     $('.parameter-list').mouseleave(function(){
      $(".parameter-list").fadeOut(1000);
    });

    // Jquery functions for Range Form added by kalai
    var current_id = 1;
    $(document).on('click','.add_range_points',function(e){
        if(($('.clone_content:last').children().find('.r_strt').val() == '') || ($('.clone_content:last').children().find('.r_end').val() == '') || ($('.clone_content:last').children().find('.r_point').val() == '') || ($('.clone_content').children().find('.r_strt').val() == '') || ($('.clone_content').children().find('.r_end').val() == '') || ($('.clone_content').children().find('.r_point').val() == ''))
        {
          $('.clone_content:last').children().find('input[type="text"]').next().addClass('custom_error');
          e.preventDefault();
          // alert('please fill all the fields');
        }
        else{
        $('.clone_content:last').children().find('input[type="text"]').next().removeClass('custom_error');
        var id = current_id+1;
        nextrangeElement($('.clone_content:last'));
        $('.clone_content:last').attr('id','range_counter'+id);
       }
    });

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
        var assign_schedule_id = $(this).attr('data-schedule');
        var assign_category_id = $(this).attr('data-category');

        //alert(assign_schedule_id);
        $.ajax({
           type: "POST",
           url: "functions/assign_schedule_function.php?edit_get_data=true",
           data: {'shdl_id':assign_schedule_id,'cate_id':assign_category_id},
           cache: false,
           dataType:'json',
           success: function(data) {
               //alert(JSON.stringify(data));
               var assign_id = data[0].assigncategory_id;
               $('.schedule_update').val(data[0].createschedule_name);
               $('.schedule_update_id').val(data[0].createschedule_id);
               $.ajax({
                    type: "POST",
                    url: "functions/assign_schedule_function.php?cate_list=true",
                    data:{'id':data[0].createschedule_id,'assign_id':data[0].assigncategory_id},
                    cache: false,
                    success: function(data) {
                        $('.category_update').empty().append("<option value=''>Select Category Name</option>"+data);
                   }
                });
                //alert(data[0].assigncategory_id);
              //alert($('.clone_schedule_update:first').html());
               $('.clone_schedule_update .athlete_name1 option[value="'+data[0].assignathlete_id+'"]').attr('selected','selected');
               $('.clone_schedule_update .dob_update').val(data[0].athlete_dob);
               //$('.clone_schedule_update:first .assign_athelete_count_edit').val(1);
               $('.clone_schedule_update .custom-combobox-input').val(data[0].athlete_name);
               $('.clone_schedule_update .mobile_update').val(data[0].athlete_mobile);
               $('.clone_schedule_update .athlete_bib').val(data[0].assignbib_number);
               //$('.clone_schedule_update:first .assing_schedule_update_id').val(data[0].assignschedule_id);
               $('.clone_schedule_update .create_schedule_update_id').val(data[0].createschedule_id);
               //$('.category_update option[value="'+data[0].assigncategory_id+'"]').attr('selected','selected');

               var cnt = 0;
               $.each(data, function(i){
                   if(cnt!=i){
                       //alert(data[i].athlete_name);
                       var last_id = parseInt($('.clone_schedule_update:first .assign_athelete_count_edit').val());
                       var newElement = $('.clone_schedule_update:first').clone();
                       var id = i+1;
                       test_id = id;
                       newElement.find('.assign_athelete_count_edit').val(id);
                       newElement.find('.athlete_name option:selected').removeAttr('selected');
                       newElement.find('.athlete_name option[value="'+data[i].assignathlete_id+'"]').attr('selected','selected');
                       newElement.find('.athlete_name').removeAttr('name').attr('name', 'athlete_name'+id);
                      // newElement.find('.assing_schedule_update_id').removeAttr('name').attr('name', 'assing_schedule_update_id'+id).val(data[i].assignschedule_id);
                       newElement.find('.create_schedule_update_id').removeAttr('name').attr('name', 'create_schedule_update_id'+id).val(data[i].createschedule_id);
                       newElement.find('.athlete_bib').removeAttr('name').attr('name', 'athlete_bib'+id).val(data[i].assignbib_number);
                       newElement.find('.dob_update').val(data[i].athlete_dob);
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
                  $.each(obj, function(i){
                    athletes_list.push(obj[i].athlete_name);
                    athlete_json.push({'athlete_id':obj[i].athlete_id,'athlete_name':obj[i].athlete_name,'athlete_dob':obj[i].athlete_dob,'athlete_mobile':obj[i].athlete_mobile,'athlete_bibno':obj[i].assignbib_number})
                    // options += '<option value="'+obj[i].athlete_id+'">'+obj[i].athlete_name+'</option>';
                    $('.result_athletename,.result_athletedate,.result_athletemobile,.result_athletebib').val('');
                    $('.result_table tbody tr:not(:last)').remove();
                    $('.note_range').hide();
                  });
                  // $('.result_athletename').html(options);
                  // alert(JSON.stringify(athlete_json));
                }
                else{
                  alert(result_split[1]);
                }
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
        if(((parameter_type == "time") && (value!=''))||((parameter_type == "Time") && (value!=''))){
          if((parameter_format=="hh:mm:ss")&&(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):[0-5][0-9]$/).test(value))){
              $(this).siblings('.enter_result_error').addClass('error').text('Please Check time format').show();
              status=1;
              // break;
            } else if((parameter_format=="hh:mm")&&(!(/^(?:[0-2][0-4]|[0-1][0-9]):[0-5][0-9]$/).test(value))){
              $(this).siblings('.enter_result_error').addClass('error').text('Please Check time format').show();
              status=1;
              // break;
            }
            else if((parameter_format=="mm:ss")&&(!(/^(?:[0-5][0-9]):[0-5][0-9]$/).test(value))){
              $(this).siblings('.enter_result_error').addClass('error').text('Please Check time format').show();
              status=1;
              // break;
            }
            else if((parameter_format=="hh:mm:ss:mss")&&(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value))){
              $(this).siblings('.enter_result_error').addClass('error').text('Please Check time format').show();
              status=1;
              // break;
            }
            else if((parameter_format=="mm:ss:mss")&&(!(/^(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value))){
              $(this).siblings('.enter_result_error').addClass('error').text('Please Check time format').show();
              status=1;
              // break;
            }
            else if((parameter_format=="ss:mss")&&(!(/^(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value))){
              $(this).siblings('.enter_result_error').addClass('error').text('Please Check time format').show();
              status=1;
              // break;
            }
            else{
              if(ranges.length!=0){
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
                $(this).parents('tr').find('.enter_points').text('0');
                $(this).siblings('.enter_result_error').removeClass('error').hide();
              }

            }

        }
        else{
              //Checking entered Result
              if(value!=''){
                if(value.indexOf(".")==-1){
                decimals = 0;
              }
              else{
                decimals = value.toString().split(".")[1].length;
              }
              if(ranges.length!=0){
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
                       $(this).siblings('.enter_result_error').addClass('error').text('Please Check decimal points').show();
                       totalvlaue = $('.total_result').text();
                       pointvalue = $(this).parents('tr').find('.enter_points').text();
                       result = totalvlaue - pointvalue;
                       $('.total_result').text(result);
                       $(this).parents('tr').find('.enter_points').text('');
                    }
                    break;
                  }
                  else{
                    status = 0;
                  }
                }
            }
            else{
              $(this).parents('tr').find('.enter_points').text('0');
              if(decimals <= parameter_format){
                 $(this).siblings('.enter_result_error').removeClass('error').hide();
              }
              else{
                $(this).siblings('.enter_result_error').addClass('error').text('Please Check decimal points').show();
              }
            }
          }
          // if (parameter_format == 0 || parameter_format == 1){
          //   if (value.indexOf(".") !== -1 && decimals == 0){
          //     $(this).siblings('.enter_result_error').addClass('error').text('Please Check decimal points').show();
          //   }
          //   else{
          //     $(this).siblings('.enter_result_error').removeClass('error').hide();
          //   }
          // }
        }
        if(status == 0 && value!=''){
          $(this).siblings('.enter_result_error').addClass('error').text('Entered value is not in range').show();
          totalvlaue = $('.total_result').text();
          pointvalue = $(this).parents('tr').find('.enter_points').text();
          result = totalvlaue - pointvalue;
          $('.total_result').text(result);
          $(this).parents('tr').find('.enter_points').text('');
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
              enter_result = $(this).find('.enter_result').val();
              enter_points = $(this).find('.enter_points').text();
              result_id = $(this).find('.result_id').val();
              result_data.push({'result_id':result_id,'createschedule_id':createschedule_id,'athlete_id':athlete_id,'test_name':test_name,
                                'parameter_name':parameter_name,'enter_result':enter_result,'enter_points':enter_points});
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
                  alert(result_split[1]);
                  document.result_form.reset();
                  $('.result_table tbody tr:not(:last)').remove();
                  $('.total_result').text('');
                 }
                 else{
                  alert(result_split[1]);
                 }
                }
            });
          }
          else{
            alert("Please enter the result");
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

    // Load parameter in range form based on selected test
    $('[name=range_test],[name=edit_range_test]').on('change',function () {
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
              $('.range_parameter').html(options);
              $('.range_note').hide();
           }
       });
    });

    $('.parameter_remove').click(function(){
      if($('.clone_content').length !=1){
        $('.clone_content:last').remove();
      }
    });
    $('.range_remove').click(function(){
      if($('.clone_content').length !=1){
        $('.clone_content:last').remove();
        current_id -=1;
      }
    });

    $('.edit_range_remove').click(function(){
      clone_content = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content').length;
      if(clone_content!=1){
        $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last').remove();
      }
    });

    $('.assign_remove').click(function(){
      if($('.assign_clone_content').length !=1){
        $('.assign_clone_content:last').remove();
      }
    });
    $('.assign_remove_edit').click(function(){
      if($('.assign_clone_content_edit').length !=1){
        $('.assign_clone_content_edit:last').remove();
      }
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
              $('.range_parameter_type').val(obj[i].test_parameter_type);
              $('.range_parameter_unit').val(obj[i].test_parameter_unit);
              $('.range_parameter_format').val(obj[i].test_parameter_format);
              if($('.range_parameter_type').val().toLowerCase()=="time")
                $('.range_notes').text("Enter the range in "+obj[i].test_parameter_unit);
              else
                $('.range_notes').text("Enter the range in "+obj[i].test_parameter_unit+ " with "+obj[i].test_parameter_format+" formats");
              $('.range_note').show();
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

     $(document).on('blur','.r_strt,.r_end,.edit_r_strt,.edit_r_end',function(e){
        //Checking entered range
        value=$(this).val();
        if(value == ''){
          $(this).next().next('.hided').addClass('custom_error').hide();
          $(this).next('.hided').addClass('custom_error').show();
        }
        else
          $(this).next('.hided').removeClass('custom_error').hide();
        if(($('.range_parameter_type').val().toLowerCase()=="time") && (value!='')){
          if($('.range_parameter_format').val().toLowerCase()=="hh:mm:ss"){
            // regex=/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/;
            if(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):[0-5][0-9]$/).test(value)){
              // alert("check time format");
              $(this).next().next('.hided').addClass('custom_error').text('Please Check time format').show();
            }
            else{
              $(this).next().next('.hided').removeClass('custom_error').text('').hide();
            }
          }
          else if($('.range_parameter_format').val().toLowerCase()=="hh:mm"){
            if(!(/^(?:[0-2][0-4]|[0-1][0-9]):[0-5][0-9]$/).test(value)){
              $(this).next().next('.hided').addClass('custom_error').text('Please Check time format').show();
            }
            else{
              $(this).next().next('.hided').removeClass('custom_error').text('').hide();
            }
          }
          else if($('.range_parameter_format').val().toLowerCase()=="mm:ss"){
            if(!(/^(?:[0-5][0-9]):[0-5][0-9]$/).test(value)){
              $(this).next().next('.hided').addClass('custom_error').text('Please Check time format').show();
            }
            else{
              $(this).next().next('.hided').removeClass('custom_error').text('').hide();
            }
          }
          else if($('.range_parameter_format').val().toLowerCase()=="hh:mm:ss:mss"){
            if(!(/^(?:[0-2][0-4]|[0-1][0-9]):(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value)){
              $(this).next().next('.hided').addClass('custom_error').text('Please Check time format').show();
            }
            else{
              $(this).next().next('.hided').removeClass('custom_error').text('').hide();
            }
          }
          else if($('.range_parameter_format').val().toLowerCase()=="mm:ss:mss"){
            if(!(/^(?:[0-5][0-9]):(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value)){
              $(this).next().next('.hided').addClass('custom_error').text('Please Check time format').show();
            }
            else{
              $(this).next().next('.hided').removeClass('custom_error').text('').hide();
            }
          }
          else if($('.range_parameter_format').val().toLowerCase()=="ss:mss"){
            if(!(/^(?:[0-5][0-9]):([0-9][0-9]|[0-9][0-9][0-9]|[0-1][0][0][0])$/).test(value)){
            $(this).next().next('.hided').addClass('custom_error').text('Please Check time format').show();
            }
            else{
              $(this).next().next('.hided').removeClass('custom_error').text('').hide();
            }
          }
        }
        else{
          if(value!=''){
              if(value.indexOf(".")==-1){
              decimals = 0;
              }
              else{
                decimals = value.toString().split(".")[1].length;
              }
              paramter_unit = $('.range_parameter_unit').val();
              parameter_format = $('.range_parameter_format').val();
              if(decimals > parameter_format || value.indexOf(":") !== -1){
                 $(this).next().next('.hided').addClass('custom_error').text('Please Check range format').show();
              }
              else{
                 $(this).next().next('.hided').removeClass('custom_error').text('').hide();
              }
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

    $(document).on('change','.check_parametertype',function () {
      $('.check_parametertype').not(this).prop('checked', false);
      if($(this).is(':checked')){
        // check_data = $(this).next().attr('data-id');
        // $('.state_table').find('.parametertype_id').find("input[value="+check_data+"]").parents('tr').show();
        // $('.state_table').find('.parametertype_id').not("input[value="+check_data+"]").parents('tr').hide();
      }
      else{
        $('.state_table tr').show();
      }
    });

    // Autocomplete results for atheletes list while search
    var at_list = [];
    $('.athlete_list li').each(function(){
      at_list.push($(this).text());
    });

    $('.at_search').focus(function (e) {
      $(this).autocomplete({
        source: at_list,
      });
    });

    //Autocomplete results for create schedule list while search
    var cs_list = [];
    $('.createschedule_list li').each(function(){
      cs_list.push($(this).text());
    });

    $('.cs_search').focus(function (e) {
      $(this).autocomplete({
        source: cs_list,
      });
    });

    // $('.delete_search,.at_namelist,.cs_namelist').hide();
    $('.search_button').click(function(){
      search_value = $('.search_text').val();
      if(search_value == ''){
        $('.test-name').show();
      }else{
        $('.test-name').hide();
        $('.test-list').find("input[value='"+search_value+"']").parents('.test-name').show();
        $('#ui-id-1').addClass('width_search');
      }
    });

    $('.save_athlete').click(function(e){
      athlete_id = $(this).parents('.test-name').find('.check_athleteid').val();
      athlete_name = $(this).parents('.test-name').find('.check_athletename').val();
      athlete_element = $(this).parents('.test-name').find('.check_athletename');
      form_data = {'check_athleteid':athlete_id,'check_athletename':athlete_name};
       $.ajax({
           type: "POST",
           url: "functions/athletes_functions.php?athletename_update=true",
           data: form_data,
           cache: false,
           success: function(data) {
            var result_split = data.split('#');
            if (result_split[0].indexOf("success") !== -1){
              alert(result_split[1]);
              athlete_element.val(result_split[2]);
              $('.search_text').val('');
            }
            else{
              alert(result_split[1]);
            }
          }
         });
    });

    $('.save_createschedule').click(function(){
      createschedule_id = $(this).parents('.test-name').find('.check_scheduleid').val();
      createschedule_name = $(this).parents('.test-name').find('.check_createschedulename').val();
      schedule_element = $(this).parents('.test-name').find('.check_createschedulename');
      form_data = {'check_scheduleid':createschedule_id,'check_createschedulename':createschedule_name};
      $.ajax({
           type: "POST",
           url: "functions/create_schedule_function.php?createschedulename_update=true",
           data: form_data,
           cache: false,
           success: function(html) {
            var result_split = html.split('#');
            if (result_split[0].indexOf("success") !== -1){
              alert(result_split[1]);
              // $(this).find('.check_athletename').val(result_split[2]);
              schedule_element.val(result_split[2]);
              $('.search_text').val('');
            }
            else{
              alert(result_split[1]);
            }
          }
         });
    });

    $('.save_state').click(function(){
      state_id = $(this).parents('.test-name').find('.check_stateid').val();
      state_name = $(this).parents('.test-name').find('.check_statename').val();
      state_element = $(this).parents('.test-name').find('.check_statename');
      form_data = {'edit_states_id':state_id,'edit_states_name':state_name};
      $.ajax({
           type: "POST",
           url: "functions/edit_and_delete_function.php?editdata=true",
           data: form_data,
           cache: false,
           success: function(html) {
            var result_split = html.split('#');
            if (result_split[0].indexOf("success") !== -1){
              alert(result_split[1]);
              // $(this).find('.check_athletename').val(result_split[2]);
              state_element.val(result_split[3]);
              $('.search_text').val('');
            }
            else{
              alert(result_split[1]);
            }
          }
         });
    });


    $('.edit_range_points').click(function(){
        element = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last');
        if((element.children().find('.edit_r_strt').val() == '') || (element.children().find('.edit_r_end').val() == '') || (element.children().find('.edit_r_point').val() == '') || (element.children().find('.edit_r_strt').val() == '') || (element.children().find('.edit_r_end').val() == '') || (element.children().find('.edit_r_point').val() == ''))
        {
          element.children().find('input[type="text"]').next().addClass('custom_error');
          e.preventDefault();
        }
        else{
        element.children().find('input[type="text"]').next().removeClass('custom_error');
        length = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content').length;
        var id = length+1;
        newElement = $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last').clone();
        newElement.find('.edit_range_label').remove();
        newElement.find('.edit_rattr_id').removeAttr('name').attr('name', 'edit_rangeattr_id'+id).val('');
        newElement.find('.edit_r_id').removeAttr('name').attr('name', 'edit_range_id'+id).val('');
        newElement.find('.edit_r_strt').removeAttr('name').attr('name', 'edit_range_start'+id).val($('#edit_end'+(id-1)).val());
        newElement.find('.edit_r_end').removeAttr('name').attr('name', 'edit_range_end'+id).val('');
        newElement.find('.edit_r_point').removeAttr('name').attr('name', 'edit_range_points'+id).val('');
        newElement.find('.edit_r_strt').removeAttr('id').attr('id','edit_strt'+id);
        newElement.find('.edit_r_end').removeAttr('id').attr('id','edit_end'+id);
        newElement.find('.edit_r_point').removeAttr('id').attr('id','edit_point'+id);
        newElement.appendTo($(".edit_range_holder"));
        $(this).parents('.add-ranges-button').siblings('.edit_range_holder').find('.edit_clone_content:last').attr('id','edit_range_counter'+id);
       }
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

    var st_list = [];
    $('.check_statename').each(function(){
      st_list.push($(this).val());
    })
    $('.dt_search').focus(function (e) {
      $(this).autocomplete({
        source: st_list,
      });
    });

    //********* end *********
});

$(document).bind("click", function(e) {
     var popup = $(".popup_hidden");
     if (!$('.fa-pencil-square-o,.ui-menu-item').is(e.target) && !popup.is(e.target) && popup.has(e.target).length == 0) {
         popup.hide();
        $('.edit_state').parents('tr').siblings().children('.popup-edit').show();
     }
    var del_popup = $(".delete_div");
     if (!$('.fa-trash-o').is(e.target) && !del_popup.is(e.target) && del_popup.has(e.target).length == 0) {
         del_popup.hide();
    }
 });
