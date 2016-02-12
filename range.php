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
				<form name="range_form">
					<div class="form-group">
						  <label for="sel1">Select Test Battery Names</label>
						  <select class="form-control adjust_width classic" id="sel1" name="range_testbattery">
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
						  <select class="form-control adjust_width classic" id="sel1" name="range_category">
						  <option></option>
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
						  <select class="form-control adjust_width classic" id="sel1" name="range_test">
						  <option></option>
						   <?php
	                        $query = $testfunction->testSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>	                                            
	                      <?php } ?>
						  </select>
					</div>
					<div class="form-group range_holder">
						<div class="clone_content" id="range_counter1">
						  <label for="range" class="fl range_label">Ranges</label><br>
						  <input type="text" class="form-control classic range_align fl r_strt" id="strt1" name="range_start1" placehoder="Start">				  	
						  <input type="text" class="form-control classic range_align fl r_end" id="end1" name="range_end1" placehoder="end">						  	
						  <input type="text" class="form-control classic range_align fl r_point" id="point1" name="range_points1" placehoder="points">				  	
						</div>
					</div>
					<input type="button" class="btn btn-primary align_right ranges_btn add_range_points" value="Add Ranges"><i class="fa fa-plus plus_align"></i>
					<!-- <button type="button" class="btn btn-primary align_right ranges_btn add_range_points">Add Ranges</button><i class="fa fa-plus plus_align"></i> -->
					<div class="col-md-9 schedule_btn">					
						<button type="button" class="btn btn-primary align_right clear add_range_act">Submit</button>	
					</div>			
				</form>
			</div>			
			<div class="container">           
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
	<div class="container align_center">		          
	  	<ul class="pagination">
	  		<li><a href="#" class="align_left_icon"><i class="fa fa-angle-double-left"></i></a></li>    	
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li><a href="#" class="align_right_icon"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>		   
	</div><!-- end  container-->
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
				<form name="edit_range_form">
					<div class="form-group">
						  <label for="sel1">Select Test Battery Names</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_range_testbattery">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Category</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_range_category">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Test Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="edit_range_test">
						  <option></option>
						  </select>
					</div>
					<div class="form-group range_holder">
					   <div class="clone_content" id="range_counter1">
					  	  <label for="range" class="fl">Ranges</label><br>
					      <input type="text" class="form-control classic range_align_popup fl r_strt" id="strt1" name="range_start1" placehoder="Start">				  	
					      <input type="text" class="form-control classic range_align_popup fl r_end" id="end1" name="range_end1" placehoder="end">						  	
					      <input type="text" class="form-control classic range_align_popup fl r_point" id="point1" name="range_points1" placehoder="points">				  	
					  </div>
					</div>				
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear edit_range_act" value="Submit">
					</div>			
				</form>
			</div>		
					</div><!--state-content-->
			</div><!--range_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>

