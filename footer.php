<div class="footer footer_txt col-md-12">
    <span class="fl cpy_right">Copyright &copy; 2016 Wellocity All Rights Reserved</span>
    <span class="fr"><a style="color:#fff;text-decoration: none;" href=" http://www.atomicka.com/">Powered by INFOM ATOMICKA (TECH) PVT LTD.</a></span>
</div>
<script type="text/javascript" src="js/paging.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#sports_table,.state_table,#category_table,.test_table,#test_battery_table').paging({
    limit: 5,
    rowDisplayStyle: 'block',
    activePage: 0,
    rows: []
  });
  $(".athlete_date_pick,.popup_athlete_datepick").dateDropdowns({
   maxDate: new Date(),
   minDate: -1,
  });
  // $(".date_pick,.popup_date_pick").dateDropdowns({
   // maxAge:45,
   // minDate: -1,
  // });
  $("#athletes_mobile1,#ahtlete_mobile").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      // alert('errr'+$('#mobile').val());
               return false;
    }
  });
});
</script>
<script type="text/javascript">
$( document ).ready(function() {
  var year = new Date().getFullYear();
  var yearplus = year+20;
  var yearminus = year-30;
  // load years
    for (var i=year; i<=yearplus; i++) $("#year,#year1").append('<option value=' + i + '>' + i + '</option>');//schedule
    for (var i=year; i>=yearminus; i--) $("#year2,#year3").append('<option value=' + i + '>' + i + '</option>');//athelete
  // load months
  $("#month,#month1,#month2,#month3").append("<option value='01'>January</option>\
<option value='02'>February</option>\
<option value='03'>March</option>\
<option value='04'>April</option>\
<option value='05'>May</option>\
<option value='06'>June</option>\
<option value='07'>July</option>\
<option value='08'>August</option>\
<option value='09'>September</option>\
<option value='10'>October</option>\
<option value='11'>November</option>\
<option value='12'>December</option>");
  // load days
  for (var i=1; i<=31; i++) {
    if(i<=9) 
        $("#day,#day1,#day2,#day3").append('<option value=0' + i + '>' + i + '</option>')
    else 
        $("#day,#day1,#day2,#day3").append('<option value=' + i + '>' + i + '</option>');
  }
  
  $('#day,#month,#year').on('change',function(){
	  var day_from = $('#day').val();                     
      var month_from = $('#month').val();                         
      var year_from = $('#year').val();
      var trans_date = month_from+ "/" + day_from  + "/" + year_from;  
      var d = new Date();   
      var today = (d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear();

       if((new Date(today) <= new Date(trans_date))){    
        $('.create_date').next('span').removeClass('help-block form-error');  
        $('.create_date').next('span').removeClass('help-block form-error').addClass('hided');
       }
      else{ 
        $('.create_date').next('span').addClass('help-block form-error');
        $('#day,#month,#year').css({'border-color': '#b94a48'});
        // $('.create_date').next().next('span').removeClass('help-block form-error').addClass('hided');
        }
	});

	$('#day1,#month1,#year1').on('change',function(){
		var day_from = $('#day1').val();                     
      var month_from = $('#month1').val();                         
      var year_from = $('#year1').val();
      var trans_date = month_from+ "/" + day_from  + "/" + year_from;  
      var d = new Date();   
      var today = (d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear();     
       if((new Date(today) <= new Date(trans_date))){  
        $('.create_date1').next('span').removeClass('help-block form-error');  
        $('.create_date1').next('span').removeClass('help-block form-error').addClass('hided');
       }
      else{
        $('.create_date1').next('span').addClass('help-block form-error');
        $('#day1,#month1,#year1').css({'border-color': '#b94a48'});    
        // $('.create_date1').next().next('span').removeClass('help-block form-error').addClass('hided');
        }
	});

    $('#day2,#month2,#year2').on('change',function(){
        var day_from = $('#day2').val();                     
        var month_from = $('#month2').val();                         
        var year_from = $('#year2').val();
        var trans_date = month_from+ "/" + day_from  + "/" + year_from;  
        var d = new Date();   
        var today = (d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear();  
  
        if((new Date(today) > new Date(trans_date))){          
            $('.athlete_date_pic').next('span').removeClass('help-block form-error');  
            $('.athlete_date_pic').next('span').removeClass('help-block form-error').addClass('hided');
        }
        else{        
            $('.athlete_date_pic').next('span').addClass('help-block form-error');
            $('#day2,#month2,#year2').css({'border-color': '#b94a48'});  
            // $('.athlete_date_pic').next().next('span').removeClass('help-block form-error').addClass('hided');            
        }
  });

  $('#day3,#month3,#year3').on('change',function(){
        var day_from = $('#day3').val();                     
        var month_from = $('#month3').val();                         
        var year_from = $('#year3').val();
        var trans_date = month_from+ "/" + day_from  + "/" + year_from;  
        var d = new Date();   
        var today = (d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear();  

        if((new Date(today) > new Date(trans_date)) || ('#day3,#month3,#year3').val() != '' ){
            alert('test');
            $('.athlete_date_pic3').next('span').removeClass('help-block form-error');  
            $('.athlete_date_pic3').next('span').removeClass('help-block form-error').addClass('hided');           
        }
        else{             
            $('.athlete_date_pic3').next('span').addClass('help-block form-error');
            $('#day3,#month3,#year3').css({'border-color': '#b94a48'});              
            // $('.athlete_date_pic3').next().next('span').removeClass('help-block form-error').addClass('hided');
        }
  });
});
$(function() {
  $('#year').change(function() {
    checkMonth();
  });
  $('#year1').change(function() {
    checkMonth1();
  });
  $('#year2').change(function() {
    checkMonth2();
  });
  $('#year3').change(function() {
    checkMonth3();
  });

});

function checkMonth() {
  var now = new Date();
  if ($('#year').val()==now.getFullYear() && $('#month').val()==(now.getMonth()+1)) {
    $('#day option').each(function() {
      if ($(this).val()>now.getDate()) $(this).remove();
    });
  } else {
    var days = 31;
    var month = $('#month').val();
    if (month==2) {
      if (($('#year').val() % 4) == 0) days = 29; // leap year
      else days = 28;
    } else if (month==2 || month==4 || month==6 || month==9 || month==11) {
      days = 30;
    }
    for (var i=1; i<32; i++)
      if (i>days)
        $("#day option[value='" + i + "']").remove();
      else if ($("#day option[value='" + i + "']").val()==undefined)
        $("#day").append('<option value=' + i + '>' + i + '</option>');
  }
}
function checkMonth1() {
  var now = new Date();
  if ($('#year1').val()==now.getFullYear() && $('#month1').val()==(now.getMonth()+1)) {
    $('#day1 option').each(function() {
      if ($(this).val()>now.getDate()) $(this).remove();
    });
  } else {
    var days = 31;
    var month = $('#month1').val();
    if (month==2) {
      if (($('#year1').val() % 4) == 0) days = 29; // leap year
      else days = 28;
    } else if (month==2 || month==4 || month==6 || month==9 || month==11) {
      days = 30;
    }
    for (var i=1; i<32; i++)
      if (i>days)
        $("#day1 option[value='" + i + "']").remove();
      else if ($("#day1 option[value='" + i + "']").val()==undefined)
        $("#day1").append('<option value=' + i + '>' + i + '</option>');
  }
}

function checkMonth2() {
  var now = new Date();
  if ($('#year2').val()==now.getFullYear() && $('#month2').val()==(now.getMonth()+1)) {
    $('#day2 option').each(function() {
      if ($(this).val()>=now.getDate()) $(this).remove();
    });
  } else {
    var days = 31;
    var month = $('#month2').val();
    if (month==2) {
      if (($('#year2').val() % 4) == 0) days = 29; // leap year
      else days = 28;
    } else if (month==2 || month==4 || month==6 || month==9 || month==11) {
      days = 30;
    }
    for (var i=1; i<32; i++)
      if (i>days)
        $("#day2 option[value='" + i + "']").remove();
      else if ($("#day2 option[value='" + i + "']").val()==undefined)
        $("#day2").append('<option value=' + i + '>' + i + '</option>');
  }
}
function checkMonth3() {
  var now = new Date();
  if ($('#year3').val()==now.getFullYear() && $('#month3').val()==(now.getMonth()+1)) {
    $('#day3 option').each(function() {
      if ($(this).val()>=now.getDate()) $(this).remove();
    });
  } else {
    var days = 31;
    var month = $('#month3').val();
    if (month==2) {
      if (($('#year3').val() % 4) == 0) days = 29; // leap year
      else days = 28;
    } else if (month==2 || month==4 || month==6 || month==9 || month==11) {
      days = 30;
    }
    for (var i=1; i<32; i++)
      if (i>days)
        $("#day3 option[value='" + i + "']").remove();
      else if ($("#day3 option[value='" + i + "']").val()==undefined)
        $("#day3").append('<option value=' + i + '>' + i + '</option>');
  }
}
</script>
</body>
</html>
