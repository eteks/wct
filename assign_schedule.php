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
if(isset($_GET['update_success'])){
	echo '<script>alert("Assign schedule update successfully");location.reload();</script>';
}
?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">ASSIGN SCHEDULE</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form method="post" id="assignschedule_form">
					<div class="form-group">
						  <label for="sel1">Select Schedule Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Schedule" data-validation-error-msg="Please Select Name of the Schedule" data-validation="required">
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
						  <select class="form-control adjust_width classic" id="sel1" name="category" data-validation-error-msg="Please Select Category of the Schedule" data-validation="required">
							  <?php
						 		$data = $category->categoryselectfunction();
						 		foreach( $data as $eachrecord ) {
						  	  ?>
						  		<option value="<?php echo $eachrecord ['categories_id']; ?>"><?php echo $eachrecord ['categories_name']; ?></option>
						  	  <?php } ?>
						  </select>
					</div>
					<label for="athlete" class="email_txt">Add Athletes</label><br>
					<div class="assign_content_holder">
						<div class="assign_clone_content">
							<div class="form-group">

								<select class="form-control name_align fl athlete_name athlete_name1" placeholder="Name" name="athlete_name1" id="combobox" data-validation-error-msg="Please Select Athlete" data-validation="required">
									<option value="">Athletes</option>
									<?php
										$data = $athlete->athleteSelect();
										foreach( $data as $eachrecord ) {
								 	?>
										<option value="<?php echo $eachrecord ['athlete_id']; ?>"><?php echo $eachrecord ['athlete_name']; ?></option>
									<?php } ?>
								</select>
						      	<!-- <input type="text" class="form-control name_align fl athlete_name" id="name" placeholder="Name" name="athlete_name1" required> -->
						      	<input type="text" class="form-control date_assign fl athlete_date dob" id="dob" placeholder="Date" name="athlete_date1" data-validation-error-msg="Please Enter the Date" data-validation="required">
						    </div>
						    <div class="form-group col-md-11">
						      	<input type="text" class="form-control name_align fl athlete_mobile mobile" id="mobile" placeholder="Mobile no" name="athlete_mobile1" data-validation-error-msg="Please Enter the Mobile Number" data-validation="required">
						      	<input type="text" class="form-control date_assign fl athlete_bib" id="bib" placeholder="BIB NO" name="athlete_bib1" data-validation-error-msg="Please Enter the BIB NO" data-validation="required">
						    </div>
						</div>
					</div>
					<input type="button" class="btn btn-primary align_right adds_btn add_athelete" value="Add"><i class="fa fa-plus add_align"></i>
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary align_right clear assignschedule_submit" value="Submit">
						<input type="button" class="btn btn-primary align_right clear" value="Clear">
					</div>
				</form>
			</div>
			<div class="container">
			  <table class="table state_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">SLNO</th>
			        <th class="align_center">Schedule Name</th>
			        <!-- <th class="align_center">Category Name</th>
			        <th class="align_center">Athletes Name</th>
			        <th class="align_center">BIB NO</th> -->
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
					<?php
					$data = $assignschedule->assignscheduleSelect();
					foreach( $data as $eachrecord ) {
					 ?>
			      <tr class="align_center delete_color">
			        <td><?php echo $eachrecord ['assignschedule_id']; ?></td>
			        <td><?php echo $eachrecord ['createschedule_name']; ?></td>
			        <td>
			        	<span class="edit_state edit_assign_schedule" data-value="<?php echo $eachrecord ['createschedule_id']; ?>">Edit</span>
		        		<span class="delete_state" data-value="<?php echo $eachrecord ['assignschedule_id']; ?>">Delete</span>
			        </td>
			      </tr>
				   <?php } ?>
			    </tbody>
			  </table>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->

<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="range_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">
	          			<div class="col-xs-12 col-md-12 align_margin">
				<form id="edit_assign_schedule_form" action="functions/assign_schedule_function.php" method="post">
					<div class="form-group">
						  <label for="sel1">Select Schedule Name</label>
						  <!-- <select class="form-control adjust_width classic schedule_update" id="sel1" name="Schedule" data-validation-error-msg="Please Select Name of the Schedule" data-validation="required" disabled>
							  <?php
								// $data = $createschedule->createscheduleselectfunction();
								 //foreach( $data as $eachrecord ) {
								  ?>
								  <option value="<?php echo $eachrecord ['createschedule_id']; ?>"><?php echo $eachrecord ['createschedule_name']; ?></option>
							   <?php //} ?>
						  </select> -->
						  <input type="text" class="form-control adjust_width classic schedule_update" name="Schedule" data-validation-error-msg="Please Select Name of the Schedule" data-validation="required" disabled />
					</div>
					<div class="form-group">
						  <label for="sel1">Select Category Name</label>
						  <select class="form-control adjust_width classic category_update" id="sel1" name="category" data-validation-error-msg="Please Select Category of the Schedule" data-validation="required">
							  <?php
   							 $data = $category->categoryselectfunction();
   							 foreach( $data as $eachrecord ) {
   						   ?>
   							 <option value="<?php echo $eachrecord ['categories_id']; ?>"><?php echo $eachrecord ['categories_name']; ?></option>
   						   <?php } ?>
						  </select>
					</div>
					<label for="athlete" class="email_txt">Add Athletes</label><br>
					<div class="clone_schedule_update_content">
						<div class="clone_schedule_update">
							<div class="form-group">
								<select class="form-control name_align fl athlete_name athlete_name_update athlete_name1" id="combobox1" placeholder="Name" name="athlete_name1" id="combobox" data-validation-error-msg="Please Select Athlete" data-validation="required">
									<option value="">Athletes</option>
									<?php
										$data = $athlete->athleteSelect();
										foreach( $data as $eachrecord ) {
									?>
										<option value="<?php echo $eachrecord ['athlete_id']; ?>"><?php echo $eachrecord ['athlete_name']; ?></option>
									<?php } ?>
								</select>
						      	<!-- <input type="text" class="form-control schedule-name fl" id="name" placeholder="Name" name="name" data-validation-error-msg="Please Enter the name of the Athelete" data-validation="required"> -->
						      	<input type="text" class="form-control bib_popup fl dob_update dob" id="name" placeholder="Date" disabled>
						    </div>
						    <div class="form-group">
						      	<input type="text" class="form-control schedule-name fl mobile_update mobile" id="name" placeholder="Mobile no" disabled>
						      	<input type="text" class="form-control bib_popup athlete_bib fl bib_update" id="name" placeholder="BIB NO" name="athlete_bib1" data-validation-error-msg="Please Enter the BIBO NO" data-validation="required">
								<input type="hidden" class="assing_schedule_update_id" name="assing_schedule_update_id1" value="" />
						    </div>
						</div>
					</div>
					<input type="hidden" name="assing_schedule_update" value="1" />

					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="button" class="btn btn-primary align_right clear" value="Clear">
					</div>
				</form>
			</div>
					</div><!--state-content-->
			</div><!--range_div-->
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
