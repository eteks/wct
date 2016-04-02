<?php require_once "session.php";
	  require_once "header.php";
	  require_once 'functions/range_function.php';
	  require_once "functions/test_battery_functions.php";
	  require_once "functions/category_function.php";
	  require_once "functions/test_functions.php";
	  $rangeFunction = new rangeFunction();
	  $testbatteryfunction =  new testbatteryfunction();
	  $categoryfunction = new categoryfunction();
	  $testfunction = new testfunction();
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
	<div class="container align_center left_align_category align_height">
		<span class="sports">RANGE</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-12">
			<!-- <div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="range_form" class="range_form_id">
					<div class="form-group">
						  <label for="sel1">Select Test Battery</label>
						  <select class="form-control adjust_width classic" id="sel1" name="range_testbattery" data-validation-error-msg="Please select Test Battery " data-validation="required">
						  <option value="">Select Test Battery</option>
						  <?php
	                        $query = $testbatteryfunction->testbatterySelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['testbattery_id']; ?>"><?php echo $row['testbattery_name']; ?></option>
	                      <?php } ?>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Category</label>
						  <select class="form-control adjust_width classic range_category" id="sel1" name="range_category" data-validation-error-msg="Please select Category" data-validation="required">
						    <option value="">Select Category</option>
						  <!--<?php
						  $cat_data = $categoryfunction->categoryselectfunction();
						  foreach( $cat_data as $eachrecord ) {
						   ?>
							<option value="<?php echo $eachrecord['categories_id']; ?>"><?php echo $eachrecord['categories_name']; ?></option>
							<?php } ?> -->
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Test</label>
						  <select class="form-control adjust_width classic range_test" id="sel1" name="range_test" data-validation-error-msg="Please select Test" data-validation="required">
						  <option value="">Select Test</option>
						   <!-- <?php
	                        $query = $testfunction->testSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>
	                      <?php } ?> -->
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Parameter</label>
						  <select class="form-control adjust_width classic range_parameter" id="sel1" name="range_parameter" data-validation-error-msg="Please select Parameter" data-validation="required">
						  <option value="">Select Parameter</option>
						  </select>
						  <input type="hidden" class="range_parameter_type">
						  <input type="hidden" class="range_parameter_unit">
						  <input type="hidden" class="range_parameter_format">
					</div>
					<!-- <div class="form-group range_holder">
						<div class="clone_content" id="range_counter1">
						  <label for="range" class="fl range_label">Ranges</label><br>
						  <input type="text" class="form-control classic range_align fl r_strt" id="strt1" name="range_start1" placehoder="Start" data-validation-error-msg="Please Enter the start range of Test" data-validation="required">
						  <input type="text" class="form-control classic range_align fl r_end" id="end1" name="range_end1" placehoder="end" data-validation-error-msg="Please Enter the End range of Test" data-validation="required">
						  <input type="text" class="form-control classic range_align fl r_point" id="point1" name="range_points1" placehoder="points" data-validation-error-msg="Please Enter the Point" data-validation="required">
						</div>
					</div> -->
					<div class="form-group range_holder col-md-12">
						<div class="clone_content" id="range_counter1">
						  <label for="range" class="range_label">Ranges <span class="range_note">(Note:<span class="range_notes"></span>)</span></label><br>
						  	<div class="form-group col-md-10">
								  <div class="col-md-4 range-box1">
								  	<input type="text" class="form-control classic range_align  r_strt" id="strt1" name="range_start1" autocomplete="off" placeholder="Start">
								    <span class="hided">Please enter Range Start</span>
								    <span class="hided">Please enter ranges in correct format</span>
								  </div>
								  <div class="col-md-4 range-box2">
								  	<input type="text" class="form-control classic range_align  r_end check_end_range" id="end1" name="range_end1" autocomplete="off" placeholder="End">
								  	<span class="hided">Please enter Range End</span>
								  	<span class="hided">Please enter ranges in correct format</span>
								  	<!-- <span class="hided">Enter greater than start value</span> -->
								  	<span class="hided">Please enter correct ranges</span>
								  </div>
								  <div class="col-md-4 range-box3">
								  	<input type="text" class="form-control classic range_align  r_point" id="point1" name="range_points1" autocomplete="off" placeholder="Points">
								  	<span class="hided">Please enter Points</span>
								  	<span class="hided">Please enter ranges in correct format</span>
								  </div>
							</div>
						</div>
					</div>
					<div class="form-group add-ranges-button col-md-3">
						<!-- <input type="button" class="btn btn-primary ranges_btn add_range_points" value="Add Ranges"> -->
						<!-- <i class="fa fa-plus plus_align add_range_points"></i> -->
						<button class="plus_align add_range_points"><i class="fa fa-plus">
							<div class="tooltip_parameter">Add Range</div>
							<div class="tip_triangle"></div>
						</i>
						</button>
						<button class="plus_align range_remove"><i class="fa fa-minus">
							<div class="tooltip_remove">Remove Range</div>
							<div class="tip_triangle"></div>
						</i></button>
					</div>
					<!-- <button type="button" class="btn btn-primary align_right ranges_btn add_range_points">Add Ranges</button><i class="fa fa-plus plus_align"></i> -->
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary test-submit clear add_range_act" value="Save">
						<input type="reset" value="Cancel" class="btn btn-primary clear reset_form" maxlength="50">
					</div>
				</form>
			</div>
			<div class="col-md-12">
				<div class="col-md-3 search_part" style="padding: 0px;">
					<div class="test_title">
						<span>Test Battery Name</span>
					</div><!--test_title-->
					<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box search_text tb_search" placeholder="Search Name">
								<i class="fa fa-search font-search search_button"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
				                        $query = $rangeFunction->rangetestbatterysearchSelect();
				                        while ($row = mysql_fetch_array($query)) {
			                        ?>
									<span class="test-name">
										<input type="checkbox" name="test" value="" class="check_test check_list check_testbattery" id="check-select">
										<input type="hidden" class="check_testbatteryid check_data" name="check_testbatteryid" value="<?php echo $row['testbattery_id']; ?>">
										<input type="text" name="check_testbattery" value="<?php echo $row['testbattery_name']; ?>" class="list_edit input_wrap check_testbatteryname" autocomplete="off">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item save-testbattery"></i>
											<i class="fa fa-pencil-square-o edit_item"></i>
											<i class="fa fa-trash-o delete_item delete_state"  style="float: none;" <?php echo $row['testbattery_id']; ?>"></i>
										</span><!--test-alter-->
									</span><!--test-name-->
									<div class="delete_div delete_search">
							            <!-- <code class="close_btn cancel_btn"> </code>  -->
							              <div class="del_title">
							                <span class="del_txt">DELETE</span>
							              </div>
							              <div class="del_content">
							                <span class="del_content_txt">Are you sure want to delete this whole record?</span>
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="button" class="btn btn-primary align_right yes_btn_tb" value="Yes">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
          							<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
					</form>
				</div>
			<div class="container table-position align_bottom col-md-9" style="padding: 0px;">
			  <table class="table range_table check_table">
			    <thead>
			      <tr class="row_color">
			      	<!-- <th class="align_center">Test Battery Name</th> -->
			      	<th class="align_center">Category</th>
			        <th class="align_center">Test Name</th>
			        <th class="align_center">Parameter Name</th>
			        <th class="action_align">Action</th>
			      </tr>
			    </thead>
			    <tbody style="display:block;height:260px;overflow:auto;">
			     	<?php
                    $query = $rangeFunction->rangeSelect();
                    $i=1;
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr class="align_center delete_color">
                        <input type="hidden" name="range_id" class="t_range_id" value="<?php echo $row['range_id']; ?>">
					    <input type="hidden" class ="rangetestbattery_id hidden_value" name="rangetestbattery_id" value="<?php echo $row['rangetestbattery_id']; ?>">
					     <!--   <td class="t_range_s_id"><?php // echo $i; ?></td> -->
					         <!-- <td class="t_range_testbatteryname"><?php echo $row['testbattery_name']; ?></td> -->
					        <td class="t_range_categoryname"><?php echo $row['categories_name']; ?></td>
					        <td class="t_range_testname"><?php echo $row['test_name']; ?></td> 
					       <td class="t_range_paramtername"><?php echo $row['test_parameter_name']; ?></td>
					        <td class="popup-edit">
					        	<span class="edit_state" onclick="editfunction(<?php echo $row['range_id'] ?>,this)"><i class="fa fa-pencil-square-o"></i></span>
					        	<span class="delete_state" data-value="<?php echo $row['range_id'] ?>"><i class="fa fa-trash-o"></i></span>
								<div class="range_div popup_hidden">
						          		<code class="close_btn cancel_btn"> </code>
						          		<div class="edit_title">
						                	<span class="del_txt">Edit Range</span>
						              	</div><!--edit_title-->
						          			<div class="container state-content range_popup_scroll col-md-12">
							          			<div class="col-xs-12 col-md-12 align_margin">
										<form name="edit_range_form" class="edit_range_form_id">
										<input type="hidden" name="edit_range_id">
										<input type="hidden" class ="edit_range_testbattery" name="edit_range_testbattery" value="<?php echo $row['rangetestbattery_id']; ?>">
										<input type="hidden" class="edit_remove_rattr_id" name="edit_remove_rattr_id" value="">
										<input type="hidden" class="hide_range_parameter" name="hide_range_parameter">
									    <input type="hidden" class="hide_range_category" name="hide_range_category">
									    <input type="hidden" class="hide_range_test" name="hide_range_test">	
											<!-- <div class="form-group">
											    <label for="sel1" class="popup_label">Select Test Battery Names</label>
											  	<select class="form-control adjust_width classic box-width box_range" id="sel1" name="edit_range_testbattery" data-validation-error-msg="Please Select the Name of Test Battery " data-validation="required">
												  <option value="">Select Test Battery Names</option>
												  <?php
							                        $tb_query = $testbatteryfunction->testbatterySelect();
							                        while ($row1 = mysql_fetch_array($tb_query)) {
							                            ?>
							                            <option value="<?php echo $row1['testbattery_id']; ?>"><?php echo $row1['testbattery_name']; ?></option>
							                      <?php } ?>
										  		</select>
											</div> -->
											<div class="form-group">
												  <label for="sel1" class="popup_label">Select Category</label>
												  <select class="form-control adjust_width classic range_category box-width box_range" id="sel1" name="edit_range_category" data-validation-error-msg="Please select Category" data-validation="required">
												  <option value="">Select Category</option>
												  </select>
											</div>
											<div class="form-group">
												  <label for="sel1" class="popup_label">Select Test</label>
												  <select class="form-control adjust_width classic edit_range_test box-width box_range" id="sel1" name="edit_range_test" data-validation-error-msg="Please select Test" data-validation="required">
												  <option value="">Select Test Name</option>
												  </select>
											</div>
											<div class="form-group">
												  <label for="sel1" class="popup_label">Select Parameter</label>
												  <select class="form-control adjust_width classic range_parameter edit_range_parameter box-width box_range" id="sel1" name="edit_range_parameter" data-validation-error-msg="Please select Parameter" data-validation="required">
												  <option value="">Select Parameter Name</option>
												  </select>
												  <input type="hidden" class="range_parameter_type">
												  <input type="hidden" class="range_parameter_unit">
												  <input type="hidden" class="range_parameter_format">
											</div>
											<div class="form-group edit_range_holder">
											   <div class="edit_clone_content" id="edit_range_counter1">
											  	  <label for="range" class="fl edit_range_label">Ranges <span class="edit_range_note">(Note:<span class="edit_range_notes"></span>)</span></label><br>
											  	  <input type="hidden" class="edit_rattr_id" name="edit_rangeattr_id1" value="">
											  	  <input type="hidden" class="edit_r_id" name="edit_range_id1" value="">
											      	<div class="form-group col-md-12 ranges_popup">
												      	<div class="col-md-4">
												      		<input type="text" class="form-control classic range_align_popup edit_r_strt" id="edit_strt1" name="edit_range_start1" autocomplete="off" placehoder="Start">
												       		<span class="hided">Please enter Range Start</span>
											    			<span class="hided">Please enter ranges in correct format</span>
												       	</div>
												       	<div class="col-md-4">
												      		<input type="text" class="form-control classic range_align_popup edit_r_end check_end_range" id="edit_end1" name="edit_range_end1" autocomplete="off" placehoder="end">
												       		<span class="hided">Please enter Range End</span>
											  				<span class="hided">Please enter ranges in correct format</span>
											  				<span class="hided">Please enter correct ranges</span>
												       	</div>
												       	<div class="col-md-4">
												      		<input type="text" class="form-control classic range_align_popup edit_r_point" id="edit_point1" name="edit_range_points1" autocomplete="off" placehoder="points">
											  				<span class="hided">Please enter Points</span>
											  				<span class="hided">Please enter ranges in correct format</span>
											  			</div>

											  		</div><!--ranges_popup-->
											  </div>
											</div>
											<div class="add-ranges-button popup_add_range col-md-12 form-group">
												<!-- <input type="button" class="btn btn-primary ranges_btn add_range_points" value="Add Ranges"> -->
												<!-- <i class="fa fa-plus plus_align add_range_points"></i> -->
											<button class="plus_align edit_range_points">
												<i class="fa fa-plus">
													<div class="tooltip_parameter popup-add">Add Range</div>
													<div class="tip_triangle"></div>
												</i>
											</button>
											<button class="plus_align range_remove edit_range_remove">
												<i class="fa fa-minus">
													<div class="tooltip_remove popup-remove">Remove Range</div>
													<div class="tip_triangle"></div>
												</i>
											</button>
											</div><!--add-ranges-button-->
											<div class="col-md-12 schedule_btn">
												<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
												<input type="submit" class="btn btn-primary test-submit clear edit_range_act" value="Save">
												<input type="reset" value="Cancel" class="btn btn-primary clear reset_form" maxlength="50">
											</div>
										</form>
									</div>
								</div><!--state-content-->
							</div><!--range_div-->
							<div class="delete_div delete_test_div delete-range">
					            <!-- <code class="close_btn cancel_btn"> </code>  -->
					              <div class="del_title">
					                <span class="del_txt">DELETE</span>
					              </div>
					              <div class="del_content">
					                <span class="del_content_txt">Are you sure you want to delete this record?</span>
					                <input type="button" class="btn btn-primary align_right no_btn" value="No">
					                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
					                <input type="hidden" name="delete_id" value="" id="delete_id"/>
					              </div><!--del_content-->
  							</div><!--delete_div-->
							</td>
				        </tr>
                    <?php $i++; } ?>
			    </tbody>
			  </table>
			</div>
		</div>
	</div><!-- end  container-->
	</div><!--col-md-12->
	<!-- <div class="container align_center">
	  	<ul class="pagination">
	  		<li><a href="#" class="align_left_icon"><i class="fa fa-angle-double-left"></i></a></li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li><a href="#" class="align_right_icon"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>
	</div> --><!-- end  container-->
</div><!-- end  container-->

<!-- <div class="popup_fade cancel_btn"></div> --><!--popup_fade-->
		<!-- <div class="container">
            		</div> --> <!--container-->
<?php require_once "footer.php" ?>
