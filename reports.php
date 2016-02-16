<?php
require_once "session.php";
require_once "header.php";
require_once "functions/create_schedule_function.php";
$createschedule = new createscheduleFunction();
?>

<div class="container">
	<div class="container align_center align_height">
		<span class="sports">REPORTS</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form id="report_form" name="report_form" action="reports.php" method="post">
					<div class="align_margin">
						<label>Select Schedule</label><br>
<<<<<<< HEAD
						<div class="area_scroll">
							<?php
							   $data = $createschedule->createscheduleselectfunction();
							   foreach( $data as $eachrecord ) {
								?>
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" value="<?php echo $eachrecord ['createschedule_id']; ?>" name="schedul_ids[]"><?php echo $eachrecord ['createschedule_name']; ?></label>
=======
						<div class="area_scroll" data-validation-error-msg="Please Choose atleast one Schedule" data-validation="required">
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" value="">Schedule1</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" value="">Schedule2</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" value="">Schedule3</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" value="">Schedule4</label>
>>>>>>> be31438e6ced55e7d48d2c03022527c7cd77c520
					    	</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="reset" class="btn btn-primary align_right test-submit clear" value="Clear">
					</div>
				</form>
			</div>
			<div class="container table-position" id="dvData">
			  <table class="table">

			      <tr class="row_color" style="border: 1px solid;">
			        <td class="align_center report_head">Athletes Names</td>
			        <td class="align_center report_head">D.O.B</td>
			        <!-- <td class="align_center report_head">Age</td> -->
					<?php
					// if(isset($_POST)){
					// 	//print_r($_POST);
					// 	$test = '';
					// 	if(!empty($_POST['schedul_ids'])) {
					// 	     foreach($_POST['schedul_ids'] as $check) {
					// 			 $test .= $check.',';
					// 		 }
					// 	}
					// 	$query = mysql_query("select distinct resultparameter_name from wc_result where resultcreateschedule_id IN ('$test')");
					// 	while($res = mysql_fetch_array($query)){
							?>
							<!-- <td class="align_center report_head"><?php //echo $res['resultparameter_name']; ?></td> -->
							<td class="align_center report_head">Parameter</td>
							<td class="align_center report_head">Result</td>
					        <td class="align_center report_head">Point</td>
						<?php //}
					//
					//
					// }
					?>


			      </tr>

					<?php
					if(isset($_POST)){
					if(!empty($_POST['schedul_ids'])) {
					    foreach($_POST['schedul_ids'] as $check) {
							$query = mysql_query("select * from wc_result inner join wc_athlete on  wc_athlete.athlete_id = wc_result.resultathlete_id where wc_result.resultcreateschedule_id ='$check' order by wc_athlete.athlete_name asc");
							while($res = mysql_fetch_array($query)){
								?>
							  <tr class="align_center delete_color">
								<td><?php echo $res['athlete_name']; ?></td>
								<td><?php echo $res['athlete_dob']; ?></td>
								<td><?php echo $res['resultparameter_name']; ?></td>
								<td><?php echo $res['result']; ?></td>
								<td><?php echo $res['points']; ?></td>
							  </tr>
							  <?php
							}
					    }
					}}
					?>

			  </table>
			</div>
		</div>
	</div><!-- end  container-->
	<div class="text-center">
		<a href="#" class="export btn btn-primary">Export Table data into Excel</a>
		
	</div>
</div><!-- end  container-->
<script type="text/javascript">
$(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace(/"/g, '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });
    }

    // This must be a hyperlink
    $(".export").on('click', function (event) {
        // CSV
        exportTableToCSV.apply(this, [$('#dvData>table'), 'export.csv']);

        // IF CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});
</script>
<?php require_once "footer.php" ?>
