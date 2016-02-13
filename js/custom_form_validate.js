$(document).ready(function() {
	$.validate({
	form : '#login_form_id,#sports_form,#category_form,#state_form,#districts_form,#test_form,#test_battery_form,#range_form_id,#parameter_type,#parameter_unit,#athlete_form,#createschedule_form,#assign_schedule_form,#result_form,#report_form,#edit_create_schedule_form,#edit_athletes_form,#sports_update_form,#category_update_form,#edit_state_form,#edit_district_form,#edit_test_form,#test_battery_update_form,#edit_range_form_id,#edit_parameter_type,#edit_parameter_unit,#edit_assign_schedule_form',
	modules : 'date, security,file',
    onError : function($form) {
      // alert('Please fill all the fields');
	  return false;
    },
    onElementValidate : function(valid, $el, $form, errorMess) {
      // console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
    }
	});

});