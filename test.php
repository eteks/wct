<?php
require_once "session.php";
require_once "header.php";
require_once "functions/test_functions.php";
$obj = new testfunction();

?>
<?php
$url = $_SERVER['PHP_SELF'];
if(isset($_GET['insert'])){
	echo "<script>alert('Test inserted successfully!');var url ='".$url."'; window.location = url ;</script>";
}
if(isset($_GET['update'])){
	echo "<script>alert('Test updated successfully!');var url ='".$url."'; window.location = url ;</script>";
}
if(isset($_GET['insert_error'])){
	echo "<script>alert('Test already exist!');var url ='".$url."'; window.location = url ;</script>";
}
?>
<div class="container">
	<div class="container left_align_parameter align_height">
		<span class="sports">TEST</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-12">
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-12 align_margin">
				<form id="test_form" action="functions/test_functions.php" method="post">
					<div class="form-group">
						<label>Enter Test Name</label><br>
						<input type="text" class="adjust_width" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required">
					</div>
					<div class="parameter_holder1">
						<div class="clone_content" id="param_counter1">
							<div class="form-group col-md-12 schedule_test">
							<div class="form-group col-md-5">
								<label>Enter Parameter Name</label><br>
								<input type="text" class="adjust_width parameter_name" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required">
								<span class="hided param_name_error">Please Enter the parameter name</span>
							</div>

							<div class="form-group col-md-2">
									<select class="form-control classic type_align fl parameter_type" id="type" name="type1" data-validation-error-msg="Please Select the Type of the Parameter" data-validation="required">
										<option value="">
											Type
										</option>
										<?php
											$sql = mysql_query('select * from wc_parametertype') or die(mysql_error());
											$count = mysql_num_rows($sql);
											if ($count != '0') {
												while ($row = mysql_fetch_array($sql)) {
										?>
											<option value="<?php echo $row['parametertype_name']; ?>">
												<?php echo $row['parametertype_name']; ?>
											</option>
										<?php
												}
											}
										?>
									</select>
									<span class="hided param_type_error">Please Select the type</span>
								</div>
								<div class="form-group col-md-2">
									<select class="form-control classic type_align fl parameter_unit" id="unit" name="unit1" data-validation-error-msg="Please Select the Unit of the Parameter" data-validation="required">
									<option value="">Unit</option>
									</select>
									<span class="hided param_unit_error">Please Select the unit</span>
								</div>
								<div class="form-group col-md-2">
									<select class="form-control classic type_align fl parameter_format" id="format" name="format1" data-validation-error-msg="Please Select the Format of the Parameter" data-validation="required">
										<option value="">Format</option>
									</select>
									<span class="hided param_format_error">Please Select the format</span>
								</div>

								<div class="form-group parameter__align col-md-1">
									<!-- <input type="button" class="btn btn-primary align_right parameter_btn"> -->
									<i class="fa fa-plus parameter_btn parameter_add">
										<div class="tooltip_parameter">Add Parameter</div>
										<div class="tip_triangle"></div>
									</i>
									<i class="fa fa-minus parameter_remove">
										<div class="tooltip_remove">Remove Parameter</div>
										<div class="tip_triangle"></div>
									</i>
								</div>
							</div>
						</div>
					</div>

					<input type="hidden" name="test_add" value="1">
					<div class="col-md-9 schedule_btn">
						<input type="reset" value="Clear" class="btn btn-primary clear" maxlength="50">
						<input type="submit" class="btn btn-primary clear test-submit test_submit_act" value="Submit">
					</div>
				</form>
			</div>
			<div class="col-md-12">
				<div class="col-md-3 search_part" style="padding: 0px;">
					<div class="test_title">
						<span>Test Name</span>
					</div><!--test_title-->
					<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box" placeholder="Search Name">
								<i class="fa fa-search font-search"></i>
							</div><!--search__list-->
								<div class="test-list">
									<span class="test-name">
										<input type="checkbox" name="test" value="test" class="check_test" id="check-select">
										<input type="text" name="test" value="xyz" class="list_edit">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item"></i>
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
							                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
									<span class="test-name">
										<input type="checkbox" name="test" value="test" class="check_test">
										<input type="text" name="test" value="xyz" class="list_edit">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item"></i>
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
								                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
								                <input type="button" class="btn btn-primary align_right no_btn" value="No">
								                <input type="hidden" name="delete_id" value="" id="delete_id"/>
								              </div><!--del_content-->
          								</div><!--delete_div-->
          								<span class="test-name">
										<input type="checkbox" name="test" value="test" class="check_test" id="check-select">
										<input type="text" name="test" value="xyz" class="list_edit">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item"></i>
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
							                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
      								<span class="test-name">
										<input type="checkbox" name="test" value="test" class="check_test" id="check-select">
										<input type="text" name="test" value="xyz" class="list_edit">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item"></i>
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
							                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
      								<span class="test-name">
										<input type="checkbox" name="test" value="test" class="check_test" id="check-select">
										<input type="text" name="test" value="xyz" class="list_edit">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item"></i>
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
							                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->

								</div><!--test-list-->
						</div><!--search-content-->
					</form>



	            </div><!--search_part-->
				<div class="container table-position col-md-9" style="padding: 0px;">
				  <table class="table test_table1">
				    <thead>
				      <tr class="row_color">
						<th class="align_center">Parameter Name</th>
				        <th class="align_center">Type</th>
				        <th class="align_center">Unit</th>
				        <th class="align_center">Format</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>

					<!-- <?php
					//$data = $obj->testselectfunction();
					//$i=1;
					//foreach( $data as $eachrecord ) {
					 ?> -->

				      <tr class="align_center delete_color">
				        <!-- <td class="test_id"><?php //echo $i; ?></td> -->
						<input type="hidden" value="<?php echo $eachrecord ['test_attribute_id']; ?>" id="test_attribute_id">

				       <!--  <td><?php //echo $eachrecord ['test_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_type']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_unit']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_format']; ?></td> -->

				        <td>Long Jump</td>
				        <td>Distance</td>
				        <td>MT</td>
				        <td>dfdf</td>

				        <td class="popup-edit">
				        	<span class="edit_state edit_test" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord ['test_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>"><i class="fa fa-trash-o"></i></span>
			        			<div class="test_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Detail</span>
					              	</div><!--edit_title-->
					          			<div class="container col-md-12">
						          			<div class="col-xs-12 col-md-12">
									<form id="test_updation_form" action="functions/test_functions.php" method="post">
										<!-- <div class="form-group">
											<label>Enter Test Name</label><br>
											<input type="text" class="adjust_width test_name_update" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required" >
										</div> -->
										<div class="parameter_holder">
											<div class="form-group" style="margin: 0;">
												<label class="popup_label">Enter Parameter Name</label><br>
												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:220px !important;height: 30px;">
											</div>
											<div class="form-group col-md-8 test_percentage parameter_type_parent">
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Type</label>
													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">
														<option value=""></option>
														<?php
															$sql = mysql_query('select * from wc_parametertype') or die(mysql_error());
															$count = mysql_num_rows($sql);
															if ($count != '0') {
																while ($row = mysql_fetch_array($sql)) {
														?>
															<option value="<?php echo $row['parametertype_name']; ?>">
																<?php echo $row['parametertype_name']; ?>
															</option>
														<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Unit</label>
													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Format</label>
													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required">
														<option value="">Format</option>
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>
										</div><!-- end parameter_holder -->
										<input class="parameter_update" type="hidden" name="parameter_update" value="" />
										<input class="test_update_id" type="hidden" name="test_update_id" value="" />
										<div class="col-md-12 schedule_btn">
											<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
											<input type="submit" class="btn btn-primary align_right  clear" value="Save">
										</div>
									</form>
								</div>
							</div><!--state-content-->
			</div><!--test_div-->

							<div class="delete_div delete_test_div">
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
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
				      </tr>

				      <tr class="align_center delete_color">
				        <!-- <td class="test_id"><?php //echo $i; ?></td> -->
						<input type="hidden" value="<?php echo $eachrecord ['test_attribute_id']; ?>" id="test_attribute_id">

				       <!--  <td><?php //echo $eachrecord ['test_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_type']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_unit']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_format']; ?></td> -->

				        <td>Long Jump</td>
				        <td>Distance</td>
				        <td>MT</td>
				        <td>dfdf</td>

				        <td class="popup-edit">
				        	<span class="edit_state edit_test" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord ['test_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>"><i class="fa fa-trash-o"></i></span>
			        			<div class="test_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Detail</span>
					              	</div><!--edit_title-->
					          			<div class="container col-md-12">
						          			<div class="col-xs-12 col-md-12">
									<form id="test_updation_form" action="functions/test_functions.php" method="post">
										<!-- <div class="form-group">
											<label>Enter Test Name</label><br>
											<input type="text" class="adjust_width test_name_update" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required" >
										</div> -->
										<div class="parameter_holder">
											<div class="form-group" style="margin: 0;">
												<label class="popup_label">Enter Parameter Name</label><br>
												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:220px !important;height: 30px;">
											</div>
											<div class="form-group col-md-8 test_percentage parameter_type_parent">
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Type</label>
													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">
														<option value=""></option>
														<?php
															$sql = mysql_query('select * from wc_parametertype') or die(mysql_error());
															$count = mysql_num_rows($sql);
															if ($count != '0') {
																while ($row = mysql_fetch_array($sql)) {
														?>
															<option value="<?php echo $row['parametertype_name']; ?>">
																<?php echo $row['parametertype_name']; ?>
															</option>
														<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Unit</label>
													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Format</label>
													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required">
														<option value="">Format</option>
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>
										</div><!-- end parameter_holder -->
										<input class="parameter_update" type="hidden" name="parameter_update" value="" />
										<input class="test_update_id" type="hidden" name="test_update_id" value="" />
										<div class="col-md-12 schedule_btn">
											<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
											<input type="submit" class="btn btn-primary align_right  clear" value="Save">
										</div>
									</form>
								</div>
							</div><!--state-content-->
			</div><!--test_div-->

							<div class="delete_div delete_test_div">
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
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
				      </tr>
				      <tr class="align_center delete_color">
				        <!-- <td class="test_id"><?php //echo $i; ?></td> -->
						<input type="hidden" value="<?php echo $eachrecord ['test_attribute_id']; ?>" id="test_attribute_id">

				       <!--  <td><?php //echo $eachrecord ['test_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_type']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_unit']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_format']; ?></td> -->

				        <td>Long Jump</td>
				        <td>Distance</td>
				        <td>MT</td>
				        <td>dfdf</td>

				        <td class="popup-edit">
				        	<span class="edit_state edit_test" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord ['test_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>"><i class="fa fa-trash-o"></i></span>
			        			<div class="test_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Detail</span>
					              	</div><!--edit_title-->
					          			<div class="container col-md-12">
						          			<div class="col-xs-12 col-md-12">
									<form id="test_updation_form" action="functions/test_functions.php" method="post">
										<!-- <div class="form-group">
											<label>Enter Test Name</label><br>
											<input type="text" class="adjust_width test_name_update" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required" >
										</div> -->
										<div class="parameter_holder">
											<div class="form-group" style="margin: 0;">
												<label class="popup_label">Enter Parameter Name</label><br>
												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:220px !important;height: 30px;">
											</div>
											<div class="form-group col-md-8 test_percentage parameter_type_parent">
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Type</label>
													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">
														<option value=""></option>
														<?php
															$sql = mysql_query('select * from wc_parametertype') or die(mysql_error());
															$count = mysql_num_rows($sql);
															if ($count != '0') {
																while ($row = mysql_fetch_array($sql)) {
														?>
															<option value="<?php echo $row['parametertype_name']; ?>">
																<?php echo $row['parametertype_name']; ?>
															</option>
														<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Unit</label>
													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Format</label>
													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required">
														<option value="">Format</option>
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>
										</div><!-- end parameter_holder -->
										<input class="parameter_update" type="hidden" name="parameter_update" value="" />
										<input class="test_update_id" type="hidden" name="test_update_id" value="" />
										<div class="col-md-12 schedule_btn">
											<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
											<input type="submit" class="btn btn-primary align_right  clear" value="Save">
										</div>
									</form>
								</div>
							</div><!--state-content-->
			</div><!--test_div-->

							<div class="delete_div delete_test_div">
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
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
				      </tr>
				      <tr class="align_center delete_color">
				        <!-- <td class="test_id"><?php //echo $i; ?></td> -->
						<input type="hidden" value="<?php echo $eachrecord ['test_attribute_id']; ?>" id="test_attribute_id">

				       <!--  <td><?php //echo $eachrecord ['test_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_type']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_unit']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_format']; ?></td> -->

				        <td>Long Jump</td>
				        <td>Distance</td>
				        <td>MT</td>
				        <td>dfdf</td>

				        <td class="popup-edit">
				        	<span class="edit_state edit_test" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord ['test_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>"><i class="fa fa-trash-o"></i></span>
			        			<div class="test_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Detail</span>
					              	</div><!--edit_title-->
					          			<div class="container col-md-12">
						          			<div class="col-xs-12 col-md-12">
									<form id="test_updation_form" action="functions/test_functions.php" method="post">
										<!-- <div class="form-group">
											<label>Enter Test Name</label><br>
											<input type="text" class="adjust_width test_name_update" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required" >
										</div> -->
										<div class="parameter_holder">
											<div class="form-group" style="margin: 0;">
												<label class="popup_label">Enter Parameter Name</label><br>
												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:220px !important;height: 30px;">
											</div>
											<div class="form-group col-md-8 test_percentage parameter_type_parent">
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Type</label>
													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">
														<option value=""></option>
														<?php
															$sql = mysql_query('select * from wc_parametertype') or die(mysql_error());
															$count = mysql_num_rows($sql);
															if ($count != '0') {
																while ($row = mysql_fetch_array($sql)) {
														?>
															<option value="<?php echo $row['parametertype_name']; ?>">
																<?php echo $row['parametertype_name']; ?>
															</option>
														<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Unit</label>
													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Format</label>
													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required">
														<option value="">Format</option>
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>
										</div><!-- end parameter_holder -->
										<input class="parameter_update" type="hidden" name="parameter_update" value="" />
										<input class="test_update_id" type="hidden" name="test_update_id" value="" />
										<div class="col-md-12 schedule_btn">
											<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
											<input type="submit" class="btn btn-primary align_right  clear" value="Save">
										</div>
									</form>
								</div>
							</div><!--state-content-->
			</div><!--test_div-->

							<div class="delete_div delete_test_div">
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
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
				      </tr>
				      <tr class="align_center delete_color">
				        <!-- <td class="test_id"><?php //echo $i; ?></td> -->
						<input type="hidden" value="<?php echo $eachrecord ['test_attribute_id']; ?>" id="test_attribute_id">

				       <!--  <td><?php //echo $eachrecord ['test_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_type']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_unit']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_format']; ?></td> -->

				        <td>Long Jump</td>
				        <td>Distance</td>
				        <td>MT</td>
				        <td>dfdf</td>

				        <td class="popup-edit">
				        	<span class="edit_state edit_test" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord ['test_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>"><i class="fa fa-trash-o"></i></span>
			        			<div class="test_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Detail</span>
					              	</div><!--edit_title-->
					          			<div class="container col-md-12">
						          			<div class="col-xs-12 col-md-12">
									<form id="test_updation_form" action="functions/test_functions.php" method="post">
										<!-- <div class="form-group">
											<label>Enter Test Name</label><br>
											<input type="text" class="adjust_width test_name_update" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required" >
										</div> -->
										<div class="parameter_holder">
											<div class="form-group" style="margin: 0;">
												<label class="popup_label">Enter Parameter Name</label><br>
												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:220px !important;height: 30px;">
											</div>
											<div class="form-group col-md-8 test_percentage parameter_type_parent">
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Type</label>
													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">
														<option value=""></option>
														<?php
															$sql = mysql_query('select * from wc_parametertype') or die(mysql_error());
															$count = mysql_num_rows($sql);
															if ($count != '0') {
																while ($row = mysql_fetch_array($sql)) {
														?>
															<option value="<?php echo $row['parametertype_name']; ?>">
																<?php echo $row['parametertype_name']; ?>
															</option>
														<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Unit</label>
													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Format</label>
													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required">
														<option value="">Format</option>
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>
										</div><!-- end parameter_holder -->
										<input class="parameter_update" type="hidden" name="parameter_update" value="" />
										<input class="test_update_id" type="hidden" name="test_update_id" value="" />
										<div class="col-md-12 schedule_btn">
											<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
											<input type="submit" class="btn btn-primary align_right  clear" value="Save">
										</div>
									</form>
								</div>
							</div><!--state-content-->
			</div><!--test_div-->

							<div class="delete_div delete_test_div">
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
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
				      </tr>
				      <tr class="align_center delete_color">
				        <!-- <td class="test_id"><?php //echo $i; ?></td> -->
						<input type="hidden" value="<?php echo $eachrecord ['test_attribute_id']; ?>" id="test_attribute_id">

				       <!--  <td><?php //echo $eachrecord ['test_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_name']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_type']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_unit']; ?></td>
				        <td><?php //echo $eachrecord ['test_parameter_format']; ?></td> -->

				        <td>Long Jump</td>
				        <td>Distance</td>
				        <td>MT</td>
				        <td>dfdf</td>

				        <td class="popup-edit">
				        	<span class="edit_state edit_test" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord ['test_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>"><i class="fa fa-trash-o"></i></span>
			        			<div class="test_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Detail</span>
					              	</div><!--edit_title-->
					          			<div class="container col-md-12">
						          			<div class="col-xs-12 col-md-12">
									<form id="test_updation_form" action="functions/test_functions.php" method="post">
										<!-- <div class="form-group">
											<label>Enter Test Name</label><br>
											<input type="text" class="adjust_width test_name_update" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required" >
										</div> -->
										<div class="parameter_holder">
											<div class="form-group" style="margin: 0;">
												<label class="popup_label">Enter Parameter Name</label><br>
												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" style="width:220px !important;height: 30px;">
											</div>
											<div class="form-group col-md-8 test_percentage parameter_type_parent">
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Type</label>
													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">
														<option value=""></option>
														<?php
															$sql = mysql_query('select * from wc_parametertype') or die(mysql_error());
															$count = mysql_num_rows($sql);
															if ($count != '0') {
																while ($row = mysql_fetch_array($sql)) {
														?>
															<option value="<?php echo $row['parametertype_name']; ?>">
																<?php echo $row['parametertype_name']; ?>
															</option>
														<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Unit</label>
													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">
													</select>
												</div>
												<div class="col-md-12" style="padding: 0;">
													<label class="popup_label">Format</label>
													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please Select the Format" data-validation="required">
														<option value="">Format</option>
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>
										</div><!-- end parameter_holder -->
										<input class="parameter_update" type="hidden" name="parameter_update" value="" />
										<input class="test_update_id" type="hidden" name="test_update_id" value="" />
										<div class="col-md-12 schedule_btn">
											<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear" maxlength="50"> -->
											<input type="submit" class="btn btn-primary align_right  clear" value="Save">
										</div>
									</form>
								</div>
							</div><!--state-content-->
			</div><!--test_div-->

							<div class="delete_div delete_test_div">
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
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
				      </tr>

				      <!-- <?php //$i++;} ?> -->
				    </tbody>
				  </table>
				</div>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->
<!-- <div class="popup_fade cancel_btn"></div> -->

<?php require_once "footer.php" ?>
