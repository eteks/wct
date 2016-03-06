<?php
require_once "session.php";
require_once "functions/category_function.php";
require_once "functions/create_schedule_function.php";
require_once "functions/assign_schedule_function.php";
require_once "header.php";
require_once "functions/athletes_functions.php";


$category = new categoryfunction();
$createschedule = new createscheduleFunction();
$assignschedule = new assignschedulefunction();
$athlete = new athletesFunction();
?>
<?php
$url = $_SERVER['PHP_SELF'];
if(isset($_GET['update_success'])){
	echo "<script>alert('Assign schedule update successfully');var url ='".$url."'; window.location = url ;</script>";
}
?>
<style>
	#ui-id-1{
    	width: 204px !important;
	}
</style>
<div class="container">
	<div class="container left_align_parameter align_height">
		<span class="sports">ASSIGN SCHEDULE</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-11">
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-7 align_margin">
				<form method="post" id="assignschedule_form">
					<div class="form-group">
						  <label for="sel1">Select Schedule Name</label>
						  <select class="form-control adjust_width classic assignsche_create" id="sel1" name="Schedule" data-validation-error-msg="Please Select Name of the Schedule" data-validation="required">
							 <option value="">Select Schedule Name</option>
							 <?php
		   						 $data = $createschedule->createscheduleselectfunction();
		   						 foreach( $data as $eachrecord ) {
		   						  ?>
		   						  <option value="<?php echo $eachrecord ['createschedule_id']; ?>"><?php echo $eachrecord ['createschedule_name']; ?></option>
		   					   <?php } ?>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Category Name</label>
						  <select class="form-control adjust_width classic assignsche_cate" id="sel1" name="category" data-validation-error-msg="Please Select Category of the Schedule" data-validation="required">
							<option value="">Select Category Name</option>
						  </select>
					</div>
					<label for="athlete">Add Athletes</label><br>
					<div class="assign_content_holder col-md-11">
						<div class="assign_clone_content">
							<div class="form-group col-md-12">
								<div class="col-md-6 form-group combo--align">
									<select class="form-control name_align  athlete_name athlete_name1" placeholder="Name" name="athlete_name1" id="combobox" data-validation-error-msg="Please Select Athlete" data-validation="required">
										<option value="">Athletes</option>
										<?php
											$data = $athlete->athleteSelect1();
											foreach( $data as $eachrecord ) {
									 	?>
											<option value="<?php echo $eachrecord ['athlete_id']; ?>"><?php echo $eachrecord ['athlete_name']; ?></option>
										<?php } ?>
									</select>
								</div>
						      	<!-- <input type="text" class="form-control name_align fl athlete_name" id="name" placeholder="Name" name="athlete_name1" required> -->
						      	<div class="form-group col-md-6">
						      		<input type="text" class="form-control date_assign dob" id="dob" placeholder="Date" name="athlete_date1" disabled>
						   		</div>
						    </div>
						    <div class="form-group col-md-12">
						    	<div class="form-group col-md-6">
						      		<input type="text" class="form-control name_align athlete_mobile mobile" id="mobile" placeholder="Mobile no" name="athlete_mobile1" disabled>
						      	</div>
						      	<div class="form-group col-md-6">
						      		<input type="text" class="form-control date_assign athlete_bib" id="bib" placeholder="BIB NO" name="athlete_bib1" data-validation-error-msg="Please Enter the BIB NO" data-validation="number">
								</div>
						    </div>
						</div>
					</div>
					<div class="form-group assign-add-button col-md-3">
						<!-- <input type="submit" class="btn btn-primary align_right adds_btn add_athelete" value="Add"> -->
						<!-- <i class="fa fa-plus add_align"></i> -->
						<i class="fa fa-plus plus_align add_athelete">
							<div class="tooltip_parameter">Add</div>
							<div class="tip_triangle"></div>
						</i>
						<i class="fa fa-minus assign_remove">
							<div class="tooltip_remove">Remove</div>
							<div class="tip_triangle"></div>
						</i>
					</div>
					<div class="col-md-9 schedule_btn">
						<input type="reset" class="btn btn-primary clear" value="Cancel">
						<input type="submit" class="btn btn-primary test-submit clear assignschedule_submit" value="Submit">
					</div>
				</form>
			</div>
			<div class="container table-position align_bottom">
			  <table class="table state_table">
			    <thead>
			      <tr class="row_color">
			        <th>Schedule Name</th>
			        <!-- <th class="align_center">Category Name</th>
			        <th class="align_center">Athletes Name</th>
			        <th class="align_center">BIB NO</th> -->
			        <th style="text-align:right;">Action</th>
			      </tr>
			    </thead>
			    <tbody>
					<?php
					$data = $assignschedule->assignscheduleSelect();
					$i=1;
					foreach( $data as $eachrecord ) {
					 ?>
			      <tr class="delete_color">
			      	<input value="<?php echo $eachrecord ['assignschedule_id']; ?>" type="hidden">
			       <!-- <td><?php echo $i; ?></td> -->
			        <td><?php echo $eachrecord ['createschedule_name']; ?></td>
			        <td class="popup-edit">
			        	<span class="edit_state edit_assign_schedule" data-schedule="<?php echo $eachrecord ['createschedule_id']; ?>" data-category="<?php echo $eachrecord ['assigncategory_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
		        		<span class="delete_state" data-value="<?php echo $eachrecord ['assignschedule_id']; ?>"><i class="fa fa-trash-o"></i></span>
						<div class="assign-schedule-popup popup_hidden">
			          		<code class="close_btn cancel_btn"> </code>
			          		<div class="edit_title">
			                	<span class="del_txt">Edit detail</span>
			              	</div><!--edit_title-->
			          			<div class="container state-content col-md-12 assign-scroll">
				          			<div class="col-xs-12 col-md-12 align_margin">
							<form id="edit_assign_schedule_form" action="functions/assign_schedule_function.php" method="post">
								<div class="form-group">
									  <label for="sel1" class="popup_label">Select Schedule Name</label>
									  <input type="text" class="form-control adjust_width classic schedule_update box-width" name="Schedule" data-validation-error-msg="Please Select Name of the Schedule" data-validation="required" disabled />
								</div>
								<div class="form-group">
									  <label for="sel1" class="popup_label">Select Category Name</label>
									  <select class="form-control adjust_width classic category_update box-width" id="sel1" name="category" data-validation-error-msg="Please Select Category of the Schedule" data-validation="required">
										<option value="">Select Category Name</option>
										<?php
			   							 $data = $category->categoryselectfunction();
			   							 foreach( $data as $eachrecord ) {
			   						   ?>
			   							 <option value="<?php echo $eachrecord ['categories_id']; ?>"><?php echo $eachrecord ['categories_name']; ?></option>
			   						   <?php } ?>
									  </select>
								</div>
								<label for="athlete" class="email_txt popup_label">Add Athletes</label><br>
								<div class="clone_schedule_update_content col-md-12">
									<div class="clone_schedule_update">
										<div class="form-group col-md-12">
											<div class="col-md-12 combo--align--popup align_atheletes_schedules">
												<select class="form-control name_align_popup fl box-width athlete_name athlete_name_update athlete_name1" id="combobox1" placeholder="Name" name="athlete_name1" id="combobox" data-validation-error-msg="Please Select Athlete" data-validation="required">
													<option value="">Athletes</option>
													<?php
														$data = $athlete->athleteSelect1();
														foreach( $data as $eachrecord ) {
													?>
														<option value="<?php echo $eachrecord ['athlete_id']; ?>"><?php echo $eachrecord ['athlete_name']; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-12">
									      		<!-- <input type="text" class="form-control schedule-name fl" id="name" placeholder="Name" name="name" data-validation-error-msg="Please Enter the name of the Athelete" data-validation="required"> -->
									      		<input type="text" class="form-control bib_popup fl dob_update dob" id="name" placeholder="Date" disabled>
									    	</div>
									    </div>
									    <div class="form-group col-md-12">
									    	<div class="col-md-12">
									      		<input type="text" class="form-control schedule-name fl mobile_update mobile" id="name" placeholder="Mobile no" disabled>
									      	</div>
									      	<div class="col-md-12">
									      		<input type="text" class="form-control bib_popup athlete_bib popup_bib fl bib_update" id="name" placeholder="BIB NO" name="athlete_bib1" data-validation-error-msg="Please Enter the BIBO NO" data-validation="number">
											</div>
											<input type="hidden" class="assing_schedule_update_id" name="assing_schedule_update_id1" value="" />
									    </div>
									</div>
								</div>
								<input type="hidden" name="assing_schedule_update" value="1" />

								<div class="col-md-10 schedule_btn">
									<!-- <input type="reset" value="Clear" class="btn btn-primary align_right clear reset_form"> -->
			  					<input type="submit" value="Save" class="btn btn-primary align_right test-submit clear">
								</div>
							</form>
						</div>
								</div><!--state-content-->
						</div><!--range_div-->
						<div class="delete_div delete_catagory_div">
				          <!--  <code class="close_btn cancel_btn"> </code> -->
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
				   <?php $i++;} ?>
			    </tbody>
			  </table>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->

<!--<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<!--<div class="container">

		</div><!--container-->
		<script type="text/javascript">
		$(document).ready(function() {
			$("#combobox").combobox({
        		select: function (event, ui) {
            		var ath_id = $(this).val();
					$.ajax({
			           type: "POST",
			           url: "functions/athletes_functions.php?get_ath=true",
			           data: {'ath_id':ath_id},
			           cache: false,
					   dataType:'json',
			           success: function(html) {
							$('.assign_content_holder .assign_clone_content:first').find('.dob').val(html.athlete_dob).attr('disabled', 'disabled');
							$('.assign_content_holder .assign_clone_content:first').find('.mobile').val(html.athlete_mobile).attr('disabled', 'disabled');
			           }
			       });
        		}
    		});
			$("#combobox1").combobox({
        		select: function (event, ui) {
            		var ath_id = $(this).val();
					$.ajax({
			           type: "POST",
			           url: "functions/athletes_functions.php?get_ath=true",
			           data: {'ath_id':ath_id},
			           cache: false,
					   dataType:'json',
			           success: function(html) {

							$('.clone_schedule_update_content .clone_schedule_update:first').find('.dob').val(html.athlete_dob);
							$('.clone_schedule_update_content .clone_schedule_update:first').find('.mobile').val(html.athlete_mobile);
			           }
			       });
        		}
    		});
		});

		</script>
<?php require_once "footer.php" ?>
