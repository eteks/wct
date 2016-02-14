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
						  <select class="form-control adjust_width classic" id="sel1" name="Schedule">
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
						  <select class="form-control adjust_width classic" id="sel1" name="category">
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
								<select class="form-control name_align fl athlete_name" placeholder="Name" name="athlete_name1" id="combobox" required>
									<option>

									</option>
									<?php
										$data = $athlete->athleteSelect();
										foreach( $data as $eachrecord ) {
								 	?>
										<option value="<?php echo $eachrecord ['athlete_id']; ?>"><?php echo $eachrecord ['athlete_name']; ?></option>
									<?php } ?>
								</select>
						      	<!-- <input type="text" class="form-control name_align fl athlete_name" id="name" placeholder="Name" name="athlete_name1" required> -->
						      	<input type="text" class="form-control date_assign fl athlete_date dob" id="dob" placeholder="Date" required>
						    </div>
						    <div class="form-group">
						      	<input type="text" class="form-control name_align fl athlete_mobile mobile" id="mobile" placeholder="Mobile no" required>
						      	<input type="text" class="form-control date_assign fl athlete_bib" id="bib" placeholder="BIB NO" name="athlete_bib1" required>
						    </div>
						</div>
					</div>

					<input type="submit" class="btn btn-primary align_right adds_btn add_athelete" value="Add"><i class="fa fa-plus add_align"></i>
					<div class="col-md-9 schedule_btn">
						<input type="button" class="btn btn-primary align_right clear assignschedule_submit" value="Submit">
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
			        	<span class="edit_state">Edit</span>
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
				<form>
					<div class="form-group">
						  <label for="sel1">Select Schedule Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Schedule">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Category Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="category">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
				      	<label for="athlete" class="email_txt">Add Athletes</label><br>
				      	<input type="text" class="form-control schedule-name fl" id="name" placeholder="Name" name="name" required>
				      	<input type="text" class="form-control bib_popup fl" id="name" placeholder="Date" name="date" required>
				    </div>
				    <div class="form-group">
				      	<input type="text" class="form-control schedule-name fl" id="name" placeholder="Mobile no" name="Mobile" required>
				      	<input type="text" class="form-control bib_popup fl" id="name" placeholder="BIB NO" name="bib" required>
				    </div>
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="submit" class="btn btn-primary align_right clear" value="Clear">
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
							$('#combobox').parents('form').find('.dob').val(html.athlete_dob);
							$('#combobox').parents('form').find('.mobile').val(html.athlete_mobile);
			           }
			       });
        		}
    		});

		});
		function enable_autocomplete(InputField) {
		    $(InputField).autocomplete({
		        source: availableTags
		    });
}
		</script>
<?php require_once "footer.php" ?>
