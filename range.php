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
<div class="container">
	<div class="container align_center left_align_category align_height">
		<span class="sports">RANGE</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<!-- <div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="range_form" class="range_form_id">
					<div class="form-group">
						  <label for="sel1">Select Test Battery Names</label>
						  <select class="form-control adjust_width classic" id="sel1" name="range_testbattery" data-validation-error-msg="Please Select the Name of Test Battery " data-validation="required">
						  <option value="">Select Test Battery Names</option>
						  <?php
	                        $query = $testbatteryfunction->testbatterySelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['testbattery_id']; ?>"><?php echo $row['testbattery_name']; ?></option>
	                      <?php } ?>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Category</label>
						  <select class="form-control adjust_width classic range_category" id="sel1" name="range_category" data-validation-error-msg="Please Select the Category of Test Battery" data-validation="required">
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
						  <label for="sel1">Test Name</label>
						  <select class="form-control adjust_width classic range_test" id="sel1" name="range_test" data-validation-error-msg="Please Select the name of the Test" data-validation="required">
						  <option value="">Select Test Name</option>
						   <!-- <?php
	                        $query = $testfunction->testSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>
	                      <?php } ?> -->
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Parameter Name</label>
						  <select class="form-control adjust_width classic range_parameter" id="sel1" name="range_parameter" data-validation-error-msg="Please Select the name of the Parameter" data-validation="required">
						  <option value="">Select Parameter Name</option>
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
								  <div class="col-md-4">
								  	<input type="text" class="form-control classic range_align  r_strt" id="strt1" name="range_start1" placeholder="Start">
								    <span class="hided">Please Enter the start range</span>
								    <span class="hided">Please Check the format</span>
								  </div>
								  <div class="col-md-4">
								  	<input type="text" class="form-control classic range_align  r_end" id="end1" name="range_end1" placeholder="End">
								  	<span class="hided">Please Enter the end range</span>
								  	<span class="hided">Please Check the format</span>
								  </div>
								  <div class="col-md-4">
								  	<input type="text" class="form-control classic range_align  r_point" id="point1" name="range_points1" placeholder="Points">
								  	<span class="hided">Please Enter the points</span>
								  	<span class="hided">Please Check the format</span>
								  </div>
							</div>
						</div>
					</div>
					<div class="form-group add-ranges-button col-md-3">
						<!-- <input type="button" class="btn btn-primary ranges_btn add_range_points" value="Add Ranges"> -->
						<!-- <i class="fa fa-plus plus_align add_range_points"></i> -->
						<i class="fa fa-plus plus_align add_range_points">
							<div class="tooltip_parameter">Add Range</div>
							<div class="tip_triangle"></div>
						</i>
						<i class="fa fa-minus range_remove">
							<div class="tooltip_remove">Remove Range</div>
							<div class="tip_triangle"></div>
						</i>
					</div>
					<!-- <button type="button" class="btn btn-primary align_right ranges_btn add_range_points">Add Ranges</button><i class="fa fa-plus plus_align"></i> -->
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary test-submit clear add_range_act" value="Submit">
						<input type="reset" value="Cancel" class="btn btn-primary clear" maxlength="50">
					</div>
				</form>
			</div>
			<div class="container table-position align_bottom">
			  <table class="table range_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">Test Name</th>
			        <th class="align_center">Parameter Name</th>
			        <th style="text-align:right;">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			     	<?php
                    $query = $rangeFunction->rangeSelect();
                    $i=1;
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr class="align_center delete_color">
                        <input type="hidden" name="range_id" class="t_range_id" value="<?php echo $row['range_id']; ?>">
					     <!--   <td class="t_range_s_id"><?php // echo $i; ?></td> -->
					        <td class="t_range_testname"><?php echo $row['test_name']; ?></td>
					        <td class="t_range_paramtername"><?php echo $row['test_parameter_name']; ?></td>
					        <td class="popup-edit">
					        	<span class="edit_state" onclick="editfunction(<?php echo $row['range_id'] ?>,this)"><i class="fa fa-pencil-square-o"></i></span>
					        	<span class="delete_state" data-value="<?php echo $row['range_id'] ?>"><i class="fa fa-trash-o"></i></span>
								<div class="range_div popup_hidden">
						          		<code class="close_btn cancel_btn"> </code>
						          		<div class="edit_title">
						                	<span class="del_txt">Edit Detail</span>
						              	</div><!--edit_title-->
						          			<div class="container state-content range_popup_scroll col-md-12">
							          			<div class="col-xs-12 col-md-12 align_margin">
										<form name="edit_range_form" class="edit_range_form_id">
										<input type="hidden" name="edit_range_id">
											<div class="form-group">
											    <label for="sel1" class="popup_label">Select Test Battery Names</label>
											  	<select class="form-control adjust_width classic box-width" id="sel1" name="edit_range_testbattery" data-validation-error-msg="Please Select the Name of Test Battery " data-validation="required">
												  <option value="">Select Test Battery Names</option>
												  <?php
							                        $tb_query = $testbatteryfunction->testbatterySelect();
							                        while ($row1 = mysql_fetch_array($tb_query)) {
							                            ?>
							                            <option value="<?php echo $row1['testbattery_id']; ?>"><?php echo $row1['testbattery_name']; ?></option>
							                      <?php } ?>
										  		</select>
											</div>
											<div class="form-group">
												  <label for="sel1" class="popup_label">Category</label>
												  <select class="form-control adjust_width classic range_category box-width" id="sel1" name="edit_range_category" data-validation-error-msg="Please Select the Category of Test Battery " data-validation="required">
												  <option value="">Select Category</option>
												  </select>
											</div>
											<div class="form-group">
												  <label for="sel1" class="popup_label">Test Name</label>
												  <select class="form-control adjust_width classic range_test box-width" id="sel1" name="edit_range_test" data-validation-error-msg="Please Select the Test Name" data-validation="required">
												  <option value="">Select Test Name</option>
												  </select>
											</div>
											<div class="form-group">
												  <label for="sel1" class="popup_label">Parameter Name</label>
												  <select class="form-control adjust_width classic range_parameter box-width" id="sel1" name="edit_range_parameter" data-validation-error-msg="Please Select the name of the Parameter" data-validation="required">
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
												      	<div class="col-md-12">
												      		<input type="text" class="form-control classic range_align_popup edit_r_strt" id="edit_strt1" name="edit_range_start1" placehoder="Start">
												       		<span class="hided">Please Enter the start range</span>
											    			<span class="hided">Please Check the format</span>
												       	</div>
												       	<div class="col-md-12">
												      		<input type="text" class="form-control classic range_align_popup edit_r_end" id="edit_end1" name="edit_range_end1" placehoder="end">
												       		<span class="hided">Please Enter the end range</span>
											  				<span class="hided">Please Check the format</span>
												       	</div>
												       	<div class="col-md-12">
												      		<input type="text" class="form-control classic range_align_popup edit_r_point" id="edit_point1" name="edit_range_points1" placehoder="points">
											  				<span class="hided">Please Enter the points</span>
											  				<span class="hided">Please Check the format</span>
											  			</div>
											  			
											  		</div><!--ranges_popup-->
											  </div>
											</div>
											<div class="add-ranges-button popup_add_range col-md-12 form-group">
												<!-- <input type="button" class="btn btn-primary ranges_btn add_range_points" value="Add Ranges"> -->
												<!-- <i class="fa fa-plus plus_align add_range_points"></i> -->
												<i class="fa fa-plus plus_align edit_range_points">
													<div class="tooltip_parameter popup-add">Add Range</div>
													<div class="tip_triangle"></div>
												</i>
												<i class="fa fa-minus range_remove edit_range_remove">
													<div class="tooltip_remove popup-remove">Remove Range</div>
													<div class="tip_triangle"></div>
												</i>
											</div><!--add-ranges-button-->
											<div class="col-md-12 schedule_btn">
												<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
												<input type="submit" class="btn btn-primary align_right test-submit clear edit_range_act" value="Save">
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
					                <span class="del_content_txt">Are you sure want to delete this whole record?</span>
					                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
					                <input type="button" class="btn btn-primary align_right no_btn" value="No">
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
