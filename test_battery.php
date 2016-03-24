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
	echo "<script>alert('Test Battery edited successfully!');var url ='".$url."'; window.location = url ;</script>";
}
if(isset($_GET['insert_success'])){
	echo "<script>alert('Test Battery inserted successfully!');var url ='".$url."'; window.location = url ;</script>";
}
if(isset($_GET['duplicate'])){
	echo "<script>alert('Test Battery already exist!');var url ='".$url."'; window.location = url ;</script>";
}
 ?>
 <style type="text/css">
	thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
	}
	.table > tbody tr:last-child{
		border: 0 none !important;
	}
	.table > thead{
		border-bottom: 0 none !important;
	}
	tbody tr {
    border-left: 0 none !important;
    border-right: 0 none !important;
	}
	.paging-nav {
    display: none;
	}
	.table > tbody td{
		height: 12px;
	}
</style>
<div class="container">
	<div class="container left_align_testbattery align_height">
		<span class="sports">TEST BATTERY</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12">
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-6 align_margin">
				<form method="post" action="functions/test_battery_functions.php" id="test_battery_form">
					<div class="form-group">
						<label>Enter name of Test Battery</label><br>
						<input type="text" class="adjust_width" name="test_battery_name" autocomplete="off" data-validation-error-msg="Please enter name of Test Battery" data-validation="required">
					</div>
					<!-- <div class="form-group">
						  <label for="sel1">Select Sport</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Sport" data-validation-error-msg="Please select sport" data-validation="required">
							  <option value="">Select Sport</option>
							  <?php
					  		//$data = $sports->sportsselectfunction();
					  		//foreach( $data as $eachrecord ) {
					  		 ?>
							 <option value="<?php //echo $eachrecord ['sports_id']; ?>"><?php //echo $eachrecord ['sports_name']; ?></option>
							 <?php //} ?>
							</select>
					</div> -->
					<div class="align_margin">
						<label>Select Sports</label><br>
						<div class="area_scroll">
							<?php
					  		$data = $sports->sportsselectfunction();
					  		foreach( $data as $eachrecord ) {
					  		 ?>
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" name='sports[]' data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['sports_id']; ?>"><?php echo $eachrecord ['sports_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>
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
						<label>Select Tests</label><br>
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
						<input type="submit" class="btn btn-primary test-submit clear" value="Submit">
						<input type="reset" value="Cancel" class="btn btn-primary clear" maxlength="50">
					</div>
				</form>
			</div>
			<div class="col-md-12 align_bottom">
				<div class="col-md-3 search_part" style="padding: 0px;">
					<div class="test_title">
						<span>Test Battery Name</span>
					</div><!--test_title-->
					<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box test_battery_search" placeholder="Search Name">
								<i class="fa fa-search font-search"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
									$data = $test_battery->testbatterynamefunction();
									foreach( $data as $eachrecord ) {
									 ?>
									<span class="test-name test-battery-test-name">
										<input type="checkbox" name="test" value="test" class="check_test test_battery_name_hover_check" id="check-select" data-id ="<?php echo $eachrecord ['testbattery_id']; ?>" >
										<input type="text" name="test" value="<?php echo $eachrecord ['testbattery_name']; ?>" class="list_edit test_battery_name_hover input_wrap">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item save_test_battery_name"></i>
											<i class="fa fa-pencil-square-o edit_item"></i>
											<i class="fa fa-trash-o delete_item"></i>
										</span><!--test-alter-->
									</span><!--test-name-->
									<div class="delete_div delete_search">
							            <!-- <code class="close_btn cancel_btn"> </code>  -->
							              <div class="del_title">
							                <span class="del_txt">DELETE</span>
							              </div>
							              <div class="del_content">
							                <span class="del_content_txt">Are you sure want to delete this whole record?</span>
							                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="test_battery_name" data-id ="<?php echo $eachrecord ['testbattery_id']; ?>">
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
									<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
					</form>
				</div>

			<div class="container table-position col-md-9" style="padding: 0px;">
			  <table class="table state_table" id="test_battery_table">
			    <thead>
			      <tr class="row_color">
			        <!-- <th class="align_center">SLNO</th> -->
			        <!-- <th class="align_center">Test Battery Name</th> -->
			        <th class="align_center">Sports</th>
			        <th class="align_center">Categories</th>
			        <th class="align_center">Test</th>
			        <th class="action_align">Action</th>
			      </tr>
			    </thead>
					<!-- <?php
					//$data = $test_battery->testbatteryselectfunction();
					//$i=1;
					//foreach( $data as $eachrecord ) {
					 ?> -->

			    <tbody style="display:block;height:260px;overflow:auto;">
			      <tr class="align_center delete_color">
			        <!-- <td class="test_battery_sports_name_grid"><?php
				  //$test_battery_sports = $test_battery->testbatterysportslastselectfunction();
				  //$row = mysql_fetch_array($test_battery_sports);
				  //echo $row['sports_name'];
				  ?></td> -->
				  	<td class="sports-list">Selected Sports<i class="fa fa-angle-down down_font"></i>
			        	<div class="hover-list hover-sports">
			        	<span class="hover_title ">Selected Sports</span>
						<div class="selected_sports">
							<?php
						  $spts_data = $test_battery->sportslastselectfunction();
						  while($row = mysql_fetch_array($spts_data)){
						   ?>
							<div class="checkbox align_check" style="margin:0px;">
								<label class="hover-content"><?php echo $row['sports_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>

						</div>
			        </td>
			        <td class="category-list">Selected Categories<i class="fa fa-angle-down down_font"></i>
			        	<div class="hover-list hover-category">
			        	<span class="hover_title ">Selected Categories</span>
						<div class="selected_category">
							<?php
						  $cat_data = $test_battery->categorylastselectfunction();
						  while($row = mysql_fetch_array($cat_data)){
						   ?>
							<div class="checkbox align_check" style="margin:0px;">
								<label class="hover-content"><?php echo $row['categories_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>

						</div>
			        </td>
			        <td class="test-battery">Selected Test<i class="fa fa-angle-down down_font"></i>
			        	<div class="hover-list hover-test">
			        	<span class="hover_title_test">Selected Test</span>
						<div class="selected_test">
							<?php
						  $test_data = $test_battery->testbatterytestlastselectfunction();
						  while($row = mysql_fetch_array($test_data)){
						   ?>
							<div class="checkbox align_check" style="margin:0px;">
					      		<label class="hover-content"><?php echo $row ['test_name']; ?></label>
					    	</div>
							<?php } ?>
						</div>
					</div>
			        </td>
			        <td class="popup-edit">
			        	<span class="edit_state edit_test_battery " data-value="<?php $test_data = $test_battery->testbatterylastidfunction();echo $test_data['MAX(testbattery_id)'];?>"><i class="fa fa-pencil-square-o"></i></span>
		        		<span class="delete_state"><i class="fa fa-trash-o"></i></span>
		        		<div class="test_battery popup_hidden">
			          		<code class="close_btn cancel_btn"> </code>
			          		<div class="edit_title">
									<span class="del_txt">Edit Test Battery</span>
							</div><!--edit_title-->
		          			<div class="container col-md-12">
			          			<div class="col-xs-12 col-md-12">
										<form  method="post" action="functions/test_battery_functions.php" id="test_battery_update_form">
										<input type="hidden" name="testbattery_update" value="1" />
										<div class="form-group">
											<!-- <label>Enter the name of the Test Battery</label><br> -->
											<input type="hidden" class="adjust_width test_battery_name_update" name="test_battery_name" value="" data-validation-error-msg="please Enter the name of the Test Battery" data-validation="required">
											<input type="hidden" class="test_battery_id_update" name="test_battery_id" value="" />
										</div>
										<!-- <div class="form-group">
											  <label for="sel1" class="popup_label">Select Sport</label>
											  <select class="form-control adjust_width box-width classic edit_test_sport" id="sel1" name="Sport" data-validation-error-msg="please Select the Sport" data-validation="required">
											  <option value="">Select Sport</option>
												  <?php
												//$data = $sports->sportsselectfunction();
												//foreach( $data as $eachrecord ) {
												 ?>
												 <option value="<?php //echo $eachrecord ['sports_id']; ?>"><?php //echo $eachrecord ['sports_name']; ?></option>
												 <?php //} ?>
											  </select>
										</div> -->
										<div class="form-group">
											<label class="popup_label">Select Sports</label><br>
											<div class="area_scroll_popup">
												<?php
											  		$sports_data = $sports->sportsselectfunction();
											  		foreach( $sports_data as $eachrecord ) {
											   ?>
												<div class="checkbox align_check ">
										      		<label class="checklist_txt"><input class="sprts_get" type="checkbox" name='sports[]' data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['sports_id']; ?>"><?php echo $eachrecord ['sports_name']; ?></label>
										    	</div>
												<?php } ?>
											</div>
										</div>
										<div class="form-group">
											<label class="popup_label">Select Categories</label><br>
											<div class="area_scroll_popup">
												<?php
											  		$cat_data = $category->categoryselectfunction();
											  		foreach( $cat_data as $eachrecord ) {
											   ?>
												<div class="checkbox align_check ">
										      		<label class="checklist_txt"><input class="cate_get" type="checkbox" name='categories[]' data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['categories_id']; ?>"><?php echo $eachrecord ['categories_name']; ?></label>
										    	</div>
												<?php } ?>
											</div>
										</div>
										<div class="">
											<label class="popup_label">Select Tests</label><br>
											<div class="area_scroll_popup form-group">
												<?php
											  $test_data = $test->testbatteryselectfunction();
											  foreach( $test_data as $eachrecord ) {
											   ?>
												<div class="checkbox align_check">
										      		<label class="checklist_txt"><input class="test_get" type="checkbox" name="test[]" data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['test_id']; ?>"><?php echo $eachrecord ['test_name']; ?></label>
										    	</div>
												<?php } ?>
											</div>
										</div>

										<div class="col-md-12 schedule_btn">
											<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
											<input type="submit" class="btn btn-primary align_right test-submit clear" value="Save">
										</div>
									</form>
								</div>
							</div><!--state-content-->
					</div><!--test_battery_div-->
						<div class="delete_div delete_test_div test-delete-div">
				            <!-- <code class="close_btn cancel_btn"> </code>  -->
				              <div class="del_title">
				                <span class="del_txt">DELETE</span>
				              </div>
				              <div class="del_content">
				                <span class="del_content_txt">Are you sure you want to delete this record?</span>
				                <input type="button" class="btn btn-primary align_right no_btn" value="No">
				                <input type="button" class="btn btn-primary align_right yes_btn test_battery_delete_button" value="Yes" data-delete="test_battery_attribute" data-id="<?php $test_data = $test_battery->testbatterylastidfunction();echo $test_data['MAX(testbattery_id)'];?>">
				                <input type="hidden" name="delete_id" value="" id="delete_id"/>
				              </div><!--del_content-->
					<!--delete_div-->
			        </td>
			      </tr>
				  <!-- <?php //$i++; } ?> -->
			    </tbody>
			  </table>

			  <div class="testingid">

			  </div>
			</div>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->
<!-- <div class="popup_fade cancel_btn"></div> -->

<?php require_once "footer.php" ?>
