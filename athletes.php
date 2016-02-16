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
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">ADD ATHLETES</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="athletes_form" id="athlete_form">
					<div class="form-group">
						<label>Athlete Name</label><br>
						<input type="text" class="adjust_width" name="athlete_name" data-validation-error-msg="Please Enter the name of the Athelete" data-validation="required">
					</div>

					<div class="form-group">
					  <label for="date" class="fl">Date Of Birth</label><br>
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
      					<input type="text" id="athletes_mobile1" class="adjust_width" name="athlete_mobile" data-validation-error-msg="Please Enter the value that must contain 10 numbers" data-validation="length" data-validation-length="max10">
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
						  <option value=""></option>
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
						<input type="text" class="adjust_width" name="athlete_taluka" data-validation-error-msg="Please Enter the name of the Taluka" data-validation="required">
					</div>

					<div class="form-group">
						  <label for="sel1">Sports</label>
						  <select class="form-control adjust_width classic" id="sel1" name="athlete_sports" data-validation-error-msg="please Select the Sports" data-validation="required">
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
						<input type="submit" class="btn btn-primary align_right clear add_athletes_act" value="Submit">
						<input onclick="document.getElementById('athlete_form').reset();return false" type="submit" class="btn btn-primary align_right clear" value="Clear">
					</div>
				</form>
			</div>
			<div class="container">
			  <table class="table athletes_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">SLNO</th>
			        <th class="align_center">Athlete Name</th>
			        <th class="align_center">Gender</th>
			        <th class="align_center">D.O.B</th>
			        <th class="align_center">Address</th>
			       	<th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php
	                $query = $athleteFunction->athleteSelect();
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr class="align_center delete_color">
                        	<input type='hidden' name='athlete_id' value="<?php echo $row['athlete_id']; ?>">
					        <td class="t_athlete_id"><?php echo $row['athlete_id']; ?></td>
					        <td class="t_athlete_name"><?php echo $row['athlete_name']; ?></td>
					        <td class="t_athlete_gender"><?php echo $row['athlete_gender']; ?></td>
					        <td class="t_athlete_dob"><?php echo $row['athlete_dob']; ?></td>
					        <td class="t_athlete_address"><?php echo $row['athlete_address']; ?></td>
					        <td>
					        	<span class="edit_state" onclick="editfunction(<?php echo $row['athlete_id'] ?>)">Edit</span>
				        		<span class="delete_state" data-value="<?php echo $row['athlete_id'] ?>">Delete</span>
					        </td>
	      				</tr>
                  <?php } ?>
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
<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="athletes_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content athlete-popup-content col-md-12">
          			<div class="col-xs-12 col-md-12 align_margin">
	          	<form name="edit_athletes_form" id="edit_athletes_form">
	          		<input type="hidden" class="statesid" name="edit_athlete_id">
					<div class="form-group">
						<label>Athlete Name</label><br>
						<input type="text" class="adjust_width" name="edit_athlete_name" data-validation-error-msg="Please Enter the name of the Athelete" data-validation="required">
					</div>
					<div class="form-group">
					  <label for="date" class="fl">Date Of Birth</label><br>
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
      					<label>Mobile Number</label><br>
      					<input id="ahtlete_mobile" type="text" class="adjust_width" name="edit_athlete_mobile" data-validation-error-msg="Please Enter the value that must contain 10 numbers" data-validation="length" data-validation-length="max10">
     				</div>
					<div class="form-group">
						  <label for="sel1">Gender</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_athlete_gender" data-validation-error-msg="Please Select the Gender" data-validation="required">
						  <option value=""></option>
						  <option value="Female">Female</option>
						  <option value="Male">Male</option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">State</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_athlete_state" data-validation-error-msg="Please Select the State" data-validation="required">
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
						  <label for="sel1">District</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_athlete_district" data-validation-error-msg="Please Select the District" data-validation="required">
						  <option value=""> District</option>
						  </select>
					</div>

					<div class="align_height align_margin">
						<label>Address</label><br>
						<textarea class="area_width_athlete" name="edit_athlete_address" data-validation-error-msg="Please Enter the Address" data-validation="required"></textarea>
					</div>

					<div class="form-group">
						<label>Taluka</label><br>
						<input type="text" class="adjust_width" name="edit_athlete_taluka" data-validation-error-msg="Please Enter the Taluka" data-validation="required">
					</div>

					<div class="form-group">
						  <label for="sel1">Sports</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_athlete_sports" data-validation-error-msg="Please Select the Sport" data-validation="required">
						  <option value=""> Sports</option>
						   <?php
	                        $query = $sportsfunction->sportsSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['sports_id']; ?>"><?php echo $row['sports_name']; ?></option>
	                      <?php } ?>
						  </select>
					</div>
					<div class="col-md-10 schedule_btn">
						<!-- <button type="button" class="btn btn-primary align_right clear edit_athletes_act">Submit</button>
						<button type="button" class="btn btn-primary align_right clear">Clear</button> -->
						<input type="submit" class="btn btn-primary align_right clear edit_athletes_act" value="Submit">
						<input onclick="document.getElementById('edit_athletes_form').reset();return false" type="submit" class="btn btn-primary align_right clear" value="Clear">
					</div>
				</form>
	          		</div>
					</div><!--state-content-->
			</div><!--test_battery_div-->
		</div><!--container-->
<script>
$(document).ready(function(){
	 $("#athletes_mobile1").keypress(function (e) {       
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      // alert('errr'+$('#mobile').val());
               return false;
    }
   });
});
$(".athlete_date_pick,.popup_athlete_datepick").dateDropdowns({
    minAge: 18
    });
// $('.dateselector-basic').dateSelector({
//     onDateChange: function() {
//         // Your code here...
//         // alert('date changed!');
//     }
// });
</script>

<?php require_once "footer.php" ?>
