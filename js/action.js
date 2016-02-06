$(document).ready(function () {
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
});