<div class="footer col-md-12">
    <span class="footer_txt col-md-12">Copyright &copy; 2016 Wellocity All Rights Reserved  <span class="fr">Powered by INFOM ATOMICKA (TECH) Pvt Ltd.</span></span>
</div>
<script type="text/javascript" src="js/paging.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#sports_table,.state_table,#category_table,.district_table,.createschedule_table,.athletes_table,.test_table,#test_battery_table,.range_table').paging({
    limit: 5,
    rowDisplayStyle: 'block',
    activePage: 0,
    rows: []
  });

  $(".date_pick,.popup_date_pick,.athlete_date_pick,.popup_athlete_datepick").dateDropdowns({
    minAge: 18
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
