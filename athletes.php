<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">ADD ATHLETES</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form>
					<div class="form-group">					
						<label>Athlete Name</label><br>
						<input type="text" class="adjust_width" name="athlete_name">
					</div>
					
					<div class="form-group">
					  <label for="date" class="fl">Date Of Birth</label><br>
					  <select class="form-control classic dob_align fl" id="date">
					  	<option>Date</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic dob_align fl" id="month">
					  	<option>Month</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic dob_align fl" id="year">
					  	<option>Years</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Gender</label>
						  <select class="form-control adjust_width classic" id="sel1" name="gender">
						  <option></option>
						  <option>Female</option>
						  <option>Male</option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">State</label>
						  <select class="form-control adjust_width classic" id="sel1" name="state">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">District/Taluka</label>
						  <select class="form-control adjust_width classic" id="sel1" name="taluk">
						  <option></option>
						  </select>
					</div>
					
					<div class="align_height align_margin">					
						<label>Address</label><br>
						<textarea class="area_width"></textarea>
					</div>
					<div class="form-group">
						  <label for="sel1">Sports</label>
						  <select class="form-control adjust_width classic" id="sel1" name="sports">
						  <option></option>
						  </select>
					</div>
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="submit" class="btn btn-primary align_right clear" value="Clear">
					</div>			
				</form>
			</div>			
			<div class="container">           
			  <table class="table state_table">
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
			      <tr class="align_center delete_color">
			        <td>01</td>
			        <td>Suresh</td>
			        <td>Male</td>
			        <td></td>
			        <td></td>
			        <td>
			        	<span class="edit_state">Edit</span>
		        		<span class="delete_state">Delete</span>
			        </td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>02</td>
			        <td>Kumar</td>
			        <td>Male</td>
			        <td></td>
			        <td></td>
			       	<td>
			       		<span class="edit_state">Edit</span>
		        		<span class="delete_state">Delete</span>
			       	</td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>03</td>
			        <td>Praveen</td>
			        <td>Male</td>
			        <td></td>
			        <td></td>
			       <td>
			       		<span class="edit_state">Edit</span>
		        		<span class="delete_state">Delete</span>
			       </td>
			      </tr>						   
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
            <div class="test_battery_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">	
          			<div class="col-xs-12 col-md-12 align_margin">	
	          			<form>
					<div class="form-group">					
						<label>Athlete Name</label><br>
						<input type="text" class="adjust_width" name="athlete_name">
					</div>
					
					<div class="form-group">
					  <label for="date" class="fl">Date Of Birth</label><br>
					  <select class="form-control classic dob_align fl" id="date">
					  	<option>Date</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic dob_align fl" id="month">
					  	<option>Month</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic dob_align fl" id="year">
					  	<option>Years</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Gender</label>
						  <select class="form-control adjust_width classic" id="sel1" name="gender">
						  <option></option>
						  <option>Female</option>
						  <option>Male</option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">State</label>
						  <select class="form-control adjust_width classic" id="sel1" name="state">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">District/Taluka</label>
						  <select class="form-control adjust_width classic" id="sel1" name="taluk">
						  <option></option>
						  </select>
					</div>
					
					<div class="align_height align_margin">					
						<label>Address</label><br>
						<textarea class="area_width"></textarea>
					</div>
					<div class="form-group">
						  <label for="sel1">Sports</label>
						  <select class="form-control adjust_width classic" id="sel1" name="sports">
						  <option></option>
						  </select>
					</div>
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="submit" class="btn btn-primary align_right clear" value="Clear">
					</div>			
				</form>
	          		</div>
					</div><!--state-content-->
			</div><!--test_battery_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>