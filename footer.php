<div class="footer footer_txt col-md-12">
    <span class="fl cpy_right">Copyright &copy; 2016 Wellocity All Rights Reserved</span>
    <span class="fr"><a style="color:#fff;text-decoration: none;" href=" http://www.atomicka.com/">Powered by INFOM ATOMICKA (TECH) PVT LTD.</a></span>
</div>
<script type="text/javascript" src="js/paging.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  var d = new Date();   
  $('#sports_table,.state_table,#category_table,.test_table,#test_battery_table').paging({
    limit: 5,
    rowDisplayStyle: 'block',
    activePage: 0,
    rows: []
  });
  $(".athlete_date_pick,.popup_athlete_datepick").dateDropdowns({
   maxDate: new Date(),
   minDate: -1,
   maxYear:d.getFullYear()-1,
  });
  $(".date_pick,.popup_date_pick").dateDropdowns({
   maxAge:45,
   minDate: -1,
   maxYear:2030,
   // required:true
  });
  $("#athletes_mobile1,#ahtlete_mobile").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      // alert('errr'+$('#mobile').val());
               return false;
    }
  });
});
</script>
</body>
</html>
