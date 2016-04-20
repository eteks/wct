<?php require_once "session.php";
	  require_once "header.php";
	  require_once 'functions/states_function.php';
	  require_once 'functions/district_function.php';
	  require_once 'functions/athletes_functions.php';
	  require_once 'functions/sports_function.php';
	  $statesFunction = new statesFunction();
	  $districtFunction = new districtFunction();
	  $sportsfunction = new sportsfunction();
	  $athleteFunction = new athletesFunction();
?>
<style type="text/css">
	#ui-id-1{
		width: 152px !important;
	}
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
<script type="text/javascript">

</script>
<div class="container">
	<div class="container left_align_testbattery align_height">
		<span class="sports">ADD ATHLETE</span>
	</div><!--end container-->
	<div class="container align_bottom">
		<div class="col-xs-12 col-md-12">
			<!-- <div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="athletes_form" id="athlete_form" class="athletes_form">
					<div class="form-group">
						<label>Name of Athlete</label>
						<input type="text" class="adjust_width" name="athlete_name" autocomplete="off" data-validation-error-msg="Please enter name of Athlete" data-validation="required">
					</div>
					<div class="form-group athlete_date_pic nm">
					  <label for="date" class="">Date Of Birth</label>
					  <input class="athlete_date_pick" type="text" id="date_drop">
					  <span class="hided">Please select valid Date</span>
 						<!-- <div class="date-dropdowns">
				    	  	<select name="dateday" id="day1" class="day day1 classic">
				    	  		<option value="">Day</option>
				    	  	</select>
				    	  	<select name="datemonth" id="month1" class="month month1 classic">
				    	  		<option value="">Month</option>
				    	  	</select>
  						  	<select name="dateyear" id="year1" class="year year1 classic">
  						  		<option value="">Year</option>
  						  	</select>  				
						</div>	 -->			
					</div>
					<span class="hided empty_check">Please select Date</span>
					<span class="hided">Please select valid Date</span>
					<div class="form-group" style="margin-top:15px;">
      					<label>Mobile Number</label>
      					<input type="text" id="athletes_mobile1" class="adjust_width" name="athlete_mobile" autocomplete="off" data-validation-error-msg="Please enter valid Mobile no.(with 10 digits)" data-validation="length" data-validation-length="10"  maxlength="10">
     				</div>
					<div class="form-group">
						  <label for="sel1">Gender</label>
						  <select class="form-control adjust_width classic" id="sel1" name="athlete_gender" data-validation-error-msg="Please select Gender" data-validation="required">
						  <option value=""> Gender</option>
						  <option value="Female">Female</option>
						  <option value="Male">Male</option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel2">State</label>
						  <select class="form-control adjust_width classic athlete_state_act" id="sel2" name="athlete_state" data-validation-error-msg="Please select State" data-validation="required">
						  <option value="">State</option>
						  <?php
	                        $query = $statesFunction->statesSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['states_id']; ?>"><?php echo $row['states_name']; ?></option>
	                      <?php } ?>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel3">District</label>
						  <select class="form-control adjust_width classic athlete_district_act" id="sel3" name="athlete_district" data-validation-error-msg="Please select District" data-validation="required">
						   <option value=""> District</option>
						  <?php
	                        $query = $districtFunction->districtSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['district_id']; ?>"><?php echo $row['district_name']; ?></option>
	                      <?php } ?>
						  </select>
					</div>

					<div class="align_height align_margin">
						<label>Address</label>
						<textarea class="area_width" name="athlete_address" data-validation-error-msg="Please enter Address" data-validation="required"></textarea>
					</div>

					<div class="form-group">
						<label>Taluka</label>
						<input type="text" class="adjust_width" name="athlete_taluka" autocomplete="off" data-validation-error-msg="Please enter Taluka" data-validation="required">
					</div>

					<div class="form-group">
						  <label for="sel1">Sport</label>
						  <select class="form-control adjust_width classic" id="sel1" name="athlete_sports" data-validation-error-msg="Please select Sport" data-validation="required">
						   <option value="">Sport</option>
						   <?php
	                        $query = $sportsfunction->sportsSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['sports_id']; ?>"><?php echo $row['sports_name']; ?></option>
	                      <?php } ?>
						  </select>
					</div>
					<div class="col-md-9 schedule_btn">
						<!-- <button type="button" class="btn btn-primary align_right clear add_athletes_act">Submit</button> -->
						<input type="submit" class="btn btn-primary test-submit clear add_athletes_act" value="Save">
						<input type="reset" class="btn btn-primary clear reset_form reset_form_athlete" value="Cancel">
					</div>
				</form>
				</div>
			<div class="col-md-12">
				<div class="col-md-3 search_part" style="padding: 0px;position: relative;">
					<div class="test_title">
						<span>Athlete Name</span>
					</div><!--test_title-->
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box search_text at_search" placeholder="Search Name">
								<i class="fa fa-search font-search search_button"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
				                        $query = $athleteFunction->athleteSelect();
				                        while ($row = mysql_fetch_array($query)) {
			                        ?>
									<span class="test-name at_namelist">
										<input type="checkbox" name="test" value="test" class="check_test check_athlete check_list input_wrap" id="check-select">
										<input type="hidden" class="check_athleteid check_data" name="check_athleteid" value="<?php echo $row['athlete_id']; ?>">
										<input type="text" name="check_athletename" value="<?php echo $row['athlete_name']; ?>" class="list_edit check_athletename input_wrap" name="check_athletename">
										<span class="test-alter">
										<?php
										$check_in_assignschedule = mysql_query("SELECT * FROM wc_assignschedule WHERE assignathlete_id='".$row['athlete_id']."'")or die(mysql_error());	
			                        	$check_in_result = mysql_query("SELECT * FROM wc_result WHERE resultathlete_id='".$row['athlete_id']."'")or die(mysql_error());	
										if(mysql_num_rows($check_in_result)>0 || mysql_num_rows($check_in_assignschedule)>0){ ?>
											<i class="fa fa-floppy-o save_item save_state"></i>
											<i class="fa fa-pencil-square-o side_restrict"><div class="side_restrict_tooltip">Mapping has been already done.<br/>Edit or Delete not possible.</div></i>
											<i class="fa fa-trash-o side_restrict" style="float: none;"></i>
										<?php } else{?>		
											<i class="fa fa-floppy-o save_item save_athlete"></i>
											<i class="fa fa-pencil-square-o edit_item"></i>
											<i class="fa fa-trash-o delete_item delete_state" data-value="<?php echo $row['athlete_id']; ?>" style="float: none;"></i>
										<?php }?>
										</span><!--test-alter-->
									</span><!--test-name-->
									<div class="delete_div delete_search">
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
      								<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
				</div>


					<div class="container table-position col-md-9" style="padding: 0px;">
				  <table class="table athletes_table check_table">
			    <thead>
			      <tr class="row_color">
			      	<!-- <th class="align_center">sports</th> -->
			        <th class="align_center">Gender</th>
			        <th class="align_center">Date of Birth</th>
			        <!-- <th class="align_center">Address</th> -->
			        <th class="align_center">District</th>
			        <th class="align_center">Mobile No.</th>
			       	<th class="action_align">Action</th>
			      </tr>
			    </thead>
			    <tbody style="display:block;height:260px;overflow:auto;">
			    <?php
	               $query = $athleteFunction->athleteSelect();
	               $i=1;
                   while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr class="align_center delete_color">
                        	<input type='hidden' class="t_athlete_id check_id hidden_value" name='athlete_id' value="<?php echo $row['athlete_id']; ?>">
                        	<input type='hidden' class="t_athlete_name check_name" name='athlete_name' value="<?php echo $row['athlete_name']; ?>">
					     
					        <td><?php echo $row['athlete_gender']; ?></td>
					        <td><?php echo date("d/m/Y", strtotime($row['athlete_dob'])); ?></td>
					        <td><?php echo $row['district_name']; ?></td>
					        <td><?php echo $row['athlete_mobile']; ?></td>
							<td class="popup-edit">
							<?php
							$check_in_assignschedule = mysql_query("SELECT * FROM wc_assignschedule WHERE assignathlete_id='".$row['athlete_id']."'")or die(mysql_error());	
                        	$check_in_result = mysql_query("SELECT * FROM wc_result WHERE resultathlete_id='".$row['athlete_id']."'")or die(mysql_error());	
							if(mysql_num_rows($check_in_result)>0 || mysql_num_rows($check_in_assignschedule)>0){ ?>
					        	<span class="restrict">
						        	<i class="fa fa-pencil-square-o">
						        	<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>
						        	</i>
					        	</span>
					        	<span class="restrict_del">
						        	<i class="fa fa-trash-o"> 
						        	<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>
						        	</i>
					        	</span>
						    <?php } else{?>
					        	<span class="edit_state new-edit" onclick="editfunction(<?php echo $row['athlete_id'] ?>,this)"><i class="fa fa-pencil-square-o"></i></span>
				        		<span class="delete_state" data-value="<?php echo $row['athlete_id'] ?>"><i class="fa fa-trash-o"></i></span>
					        <?php }?>
					            <div class="athletes_div popup_hidden athlete_popup">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Athlete Details</span>
					              	</div><!--edit_title-->
				          			<div class="container state-content col-md-12">
				          			<div class="col-xs-12 col-md-12 align_margin">
						          	<form name="edit_athletes_form" class="edit_athletes_form">
						          		<input type="hidden" class="statesid" name="edit_athlete_id" value="">
						          		<input type="hidden" class="edit_athlete_name" name="edit_athlete_name" value="">
										
										<div class="form-group align-day align-day-popup col-md-10 athlete_date_pic nm">
										  <label for="date" class="popup_label" style="text-align:center;">Date Of Birth</label>										
										  	<input class="popup_athlete_datepick" type="text">
										 	<span class="hided">Please select valid Date</span>
									 		<!-- <div class="date-dropdowns">
									    	  	<select name="dateday" class="day day1 classic">
									    	  		<option value="">Day</option>
									    	  	</select>
									    	  	<select name="datemonth" class="month month1 classic">
									    	  		<option value="">Month</option>
									    	  	</select>
											  	<select name="dateyear" class="year year1 classic">
											  		<option value="">Year</option>
											  	</select>
											</div>		 -->								
										</div>
										<span class="hided empty_check" style="margin-left:15px;">Please select Date</span>
										<span class="hided" style="margin-left:15px;">Please select valid Date</span>
										<div class="form-group col-md-10" style="margin-top:15px;">
					      					<label class="popup_label">Mobile Number</label>
					      					<input id="ahtlete_mobile" type="text" value="" class="adjust_width box-width box-width-athlete" name="edit_athlete_mobile" autocomplete="off" data-validation-error-msg="Please enter valid Mobile no.(with 10 digits)" data-validation="length" data-validation-length="10">
					     				</div>
										<div class="form-group col-md-10">
											  <label for="sel1" class="popup_label">Gender</label>
											  <select class="form-control adjust_width classic box-width box-width-athlete" id="sel1" name="edit_athlete_gender" data-validation-error-msg="Please select the Gender" data-validation="required">
											  <option value=""></option>
											  <option value="Female">Female</option>
											  <option value="Male">Male</option>
											  </select>
										</div>
										<div class="form-group col-md-10">
											  <label for="sel1" class="popup_label">State</label>
											  <select class="form-control adjust_width classic athlete_state_act box-width box-width-athlete" id="sel1" name="edit_athlete_state" data-validation-error-msg="Please select the State" data-validation="required">
											  <option value="">State</option>
											   <?php
						                        $state_query = $statesFunction->statesSelect();
						                        while ($row1 = mysql_fetch_array($state_query)) {
						                            ?>
						                            <option <?php if ($row['athletestates_id'] == $row1['states_id'] ) echo 'selected' ; ?> value="<?php echo $row1['states_id']; ?>"><?php echo $row1['states_name']; ?></option>
						                      <?php } ?>
											  </select>
										</div>
										<div class="form-group col-md-10">
											  <label for="sel1" class="popup_label">District</label>
											  <select class="form-control adjust_width classic athlete_district_act box-width box-width-athlete" id="sel1" name="edit_athlete_district" data-validation-error-msg="Please select the District" data-validation="required">
											  <option value=""> District</option>
											  </select>
										</div>

										<div class="align_height align_margin col-md-10">
											<label class="popup_label">Address</label>
											<textarea class="area_width_athlete" name="edit_athlete_address" data-validation-error-msg="Please enter the Address" data-validation="required"></textarea>
										</div>

										<div class="form-group col-md-10">
											<label class="popup_label">Taluka</label>
											<input type="text" class="adjust_width box-width box-width-athlete" name="edit_athlete_taluka" autocomplete="off" data-validation-error-msg="Please enter the Taluka" data-validation="required">
										</div>

										<div class="form-group col-md-10">
											  <label for="sel1" class="popup_label">Sport</label>
											  <select class="form-control adjust_width classic box-width box-width-athlete" id="sel1" name="edit_athlete_sports" data-validation-error-msg="Please select the Sport" data-validation="required">
											  <option value=""> Sport</option>
											   <?php
						                        $sports_query = $sportsfunction->sportsSelect();
						                        while ($row = mysql_fetch_array($sports_query)) {
						                            ?>
						                            <option value="<?php echo $row['sports_id']; ?>"><?php echo $row['sports_name']; ?></option>
						                      <?php } ?>
											  </select>
										</div>
										<div class="col-md-10 schedule_btn">
											
											<input type="submit" class="btn btn-primary test-submit clear edit_athletes_act" value="Save">
											<input type="reset" class="btn btn-primary clear reset_form reset_form_athlete" value="Cancel">
										</div>
									</form>
				          		  </div>
								 </div><!--state-content-->
								</div><!--test_battery_div-->
								<div class="delete_div delete_test_div athlete-div-delete">
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
						<input type="hidden" name="test_attribute_id" id="test_attribute_id" value="<?php echo $eachrecord ['test_attribute_id']; ?>" />
				      </tr>

				      <?php $i++;} ?>
				    </tbody>
				  </table>
				</div>
			</div>
			<div class="athlete_list">
				<ul>
					<?php
		               $at_query = $athleteFunction->athleteSelect();
	                   while ($row1 = mysql_fetch_array($at_query)) {
                     ?>
                     <li><?php echo $row1['athlete_name'] ?></li>
                     <?php } ?>
				</ul>
			</div>

			</div>
			</div>
			</div>

<?php require_once "footer.php" ?>
