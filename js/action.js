$(document).ready(function () {
 $('.collapse').on('shown.bs.collapse', function (e) {
    $('.collapse').not(this).removeClass('in');
 });

 $('[data-toggle=collapse]').click(function (e) {
   $('[data-toggle=collapse]').parent('li').removeClass('active');
   $(this).parent('li').toggleClass('active');
 });

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
