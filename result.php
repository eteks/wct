<?php require_once "session.php";
	  require_once "header.php"; 
	  require_once 'functions/create_schedule_function.php';
	  $createscheduleFunction = new createscheduleFunction();
?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">RESULT</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form id="result_form" name="result_form">
					<div class="form-group">
						  <label for="sel1">Select Schedule Name</label>
						  <select class="form-control adjust_width classic resultcreateschedule_act" id="sel1" name="result_createschedule" data-validation-error-msg="Please Select Name of the Schedule" data-validation="required">
						  <option></option>
						  <?php
	                        $query = $createscheduleFunction->createscheduleSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['createschedule_id']; ?>"><?php echo $row['createschedule_name']; ?></option>
	                      <?php } ?>
						  </select>
					</div>				
					<div class="form-group">
				      	<label for="athlete" class="email_txt">Select Athletes</label><br>
				      	<input type="text" class="form-control name_align fl result_athletename" id="result_athletename" placeholder="Name" name="result_athletename" data-validation-error-msg="Please Enter the name of the Athelete" data-validation="required">
				      	<input type="text" class="form-control date_assign fl result_athletedate" id="result_athletedate" placeholder="Date" name="result_athletedate" data-validation-error-msg="Please Enter the Date" data-validation="required">
				    </div>
				    <div class="form-group">
				      	<input type="text" class="form-control name_align fl result_athletemobile" id="result_athletemobile" placeholder="Mobile no" name="result_athletemobile" data-validation-error-msg="Please Enter the Mobile Number" data-validation="required">
				      	<input type="text" class="form-control date_assign fl result_athletebib" id="result_athletebib" placeholder="BIB NO" name="result_athletebib" data-validation-error-msg="Please Enter the BIB NO" data-validation="required">
				    </div>
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="reset" class="btn btn-primary align_right test-submit clear" value="Clear">
					</div>			
				<input type="hidden" name="result_createscheduleid" class="result_createscheduleid">
				<input type="hidden" name="result_athleteid" class="result_athleteid">
				</form>
			</div>			

			<div class="container table-position">           
			  <table class="table result_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">Test</th>
			        <th class="align_center">Parameter</th>
			        <th class="align_center">Result</th>
			        <th class="align_center">Points</th>
			      </tr>
			    </thead>
			    <tbody class="assign_content">
			      <tr class="align_center delete_color assign_table total_div">
			      	<td></td>
			      	<td></td>
			      	<td>Total</td>
			      	<td><span class="assign_border total_result"></span></td>
			      </tr>					   
				</tbody>
			  </table>
			  	<div class="col-md-11 btn_div">					
					<input type="submit" class="btn btn-primary align_right clear result_submit_act" value="Save">
					<input type="reset" class="btn btn-primary align_right test-submit clear" value="Clear">
				</div>	
			</div>	
<!-- 			<div class="table-hidden">
				<tr class="align_center delete_color assign_table">
			        <input type="hidden" name="result_athleteid" class="result_athleteid">
			        <td class="result_test_name"></td>
			        <td class="result_parmeter_name"></td>
			        <td><input type="text" class="assign_border"></td>
			        <td><span class="assign_border"></span></td>
				</tr>
			</div>	 -->	
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
<?php require_once "footer.php" ?>