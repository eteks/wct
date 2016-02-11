<div class="footer col-md-12">
    <span class="footer_txt col-md-12">@2016 Atomicka.All Right Reserved.</span>
</div>
<script type="text/javascript" src="js/paging.js"></script>
<script type="text/javascript" src="form-validator/jquery.form-validator.min.js"></script>
<script src="js/custom_form_validate.js"></script>   
<script type="text/javascript">
    $(document).ready(function() {
      $('#sports_table,.state_table,#category_table,.district_table,.test_table').paging({
        limit: 5,
        rowDisplayStyle: 'block',
        activePage: 0,
        rows: []
      });
    });
</script>

</body>
</html>
