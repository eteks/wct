<?php require_once "session.php";
	  require_once "header.php";
	  require_once 'functions/states_function.php';
	  require_once 'functions/district_function.php';
	  $statesFunction = new statesFunction();	
	  $districtFunction = new districtFunction();
?>		
		<div class="container align_center align-height">
			<span class="sports">DISTRICT</span>
		</div><!--end container-->
		<div class="container">
			<div class="col-md-8">
				<div class="col-md-4"></div>
				<div class="col-md-8 col-xs-12 align_left">
					<form name="district_form" id="districts_form">
						<div class="form-group">
						  <label for="sel1">Select the State</label>
						  <select class="form-control adjust_width classic choose_state" id="sel1" name="district_state" data-validation-error-msg="Please Select the name of the State" data-validation="required">
						  <option value=""></option>
						  <?php
	                        $query = $statesFunction->statesSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['states_id']; ?>"><?php echo $row['states_name']; ?></option>	                                            
	                      <?php } ?>							   
						  </select>
						  <!-- <label class="category_text">Please Select the State</label><br> -->
						</div>
						<div class="align_margin">					
							<label>District/Taluka</label><br>
							<input type="text" class="districts" name="district_name" data-validation-error-msg="Please Enter the name of the District" data-validation="required">
							<span class="add_district_error"></span>
							<label class="category_text">Please Enter the District</label>
						</div>

						<button type="button" class="btn btn-primary align_right clear add_district_act" name="district">Submit</button>			
					</form>
				</div>
				<div class="container">           
				  <table class="table district_table">
				    <thead>
				      <tr class="row_color">
				        <th class="align_center">SLNO</th>	
				        <th class="align_center">District/Taluka</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>  
				      <?php
                        $query = $districtFunction->districtSelect();
                        while ($row = mysql_fetch_array($query)) {
                            ?>
                            <tr class="align_center delete_color">
                            <input type="hidden" name="district_id" value="<?php echo $row['district_id']; ?>">
						        <td class="t_district_id"><?php echo $row['district_id']; ?></td>
						        <!-- <td class="t_states_name"><?php echo $row['states_name']; ?></td> -->
						        <td class="t_district_name"><?php echo $row['district_name']; ?></td>
						        <td>
						        	<span class="edit_state" onclick="editfunction(<?php echo $row['district_id'] ?>)">Edit</span>
						        	<span class="delete_state" data-value="<?php echo $row['district_id'] ?>">Delete</span>
						        </td> 				    
					        </tr>                         
                     <?php } ?>	 
				    </tbody>
				  </table>
				</div>
				<div class="district_list">
					<ul></ul>
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
		<div class="district_list">
			<ul>
			</ul>
		</div>
		<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="district_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">		
	          			<form name="edit_district_form">
	          			<input type="hidden" class="statesid" name="edit_district_id">
						<div class="form-group">
						  <label for="sel1">Select the State</label>
						  <select class="form-control adjust_width classic choose_state" id="sel1" name="edit_district_state">
						  	<option value=""></option>
						  	<?php
	                        $query = $statesFunction->statesSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['states_id']; ?>"><?php echo $row['states_name']; ?></option>	                                            
	                      <?php } ?>	
						  </select>
						</div>
						<div class="align_margin">					
							<label>District/Taluka</label><br>
							<input type="text" class="districts" name="edit_district_name">
							<span class="edit_district_error"></span>
						</div>
						<button type="button" class="btn btn-primary align_right clear edit_district_act" name="district">Submit</button>	
					</form>
					</div><!--tate-content-->
			</div><!--state_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>