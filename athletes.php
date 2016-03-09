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
<div class="container">
	<div class="container left_align_testbattery align_height">
		<span class="sports">ADD ATHLETES</span>
	</div><!--end container-->
	<div class="container align_bottom">
		<div class="col-xs-12 col-md-12">
			<!-- <div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="athletes_form" id="athlete_form">
					<div class="form-group">
						<label>Athlete Name</label><br>
						<input type="text" class="adjust_width" name="athlete_name" autocomplete="off" data-validation-error-msg="Please Enter the name of the Athelete" data-validation="required">
					</div>
					<div class="form-group" style="position: relative; right: 15px;">
					  <label for="date" class="fl" style="position: relative; left: 15px;">Date Of Birth</label><br>
					  <input class="athlete_date_pick" type="text">
					 <!-- <select class="form-control classic dob_align fl" id="date" name="athlete_dobday" data-validation-error-msg="Please Select the Date" data-validation="required">
					  	<option value="">Date</option>
					    <option value="1">1</option>
					    <option value="2">2</option>
					    <option value="3">3</option>
					  </select>

						<select class="form-control classic dob_align fl" id="month" name="athlete_dobmonth" data-validation-error-msg="Please Select the Month" data-validation="required">
					  	<option value="">Month</option>
					    <option value="1">January</option>
					    <option value="2">February</option>
					    <option value="3">March</option>
					  </select>

					  <select class="form-control classic dob_align fl" id="year" name="athlete_dobyear" data-validation-error-msg="Please Select the Year" data-validation="required">
					  	<option value="">Years</option>
					    <option value="1991">1991</option>
					    <option value="1992">1992</option>
					    <option value="1993">1993</option>
					  </select> -->
					</div>
					<div class="form-group">
      					<label>Mobile Number</label><br>
      					<input type="text" id="athletes_mobile1" class="adjust_width" name="athlete_mobile" autocomplete="off" data-validation-error-msg="Please Enter the value that must contain 10 numbers" data-validation="length" data-validation-length="10">
     				</div>
					<div class="form-group">
						  <label for="sel1">Gender</label>
						  <select class="form-control adjust_width classic" id="sel1" name="athlete_gender" data-validation-error-msg="Please Select the Gender" data-validation="required">
						  <option value=""> Gender</option>
						  <option value="Female">Female</option>
						  <option value="Male">Male</option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel2">State</label>
						  <select class="form-control adjust_width classic athlete_state_act" id="sel2" name="athlete_state" data-validation-error-msg="Please Select the State" data-validation="required">
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
						  <select class="form-control adjust_width classic athlete_district_act" id="sel3" name="athlete_district" data-validation-error-msg="Please Select the District" data-validation="required">
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
						<label>Address</label><br>
						<textarea class="area_width" name="athlete_address" data-validation-error-msg="please Enter the Address" data-validation="required"></textarea>
					</div>

					<div class="form-group">
						<label>Taluka</label><br>
						<input type="text" class="adjust_width" name="athlete_taluka" autocomplete="off" data-validation-error-msg="Please Enter the name of the Taluka" data-validation="required">
					</div>

					<div class="form-group">
						  <label for="sel1">Sports</label>
						  <select class="form-control adjust_width classic" id="sel1" name="athlete_sports" data-validation-error-msg="Please Select the Sports" data-validation="required">
						   <option value="">Sports</option>
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
						<input type="reset" class="btn btn-primary clear" value="Cancel">
						<input type="submit" class="btn btn-primary test-submit clear add_athletes_act" value="Submit">
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
											<i class="fa fa-floppy-o save_item save_athlete"></i>
											<i class="fa fa-pencil-square-o edit_item"></i>
											<i class="fa fa-trash-o delete_item delete_state" data-value="<?php echo $row['athlete_id']; ?>" style="float: none;"></i>
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
      								<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
				</div>


					<div class="container table-position col-md-9" style="padding: 0px;">
				  <table class="table athletes_table check_table">
			    <thead>
			      <tr class="row_color">
			      <th class="align_center">sports</th>
			        <th class="align_center">Gender</th>
			        <th class="align_center">D.O.B</th>
			        <th class="align_center">Address</th>
			       	<th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody style="display:block;height:260px;overflow:auto;">
			    <?php
	               $query = $athleteFunction->athleteSelect();
	               $i=1;
                   while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr class="align_center delete_color">
                        	<input type='hidden' class="t_athlete_id check_id" name='athlete_id' value="<?php echo $row['athlete_id']; ?>">
                        	<input type='hidden' class="t_athlete_name check_name" name='athlete_name' value="<?php echo $row['athlete_name']; ?>">
					      <!--  <td class="t_athlete_s_id"><?php // echo $i; ?></td> -->
					      <!--  <td class="t_athlete_name"><?php //echo $row['athlete_name']; ?></td>
					       <td class="t_athlete_gender"><?php // echo $row['athlete_gender']; ?></td>
					        <td class="t_athlete_dob"><?php // echo date("d/m/Y", strtotime($row['athlete_dob'])); ?></td>
					        <td class="t_athlete_address"><?php // echo $row['athlete_address']; ?></td> -->
					        <td><?php echo $row['sports_name']; ?></td>
					        <td><?php echo $row['athlete_gender']; ?></td>
					        <td><?php echo $row['athlete_dob']; ?></td>
					        <td><?php echo $row['athlete_address']; ?></td>
							<td class="popup-edit">
					        	<span class="edit_state new-edit" onclick="editfunction(<?php echo $row['athlete_id'] ?>,this)"><i class="fa fa-pencil-square-o"></i></span>
				        		<span class="delete_state" data-value="<?php echo $row['athlete_id'] ?>"><i class="fa fa-trash-o"></i></span>
					            <div class="athletes_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Detail</span>
					              	</div><!--edit_title-->
				          			<div class="container state-content col-md-12">
				          			<div class="col-xs-12 col-md-12 align_margin">
						          	<form name="edit_athletes_form" class="edit_athletes_form">
						          		<input type="hidden" class="statesid" name="edit_athlete_id" value="">
						          		<input type="hidden" class="edit_athlete_name" name="edit_athlete_name" value="">
										<!-- <div class="form-group">
											<label>Athlete Name</label><br>
											<input type="text" class="adjust_width" name="edit_athlete_name" data-validation-error-msg="Please Enter the name of the Athelete" data-validation="required">
										</div> -->
										<div class="form-group align-day align-day-popup" style=" white-space: normal;">
										  <label for="date" class="popup_label" style="text-align:center;">Date Of Birth</label><br>
										  <input class="popup_athlete_datepick" type="text">
										 <!--  <select class="form-control classic dob_align1 fl" id="date1" name="edit_athlete_dobday" data-validation-error-msg="Please Select the Date" data-validation="required">
										  	<option value="">Date</option>
										    <option value="1">1</option>
										    <option value="2">2</option>
										    <option value="3">3</option>
										  </select>
										  <select class="form-control classic dob_align2 fl" id="month" name="edit_athlete_dobmonth" data-validation-error-msg="Please Select the Month" data-validation="required">
										  	<option value="" value="">Month</option>
										     <option value="1">January</option>
										    <option value="2">February</option>
										    <option value="3">March</option>
										  </select>
										  <select class="form-control classic dob_align3 fl" id="year" name="edit_athlete_dobyear" data-validation-error-msg="Please Select the Year" data-validation="required">
										  	<option value="">Years</option>
										    <option value="1991">1991</option>
										    <option value="1992">1992</option>
										    <option value="1993">1993</option>
										  </select> -->
										</div>
										<div class="form-group">
					      					<label class="popup_label">Mobile Number</label><br>
					      					<input id="ahtlete_mobile" type="text" value="" class="adjust_width box-width" name="edit_athlete_mobile" autocomplete="off" data-validation-error-msg="Please Enter the value that must contain 10 numbers" data-validation="length" data-validation-length="10">
					     				</div>
										<div class="form-group">
											  <label for="sel1" class="popup_label">Gender</label>
											  <select class="form-control adjust_width classic box-width" id="sel1" name="edit_athlete_gender" data-validation-error-msg="Please Select the Gender" data-validation="required">
											  <option value=""></option>
											  <option value="Female">Female</option>
											  <option value="Male">Male</option>
											  </select>
										</div>
										<div class="form-group">
											  <label for="sel1" class="popup_label">State</label>
											  <select class="form-control adjust_width classic athlete_state_act box-width" id="sel1" name="edit_athlete_state" data-validation-error-msg="Please Select the State" data-validation="required">
											  <option value="">State</option>
											   <?php
						                        $state_query = $statesFunction->statesSelect();
						                        while ($row1 = mysql_fetch_array($state_query)) {
						                            ?>
						                            <option <?php if ($row['athletestates_id'] == $row1['states_id'] ) echo 'selected' ; ?> value="<?php echo $row1['states_id']; ?>"><?php echo $row1['states_name']; ?></option>
						                      <?php } ?>
											  </select>
										</div>
										<div class="form-group">
											  <label for="sel1" class="popup_label">District</label>
											  <select class="form-control adjust_width classic athlete_district_act box-width" id="sel1" name="edit_athlete_district" data-validation-error-msg="Please Select the District" data-validation="required">
											  <option value=""> District</option>
											  </select>
										</div>

										<div class="align_height align_margin">
											<label class="popup_label">Address</label><br>
											<textarea class="area_width_athlete box-width" name="edit_athlete_address" data-validation-error-msg="Please Enter the Address" data-validation="required"></textarea>
										</div>

										<div class="form-group">
											<label class="popup_label">Taluka</label><br>
											<input type="text" class="adjust_width box-width" name="edit_athlete_taluka" autocomplete="off" data-validation-error-msg="Please Enter the Taluka" data-validation="required">
										</div>

										<div class="form-group">
											  <label for="sel1" class="popup_label">Sports</label>
											  <select class="form-control adjust_width classic box-width form-group" id="sel1" name="edit_athlete_sports" data-validation-error-msg="Please Select the Sport" data-validation="required">
											  <option value=""> Sports</option>
											   <?php
						                        $sports_query = $sportsfunction->sportsSelect();
						                        while ($row = mysql_fetch_array($sports_query)) {
						                            ?>
						                            <option value="<?php echo $row['sports_id']; ?>"><?php echo $row['sports_name']; ?></option>
						                      <?php } ?>
											  </select>
										</div>
										<div class="col-md-10 schedule_btn">
											<!-- <button type="button" class="btn btn-primary align_right clear edit_athletes_act">Submit</button>
											<button type="button" class="btn btn-primary align_right clear">Clear</button> -->
											<!-- <input type="reset" class="btn btn-primary align_right clear reset_form edit_athlete_clear" value="Clear"> -->
											<input type="submit" class="btn btn-primary align_right test-submit clear edit_athletes_act" value="Save">
										</div>
									</form>
				          		  </div>
								 </div><!--state-content-->
								</div><!--test_battery_div-->
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


			<!-- end  container-->
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
<!-- end  container-->
<!--<div class="popup_fade cancel_btn"></div><!--popup_fade-->
	<!--	<div class="container">

		</div> --><!--container-->
<?php require_once "footer.php" ?>
