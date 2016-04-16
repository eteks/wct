<?php
require_once "session.php";
require_once "header.php";
require_once "functions/test_functions.php";
$obj = new testfunction();
?>
<?php
$url = $_SERVER['PHP_SELF'];
if (isset($_GET['insert'])) {
	echo "<script>
	$(document).ready(function () {
		success_align();
		$('.success_msg span').html('Test inserted successfully!');
 	    $('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
        $('.success_msg').show();
        $('.popup_fade').show();
        document.body.style.overflow = 'hidden';
    	// alert('Test inserted successfully!');
    	});
	  	
    	var url ='" . $url . "'; window.location = url ;</script>";
}
if (isset($_GET['update'])) {
	echo "<script>
	$(document).ready(function () {
		success_align();
		$('.success_msg span').html('Test Parameter edited successfully!');
       	$('.success_msg').show();
      	$('.popup_fade').show();
      	document.body.style.overflow = 'hidden';
      	$('.success_msg span').html('Test Parameter edited successfully!');
		if($('.success_msg input').hasClass('alert_btn_without_refresh')){
       		$('.success_msg input').removeClass('alert_btn_without_refresh').addClass('alert_btn');
       	}
        $('.success_msg').show();
        $('.popup_fade').show();
        document.body.style.overflow = 'hidden';
    	});
	    //alert('Test parameter edited successfully!');
	    var url ='" . $url . "'; window.location = url ;</script>";
}
if (isset($_GET['param_name_exists'])) {
	echo "<script>
	$(document).ready(function () {
		success_align();
		$('.success_msg span').html('Already exists!');
		$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
       	$('.success_msg').show();
      	$('.popup_fade').show();
      	document.body.style.overflow = 'hidden';
    	});
	    //alert('Test parameter edited successfully!');
	    var url ='" . $url . "'; window.location = url ;</script>";
}
if (isset($_GET['insert_new'])) {
	if ($_GET['params'] != '') {
		echo "<script>
		$(document).ready(function () {
		success_align();
		$('.success_msg span').html('" . $_GET['params'] . "Parameter already exist!');
		$('.success_msg input').removeClass('alert_btn').addClass('alert_btn_without_refresh');
       	$('.success_msg').show();
      	$('.popup_fade').show();
      	document.body.style.overflow = 'hidden';
    	});
		//alert('" . $_GET['params'] . "Parameter already exist!');
		var url ='" . $url . "'; 
		window.location = url ;
		</script>";
	} else {
		echo "<script>
		$(document).ready(function () {
		success_align();
		$('.success_msg span').html('Test Parameter edited successfully!');
       	$('.success_msg').show();
      	$('.popup_fade').show();
      	document.body.style.overflow = 'hidden';
    	});
		//alert(' Test Parameter edited successfully!');
		var url ='" . $url . "'; 
		window.location = url ;
		</script>";
	}

}
?>
<style type="text/css">
	thead, tbody tr {
		display: table;
		width: 100%;
		table-layout: fixed;
	}
	.table > tbody tr:last-child {
		border: 0 none !important;
	}
	.table > thead {
		border-bottom: 0 none !important;
	}
	tbody tr {
		border-left: 0 none !important;
		border-right: 0 none !important;
	}
	.paging-nav {
		display: none;
	}
</style>
<div class="container">
	<div class="container left_align_parameter align_height">
		<span class="sports">TEST</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-12">
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-12 align_margin">
				<form id="test_form" name="test_form_act" action="functions/test_functions.php" method="post">
					<div class="form-group">
						<label>Enter name of Test</label><br>
						<input type="text" class="adjust_width" name="test_name" autocomplete="off">
						<span class="category_text">Please enter name of Test</span>
					</div>
					<div class="parameter_holder1">
						<div class="clone_content" id="param_counter1">
							<div class="form-group col-md-11 schedule_test">
							<div class="form-group col-md-5">
								<label>Enter Test Parameters</label><br>
								<input type="text" class="adjust_width parameter_name" name="parameter_name1" autocomplete="off">
								<span class="hided param_name_error">Please enter Parameter Name</span>
								<input type="hidden" class="parameter_count" value="1" />
							</div>

							<div class="form-group col-md-3 align-area">
									<label>Type</label><br>
									<select class="form-control classic type_align fl parameter_type parameter_type_add" id="type" name="type1">
										<option value="">
											Type
										</option>
										<?php
											$sql = mysql_query('select * from wc_parametertype order by parametertype_name ASC') or die(mysql_error());
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
									<span class="hided param_type_error">Please select Parameter Type</span>
								</div>
								<div class="form-group col-md-3 align-area">
									<label>Unit</label><br>
									<select class="form-control classic type_align fl parameter_unit paremeter_unit_add" id="unit" name="unit1">
									<option value="">Unit</option>
									</select>
									<span class="hided param_unit_error">Please select Parameter Unit</span>
								</div>
								<div class="form-group col-md-3 align-area">
									<label>Format</label><br>
									<select class="form-control classic type_align fl parameter_format" id="format" name="format1">
										<option value="">Format</option>
									</select>
									<span class="hided param_format_error">Please select Parameter Format</span>
								</div>


							</div>
						</div>
					</div>
					<div class="form-group parameter__align col-md-1 padding_zero">
						<!-- <input type="button" class="btn btn-primary align_right parameter_btn"> -->
						<button class="plus_align parameter_btn parameter_add">
							<i class="fa fa-plus">
								<div class="tooltip_parameter">Add Parameter</div>
								<div class="tip_triangle"></div>
							</i>
						</button>
						<button class="plus_align parameter_remove">
							<i class="fa fa-minus">
								<div class="tooltip_remove">Remove Parameter</div>
								<div class="tip_triangle"></div>
							</i>
						</button>
					</div>

					<input type="hidden" name="test_add" value="1">
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary clear test-submit test_submit_act" value="Save">
						<input type="reset" value="Cancel" class="btn btn-primary clear reset_form" maxlength="50">
					</div>
				</form>
			</div>
			<div class="col-md-12 align_bottom">
				<div class="col-md-3 search_part" style="padding: 0px;">
					<div class="test_title">
						<span>Test Name</span>
					</div><!--test_title-->
					<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box test_search" placeholder="Search Name">
								<i class="fa fa-search font-search"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
									$data = $obj->testnamefunction();
									foreach( $data as $eachrecord ) {
									 ?>
									<span class="test-name test-test-name">
										<input type="checkbox" name="test " value="test" class="check_test test_name_hover_check" id="check-select" data-id ="<?php echo $eachrecord['test_id']; ?>">
										<input type="text" name="test"  value="<?php echo $eachrecord['test_name']; ?>" class="list_edit test_name_hover test_name_value input_wrap" disabled>
										<span class="test-alter">
											<?php
											$query = mysql_query("select * from wc_testbattery_test_attribute where testbattery_test_id = '".$eachrecord['test_id']."'");
											$query1 = mysql_query("select * from wc_range where rangetest_id = '".$eachrecord['test_id']."'");
											$query2 = mysql_query("select * from wc_result where resulttest_name = '".$eachrecord['test_name']."'");
											if(!mysql_num_rows($query) && !mysql_num_rows($query1)&&!mysql_num_rows($query2)){
											 ?>
											<i class="fa fa-floppy-o save_item edit_save_button"></i>
											<i class="fa fa-pencil-square-o edit_item "></i>
											<i class="fa fa-trash-o delete_item"></i>
											<?php } else {?>
												<i class="fa fa-floppy-o save_item edit_save_button"></i>
												<i class="fa fa-pencil-square-o side_restrict "><div class="side_restrict_tooltip">Mapping has been already done.<br/>Edit or Delete not possible.</div></i>
												<i class="fa fa-trash-o side_restrict"></i>
											<?php } ?>
										</span><!--test-alter-->
									</span><!--test-name-->
									<div class="delete_div delete_search">
							            <code class="close_btn cancel_btn"> </code>
							              <div class="del_title">
							                <span class="del_txt">DELETE</span>
							              </div>
							              <div class="del_content">
							                <span class="del_content_txt">Are you sure want to delete this whole record?</span>
							                <input type="button" class="btn btn-primary center_align yes_btn" data-id ="<?php echo $eachrecord['test_id']; ?>" value="Yes" data-delete='test_name'>
							                <input type="button" class="btn btn-primary center_align no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
										</div><!--del_content-->
      								</div><!--delete_div -->
									<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
					</form>
				</div><!--search_part-->
				<div class="container table-position col-md-9" style="padding: 0px;">
				  <table class="table test_table1" id="test_table">
				     <thead>
			            <tr class="row_color">
					      		<th class="align_center">Parameter Name</th>
					        	<th class="align_center">Type</th>
					        	<th class="align_center">Unit</th>
					        	<th class="align_center">Format</th>
					        	<th class="action_align">Action</th>
				        	</tr>
			        </thead>
				    <tbody style="display:block;height:260px;overflow:auto;">
					<?php
					$data = $obj->testselectfunction();
					foreach( $data as $eachrecord ) {
					 ?>
				      <tr class="align_center delete_color test_attr_table" data-id ="<?php echo $eachrecord['test_id']; ?>">
				      	
						<input type="hidden" value="<?php echo $eachrecord['test_attribute_id']; ?>" id="test_attribute_id" class="test_attributs">
						<input type="hidden" value="<?php echo $eachrecord['test_id']; ?>">
				        <td><?php echo $eachrecord['test_parameter_name']; ?></td>
				        <td><?php echo $eachrecord['test_parameter_type']; ?></td>
				        <td><?php echo $eachrecord['test_parameter_unit']; ?></td>
				        <td><?php echo $eachrecord['test_parameter_format']; ?></td>
				        <td class="popup-edit">
				        	<?php
							$valid = mysql_query("select * from wc_testbattery_test_attribute where testbattery_test_id = '".$eachrecord['test_id']."'");
							$valid1 = mysql_query("select * from wc_range where rangetest_id = '".$eachrecord['test_id']."'");
							if(!mysql_num_rows($valid) && !mysql_num_rows($valid1)){
							 ?>
				        	<span class="edit_state new_editstate edit_test" data-value="<?php echo $eachrecord['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord['test_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord['test_attribute_id']; ?>"><i class="fa fa-trash-o"></i></span>
			        		<?php }else{?>
				    		<span class="restrict">
				    			<i class="fa fa-pencil-square-o">
					    			<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>
								</i>
							</span>
					    	<span class="restrict_del"><i class="fa fa-trash-o"><div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div></i></span>
					    	<?php } ?>
			        			<div class="test_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Test</span>
					              	</div>
					          			<div class="container col-md-12">
						          			<div class="col-md-12">
									<form id="test_updation_form" action="functions/test_functions.php" method="post">
										<div class="parameter_holder">
											<div class="form-group" style="padding: 0;">
												<label class="popup_label">Enter Parameter Name</label>
												<input type="text" class="adjust_width test_parameter_name_update" name="parameter_name1" data-validation-error-msg="Please enter the Parameter Name" data-validation="required" style="width:490px !important;height: 30px;">

											</div>
											<div class="form-group col-md-12 test_percentage parameter_type_parent">
												<div class="form-group col-md-4" style="padding: 0;">
													<label class="popup_label">Type</label>
													<select class="form-control classic type_align_popup fl parameter_type parameter_type_update" id="type1" name="type1" data-validation-error-msg="Please select the Type" data-validation="required">
														<option value="">Type</option>
														<?php
															$sql = mysql_query('select * from wc_parametertype order by parametertype_name ASC') or die(mysql_error());
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
												<div class="form-group col-md-4" style="padding: 0;">
													<label class="popup_label">Unit</label>
													<select class="form-control classic type_align_popup fl parameter_unit parameter_unit_update" id="unit1" name="unit1" data-validation-error-msg="Please select the Unit" data-validation="required">
													</select>
												</div>
												<div class="form-group col-md-4" style="padding: 0;">
													<label class="popup_label">Format</label>
													<select class="form-control classic type_align_popup fl parameter_format parameter_format_update" id="format1" name="format1" data-validation-error-msg="Please select the Format" data-validation="required">
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
										</div>
										<input class="parameter_update" type="hidden" name="parameter_update" value="" />
										<input class="test_update_id" type="hidden" name="test_update_id" value="" />
										<div class="col-md-12 schedule_btn"  style="white-space: nowrap;">
											<input type="submit" class="btn btn-primary clear" value="Save">
											<input type="reset" value="Cancel" class="btn btn-primary clear reset_form" maxlength="50">
										</div>
									</form>
								</div>
							</div>
						</div>
							<div class="delete_div delete_test_div">
						              <div class="del_title">
						                <span class="del_txt">DELETE</span>
						              </div>
						              <div class="del_content">
						                <span class="del_content_txt">Are you sure you want to delete this record?</span>
						                <input type="button" class="btn btn-primary align_right no_btn" value="No">
						                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete='test_attribute' data-id ="<?php echo $eachrecord['test_attribute_id']; ?>" data-test-id="<?php echo $eachrecord['test_id']; ?>">
						               	<input type="hidden" name="delete_id" value="" id="delete_id"/>
						              </div>
  								</div>
				        </td>
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord['test_attribute_id']; ?>" />
				      </tr>
				      <?php
					}
 ?>
				    </tbody>
				  </table>
				</div>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->
<!-- <div class="popup_fade cancel_btn"></div> -->

<?php require_once "footer.php" ?>
