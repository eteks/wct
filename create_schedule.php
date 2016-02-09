<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">CREATE SCHEDULE</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form>
					<div class="form-group">					
						<label>Enter the name of the Sports</label><br>
						<input type="text" class="adjust_width" name="sports_name">
					</div>
					<div class="form-group">
					  <label for="battey_name">Select Test Battery Name</label>
					  <select class="form-control classic adjust_width" id="battey_name">
					  	<option></option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					
					<div class="form-group">
					  <label for="date" class="fl">Select date</label><br>
					  <select class="form-control classic adjust_width_tiny fl" id="date">
					  	<option>Date</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic adjust_width_tiny fl" id="month">
					  	<option>Month</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic adjust_width_tiny fl" id="year">
					  	<option>Years</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					
					<div class="form-group">
					  <label for="date" class="fl">Select Time</label><br>
					  <select class="form-control classic adjust_tiny fl" id="hour">
					  	<option>Hour</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic adjust_tiny fl" id="minute">
					  	<option>Minute</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic adjust_tiny fl" id="seconds">
					  	<option>Seconds</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
			
					<div class="align_height align_margin">					
						<label>Venue</label><br>
						<textarea class="area_width"></textarea>
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
			        <th class="align_center">Schedule Name</th>
			        <th class="align_center">Test Battery Name</th>
			        <th class="align_center">Date</th>
			        <th class="align_center">Time</th>
			        <th class="align_center">Venue</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="align_center delete_color">
			        <td>01</td>
			        <td>Suresh</td>
			        <td></td>
			        <td></td>
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
			        <td></td>
			        <td></td>
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
			        <td></td>
			        <td></td>
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
						<label>Enter the name of the Sports</label><br>
						<input type="text" class="adjust_width" name="sports_name">
					</div>
					<div class="form-group">
					  <label for="battey_name">Select Test Battery Name</label>
					  <select class="form-control classic adjust_width" id="battey_name">
					  	<option></option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					
					<div class="form-group">
					  <label for="date" class="fl">Select date</label><br>
					  <select class="form-control classic create-date fl" id="date">
					  	<option>Date</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic create-date fl" id="month">
					  	<option>Month</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic create-date fl" id="year">
					  	<option>Years</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					
					<div class="form-group">
					  <label for="date" class="fl">Select Time</label><br>
					  <select class="form-control classic create-time fl" id="hour">
					  	<option>Hour</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic create-time fl" id="minute">
					  	<option>Minute</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic create-time fl" id="seconds">
					  	<option>Seconds</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
			
					<div class="align_height align_margin">					
						<label>Venue</label><br>
						<textarea class="area_width"></textarea>
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