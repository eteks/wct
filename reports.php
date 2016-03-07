<?php
require_once "session.php";
require_once "header.php";
require_once "functions/create_schedule_function.php";
$createschedule = new createscheduleFunction();
?>
<div class="container align_bottom">
	<div class="container left_align_testbattery align_height">
		<span class="sports">REPORTS</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-10">
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-7 align_margin">
				<form id="report_form" name="report_form" action="reports.php" method="post">
					<div class="align_margin">
						<label>Select Schedule</label><br>
						<div class="area_scroll">
							<?php
							   $data = $createschedule->createscheduleselectfunction();
							   foreach( $data as $eachrecord ) {
								?>
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox"  data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['createschedule_id']; ?>" name="schedul_ids[]"><?php echo $eachrecord ['createschedule_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>
					</div>
				<!--	<div class="col-md-9"> -->
						<input type="reset" class="btn btn-primary clear" value="Cancel">
						<input type="submit" class="btn btn-primary test-submit clear" name="submit" value="Submit">
				<!--	</div> -->
				</form>
			</div>
			<?php if(isset($_POST['submit'])){ ?>
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
					if(isset($_POST['submit'])){
					if(!empty($_POST['schedul_ids'])) {
					    foreach($_POST['schedul_ids'] as $check) {
							$query = mysql_query("select * from wc_result inner join wc_athlete on  wc_athlete.athlete_id = wc_result.resultathlete_id where wc_result.resultcreateschedule_id ='$check' order by wc_athlete.athlete_name asc");
							while($res = mysql_fetch_array($query)){
								?>
							  <tr class="align_center delete_color">
								<td><?php echo $res['athlete_name']; ?></td>
								<td><?php echo date("d/m/Y", strtotime($res['athlete_dob'])); ?></td>
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
			<?php } ?>
		</div>
	</div><!-- end  container-->
	<?php if(isset($_POST['submit'])){ ?>
	<div class="text-center">
		<a href="#" class="export btn btn-primary">Export Table data into Excel</a>
	</div>
	<?php } ?>
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
