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
	<div class="container align_center align_height">
		<span class="sports">TEST</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form id="test_form" action="functions/test_functions.php" method="post">
					<div class="form-group">
						<label>Enter Test Name</label><br>
						<input type="text" class="adjust_width" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required">
					</div>
					<div class="parameter_holder1">
						<div class="clone_content" id="param_counter1">
							<div class="form-group col-md-12 schedule_btn">
								<label>Enter Parameter Name</label><br>
								<input type="text" class="adjust_width parameter_name" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required">
								<input type="hidden" class="parameter_count" value="1" />
								<span class="hided param_name_error">Please Enter the parameter name</span>
							</div>
							<div class="form-group parameter_type_parent">
								<div class="form-group col-md-3">
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
								<div class="form-group col-md-3">
									<select class="form-control classic type_align fl parameter_unit" id="unit" name="unit1" data-validation-error-msg="Please Select the Unit of the Parameter" data-validation="required">
									<option value="">Unit</option>
									</select>
									<span class="hided param_unit_error">Please Select the unit</span>
								</div>
								<div class="form-group col-md-3">
									<select class="form-control classic type_align fl parameter_format" id="format" name="format1" data-validation-error-msg="Please Select the Format of the Parameter" data-validation="required">
										<option value="">Format</option>
									</select>
									<span class="hided param_format_error">Please Select the format</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group parameter__align col-md-3">
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
					<input type="hidden" name="test_add" value="1">
					<div class="col-md-9 schedule_btn">
						<input type="reset" value="Cancel" class="btn btn-primary align_right clear" maxlength="50">
						<input type="submit" class="btn btn-primary align_right clear test-submit test_submit_act" value="Submit">
					</div>
				</form>
			</div>
			<div class="container table-position">
			  <table class="table test_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">SLNO</th>
			        <th class="align_center">Test Name</th>
			        <th class="align_center">Parameter Name</th>
			        <th class="align_center">Type</th>
			        <th class="align_center">Unit</th>
			        <th class="align_center">Format</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
				<?php
				$data = $obj->testselectfunction();
				$i=1;
				foreach( $data as $eachrecord ) {
				 ?>
			      <tr class="align_center delete_color">
			        <td class="test_id"><?php echo $i; ?></td>
					<input type="hidden" value="<?php echo $eachrecord ['test_attribute_id']; ?>" id="test_attribute_id">
			        <td><?php echo $eachrecord ['test_name']; ?></td>
			        <td><?php echo $eachrecord ['test_parameter_name']; ?></td>
			        <td><?php echo $eachrecord ['test_parameter_type']; ?></td>
			        <td><?php echo $eachrecord ['test_parameter_unit']; ?></td>
			        <td><?php echo $eachrecord ['test_parameter_format']; ?></td>
			        <td>
			        	<span class="edit_state edit_test" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord ['test_id']; ?>">Edit</span>
		        		<span class="delete_state" data-value="<?php echo $eachrecord ['test_attribute_id']; ?>">Delete</span>
			        </td>
					<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
			      </tr>
			      <?php $i++;} ?>
			    </tbody>
			  </table>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->
<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="test_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content test-scroll col-md-12">
	          			<div class="col-xs-12 col-md-12 align_margin">
				<form id="test_updation_form" action="functions/test_functions.php" method="post">
					<div class="form-group">
						<label>Enter Test Name</label><br>
						<input type="text" class="adjust_width test_name_update" name="test_name" data-validation-error-msg="Please Enter the Test Name" data-validation="required" >
					</div>
					<div class="parameter_holder">
						<div class="form-group">
							<label>Enter Parameter Name</label><br>
							<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please Enter the Parameter Name" data-validation="required" >
						</div>
						<div class="form-group col-md-12 test_percentage parameter_type_parent">
							<div class="col-md-4">
								<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please Select the Type" data-validation="required">
									<option value="">Type</option>
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
							<div class="col-md-4">
								<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please Select the Unit" data-validation="required">
								</select>
							</div>
							<div class="col-md-4">
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
					<div class="col-md-10 schedule_btn">
						<input type="reset" value="Cancel" class="btn btn-primary align_right clear" maxlength="50">
						<input type="submit" class="btn btn-primary align_right test-submit clear" value="Submit">
					</div>
				</form>
			</div>
					</div><!--state-content-->
			</div><!--test_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>
