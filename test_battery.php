<?php
require_once "session.php";
require_once "functions/sports_function.php";
require_once "functions/category_function.php";
require_once "functions/test_functions.php";
require_once "functions/test_battery_functions.php";
require_once "header.php";

$test_battery = new testbatteryfunction();
$sports = new sportsfunction();
$category = new categoryfunction();
$test = new testfunction();
?>
<?php
$url = $_SERVER['PHP_SELF'];
if(isset($_GET['update_success'])){
	echo "<script>alert('Test Battery update successfully');var url ='".$url."'; window.location = url ;</script>";
}
if(isset($_GET['insert_success'])){
	echo "<script>alert('Test Battery inserted successfully');var url ='".$url."'; window.location = url ;</script>";
}
if(isset($_GET['duplicate'])){
	echo "<script>alert('Test Battery already exist!');var url ='".$url."'; window.location = url ;</script>";
}
 ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">TEST BATTERY</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form method="post" action="functions/test_battery_functions.php" id="test_battery_form">
					<div class="form-group">
						<label>Enter the name of the Test Battery</label><br>
						<input type="text" class="adjust_width" name="test_battery_name" data-validation-error-msg="please Enter the name of the Test Battery" data-validation="required">
					</div>
					<div class="form-group">
						  <label for="sel1">Select Sport</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Sport" data-validation-error-msg="Please Select the sport" data-validation="required">
							  <option value="">Select Sport</option>
							  <?php
					  		$data = $sports->sportsselectfunction();
					  		foreach( $data as $eachrecord ) {
					  		 ?>
							 <option value="<?php echo $eachrecord ['sports_id']; ?>"><?php echo $eachrecord ['sports_name']; ?></option>
							 <?php } ?>
							</select>
					</div>
					<div class="align_margin">
						<label>Select Categories</label><br>
						<div class="area_scroll">
							<?php
						  $cat_data = $category->categoryselectfunction();
						  foreach( $cat_data as $eachrecord ) {
						   ?>
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" name='categories[]' data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['categories_id']; ?>"><?php echo $eachrecord ['categories_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>
					</div>
					<div class="align_margin">
						<label>Select Test</label><br>
						<div class="area_scroll">
							<?php
						  $test_data = $test->testbatteryselectfunction();
						  foreach( $test_data as $eachrecord ) {
						   ?>
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" name="test[]" data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['test_id']; ?>"><?php echo $eachrecord ['test_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-md-9 schedule_btn">
						<input type="hidden" value="1" name="testbattery_add" />
						<input type="reset" value="Cancel" class="btn btn-primary align_right clear" maxlength="50">
						<input type="submit" class="btn btn-primary align_right test-submit clear" value="Submit">
					</div>
				</form>
			</div>
			<div class="container table-position">
			  <table class="table state_table" id="test_battery_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">SLNO</th>
			        <th class="align_center">Test Battery Name</th>
			        <th class="align_center">Sports</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
					<?php
					$data = $test_battery->testbatteryselectfunction();
					$i=1;
					foreach( $data as $eachrecord ) {
					 ?>
			      <tr class="align_center delete_color">
			        <td class="testbattery_id"><?php echo $i; ?></td>
					<input type="hidden" value="<?php echo $eachrecord ['testbattery_id']; ?>" class="testbattery_edit_id">
			       	<td class="testbattery_name"><?php echo $eachrecord ['testbattery_name']; ?></td>
			        <td class="sports_name"><?php echo $eachrecord ['sports_name']; ?></td>
			        <td>
			        	<span class="edit_state edit_test_battery " data-value="<?php echo $eachrecord ['testbattery_id']; ?>">Edit</span>
		        		<span class="delete_state" data-value="<?php echo $eachrecord ['testbattery_id']; ?>">Delete</span>
			        </td>
			      </tr>
				  <?php $i++; } ?>
			    </tbody>
			  </table>
			  <div class="testingid">

			  </div>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->
<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="test_battery_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">
	          			<div class="col-xs-12 col-md-12 align_margin">

				<form  method="post" action="functions/test_battery_functions.php" id="test_battery_update_form">
					<input type="hidden" name="testbattery_update" value="1" />
					<div class="form-group">
						<label>Enter the name of the Test Battery</label><br>
						<input type="text" class="adjust_width test_battery_name_update" name="test_battery_name" value="" data-validation-error-msg="please Enter the name of the Test Battery" data-validation="required">
						<input type="hidden" class="test_battery_id_update" name="test_battery_id" value="" />
					</div>
					<div class="form-group">
						  <label for="sel1">Select Sport</label>
						  <select class="form-control adjust_width classic edit_test_sport" id="sel1" name="Sport" data-validation-error-msg="please Select the Sport" data-validation="required">
						  <option value="">Select Sport</option>
							  <?php
							$data = $sports->sportsselectfunction();
							foreach( $data as $eachrecord ) {
							 ?>
							 <option value="<?php echo $eachrecord ['sports_id']; ?>"><?php echo $eachrecord ['sports_name']; ?></option>
							 <?php } ?>
						  </select>
					</div>
					<div class="form-group">
						<label>Select Categories</label><br>
						<div class="area_scroll_popup">
							<?php
						  		$cat_data = $category->categoryselectfunction();
						  		foreach( $cat_data as $eachrecord ) {
						   ?>
							<div class="checkbox align_check ">
					      		<label class="remember_txt"><input class="cate_get" type="checkbox" name='categories[]' data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['categories_id']; ?>"><?php echo $eachrecord ['categories_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>
					</div>
					<div class="align_margin">
						<label>Select Test</label><br>
						<div class="area_scroll_popup">
							<?php
						  $test_data = $test->testbatteryselectfunction();
						  foreach( $test_data as $eachrecord ) {
						   ?>
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input class="test_get" type="checkbox" name="test[]" data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['test_id']; ?>"><?php echo $eachrecord ['test_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-md-12 schedule_btn">
						<input type="reset" value="Cancel" class="btn btn-primary align_right clear" maxlength="50">
						<input type="submit" class="btn btn-primary align_right test-submit clear" value="Submit">
					</div>
				</form>
			</div>
					</div><!--state-content-->
			</div><!--test_battery_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>
