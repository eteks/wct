<?php require_once "session.php";
	  require_once "header.php"; 
	  require_once 'functions/range_function.php'; 
	  require_once "functions/test_battery_functions.php"; 
	  require_once "functions/category_function.php"; 
	  require_once "functions/test_functions.php"; 
	  $rangeFunction = new rangeFunction();
	  $testbatteryfunction =  new testbatteryfunction();
	  $categoryfunction = new categoryfunction();
	  $testfunction = new testfunction();
?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">RANGE</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="range_form" id="range_form_id">
					<div class="form-group">
						  <label for="sel1">Select Test Battery Names</label>
						  <option value=""></option>
						  <select class="form-control adjust_width classic" id="sel1" name="range_testbattery" data-validation-error-msg="Please Select the Name of Test Battery " data-validation="required">
						  <option></option>
						  <?php
	                        $query = $testbatteryfunction->testbatterySelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['testbattery_id']; ?>"><?php echo $row['testbattery_name']; ?></option>	                                            
	                      <?php } ?>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Category</label>
						  <select class="form-control adjust_width classic" id="sel1" name="range_category" data-validation-error-msg="Please Select the Category of Test Battery" data-validation="required">
						    <option value=""></option>
						  <?php
						  $cat_data = $categoryfunction->categoryselectfunction();
						  foreach( $cat_data as $eachrecord ) {
						   ?>
							<option value="<?php echo $eachrecord['categories_id']; ?>"><?php echo $eachrecord['categories_name']; ?></option>	
							<?php } ?>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Test Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="range_test" data-validation-error-msg="Please Select the name of the Test" data-validation="required">
						  <option value=""></option>
						   <?php
	                        $query = $testfunction->testSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>	                                            
	                      <?php } ?>
						  </select>
					</div>
					<!-- <div class="form-group range_holder">
						<div class="clone_content" id="range_counter1">
						  <label for="range" class="fl range_label">Ranges</label><br>
						  <input type="text" class="form-control classic range_align fl r_strt" id="strt1" name="range_start1" placehoder="Start" data-validation-error-msg="Please Enter the start range of Test" data-validation="required">				  	
						  <input type="text" class="form-control classic range_align fl r_end" id="end1" name="range_end1" placehoder="end" data-validation-error-msg="Please Enter the End range of Test" data-validation="required">						  	
						  <input type="text" class="form-control classic range_align fl r_point" id="point1" name="range_points1" placehoder="points" data-validation-error-msg="Please Enter the Point" data-validation="required">				  	
						</div>
					</div> -->
					<div class="form-group range_holder col-md-12">
						<div class="clone_content" id="range_counter1">
						  <label for="range" class="range_label">Ranges</label><br>
						  	<div class="form-group col-md-10">
								  <div class="col-md-4">
								  	<input type="text" class="form-control classic range_align  r_strt" id="strt1" name="range_start1" placehoder="Start" data-validation-error-msg="Please Enter the start range of Test" data-validation="number" placeholder="Start">				  	
								  </div>
								  <div class="col-md-4">
								  	<input type="text" class="form-control classic range_align  r_end" id="end1" name="range_end1" placehoder="end" data-validation-error-msg="Please Enter the End range of Test" data-validation="number" placeholder="End">						  	
								  </div>
								  <div class="col-md-4">
								  	<input type="text" class="form-control classic range_align  r_point" id="point1" name="range_points1" placehoder="points" data-validation-error-msg="Please Enter the Point" data-validation="number">				  	
								  </div>
							</div>
						</div>
					</div>
					<div class="form-group add-ranges-button">
						<input type="button" class="btn btn-primary ranges_btn add_range_points" value="Add Ranges"><i class="fa fa-plus plus_align"></i>
					</div>
					<!-- <button type="button" class="btn btn-primary align_right ranges_btn add_range_points">Add Ranges</button><i class="fa fa-plus plus_align"></i> -->
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear add_range_act" value="Submit">	
					</div>			
				</form>
			</div>			
			<div class="container table-position">           
			  <table class="table range_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">SLNO</th>
			        <th class="align_center">Test Name</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			     	<?php
                    $query = $rangeFunction->rangeSelect();
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr class="align_center delete_color">
                        <input type="hidden" name="range_id" value="<?php echo $row['range_id']; ?>">
					        <td class="t_range_id"><?php echo $row['range_id']; ?></td>
					        <td class="t_range_testname"><?php echo $row['test_name']; ?></td>
					        <td>
					        	<span class="edit_state" onclick="editfunction(<?php echo $row['range_id'] ?>)">Edit</span>
					        	<span class="delete_state" data-value="<?php echo $row['range_id'] ?>">Delete</span>
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
            <div class="range_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content range_popup_scroll col-md-12">		
	          			<div class="col-xs-12 col-md-12 align_margin">
				<form name="edit_range_form" id="edit_range_form_id">
				<input type="hidden" name="edit_range_id">
					<div class="form-group">
					    <label for="sel1">Select Test Battery Names</label>
					  	<select class="form-control adjust_width classic" id="sel1" name="edit_range_testbattery" data-validation-error-msg="Please Select the Name of Test Battery " data-validation="required">
						  <option value=""></option>
						  <?php
	                        $query = $testbatteryfunction->testbatterySelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['testbattery_id']; ?>"><?php echo $row['testbattery_name']; ?></option>	                                            
	                      <?php } ?>
				  		</select>
					</div>
					<div class="form-group">
						  <label for="sel1">Category</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_range_category" data-validation-error-msg="Please Select the Category of Test Battery " data-validation="required">
						  <option value=""></option>
						  <?php
						  $cat_data = $categoryfunction->categoryselectfunction();
						  foreach( $cat_data as $eachrecord ) {
						   ?>
							<option value="<?php echo $eachrecord['categories_id']; ?>"><?php echo $eachrecord['categories_name']; ?></option>	
							<?php } ?>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Test Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_range_test" data-validation-error-msg="Please Select the Test Name" data-validation="required">
						  <option value=""></option>
						  <?php
	                        $query = $testfunction->testSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>	                                            
	                      <?php } ?>
						  </select>
					</div>
					<div class="form-group edit_range_holder">
					   <div class="edit_clone_content" id="edit_range_counter1">
					  	  <label for="range" class="fl">Ranges</label><br>
					  	  <input type="hidden" class="edit_rattr_id" name="edit_rangeattr_id1" value="">
					  	  <input type="hidden" class="edit_r_id" name="edit_range_id1" value="">
					      	<div class="form-group col-md-12 ranges_popup">
						      	<div class="col-md-4">
						      		<input type="text" class="form-control classic range_align_popup edit_r_strt" id="edit_strt1" name="edit_range_start1" placehoder="Start" data-validation-error-msg="Please Select the Start Range" data-validation="required">				  	
						       	</div>
						       	<div class="col-md-4">
						      		<input type="text" class="form-control classic range_align_popup edit_r_end" id="edit_end1" name="edit_range_end1" placehoder="end" data-validation-error-msg="Please Select the End Range" data-validation="required">						  	
						       	</div>
						       	<div class="col-md-4">
						      		<input type="text" class="form-control classic range_align_popup edit_r_point" id="edit_point1" name="edit_range_points1" placehoder="points" data-validation-error-msg="Please Select the Point" data-validation="required">				  	
					  			</div>
					  		</div>
					  </div>
					</div>				
					<div class="col-md-12 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear edit_range_act" value="Submit">
					</div>			
				</form>
			</div>		
					</div><!--state-content-->
			</div><!--range_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>

