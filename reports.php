<?php
require_once "session.php";
require_once "header.php";
require_once "functions/create_schedule_function.php";
$createschedule = new createscheduleFunction();

?>
<style type="text/css">
	.footer_txt{
		position: absolute !important;
	}
</style>
<div class="container">
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
					<input type="reset" class="btn btn-primary clear" value="Cancel">
					<input type="submit" class="btn btn-primary test-submit clear report_sumbit" name="submit" value="Submit">
				</form>
			</div>
			<?php
				if(isset($_POST['submit'])){
					//header('Content-Type: text/csv; charset=utf-8');
					//header('Content-Disposition: attachment; filename=export.csv');
					$output = fopen($_SERVER["DOCUMENT_ROOT"] . "/wct/export/export.csv", 'w');
					if(!empty($_POST['schedul_ids'])) {
						foreach($_POST['schedul_ids'] as $check) {
							$id = $check;
							$sql1 = "select * from wc_athlete inner join wc_assignschedule on wc_assignschedule.assignathlete_id= wc_athlete.athlete_id where wc_assignschedule.assigncreateschedule_id = '$id'";
							$test = mysql_query($sql1);
							$test1[] = mysql_fetch_assoc($test);
							foreach($test1 as $testvalue){
								$sql2 = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,GROUP_CONCAT(CONCAT(wc_result.resultparameter_name,'#',wc_result.result,'#',wc_result.points)) results  from wc_result where wc_result.resultcreateschedule_id ='$id' and wc_result.resultathlete_id = '".$testvalue['athlete_id']."' ";
								$res = mysql_fetch_assoc(mysql_query($sql2));
								$csv_record = array($testvalue['athlete_name'],date("d/m/Y", strtotime($testvalue['athlete_dob'])),$testvalue['athlete_mobile'],$testvalue['athlete_gender'],$testvalue['assignbib_number']);
								$pararms = explode(",",$res['results']);
								foreach($pararms as $single_param){
									$param_split = explode("#",$single_param);
									array_push($csv_record,$param_split[0]);
									array_push($csv_record,$param_split[1]);
									array_push($csv_record,$param_split[2]);
								}
								fputcsv($output, $csv_record);
								exit;
							}
						}
					}
				}
			?>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->
<?php require_once "footer.php" ?>
