$(document).ready(function() {
	$.validate({
	form : '#login_form_id,#sports_form,#category_form,#test_form,#test_battery_form,#range_form,#parameter_type,#parameter_unit,#state_form,#districts_form,#athlete_form,#createschedule_form,#assign_schedule_form,#result_form,#edit_create_schedule_form,#edit_athletes_form,#sports_update_form,#category_update_form,#edit_state_form,#edit_district_form',
	modules : 'date, security,file',
    onError : function($form) {
      // alert('Please fill all the fields');
	  return false;
    },
    onElementValidate : function(valid, $el, $form, errorMess) {
      console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
    }
	});

});