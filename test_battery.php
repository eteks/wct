<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">TEST BATTERY</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form id="test_battery_form">
					<div class="form-group">					
						<label>Enter the name of the Test Battery</label><br>
						<input type="text" class="adjust_width" name="test_battery" data-validation-error-msg="please Enter the name of the Test Battery" data-validation="required">
					</div>
					<div class="form-group">
						  <label for="sel1">Select Sport</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Sport" data-validation-error-msg="please Enter the name of the Test Battery" data-validation="required">
						  <option value=""></option>
						  <option value="1">testbattery1</option>
						  </select>
					</div>
					<div class="align_height align_margin">					
						<label>Select Categories</label><br>
						<div class="area_scroll">
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act" data-validation-error-msg="Please Choose atleast one Category" data-validation="required">Under 14 Boys</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act">Under 14 Girls</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act" >Under 16 Boys</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act">Under 19 Boys</label>
					    	</div>
						</div>
					</div>
					<div class="align_height align_margin">					
						<label>Select Test</label><br>
						<div class="area_scroll">
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act1" data-validation-error-msg="Please Choose atleast one Test" data-validation="required">Test1</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act1">Test2</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act1">Test3</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" class="checkbox_act1">Test4</label>
					    	</div>
						</div>
					</div>
					
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
					</div>			
				</form>
			</div>			
			<div class="container">           
			  <table class="table state_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">SLNO</th>
			        <th class="align_center">Test Battery Name</th>
			        <th class="align_center">Sports</th>
			        <th class="align_center">Test</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="align_center delete_color">
			        <td>01</td>
			       	<td>Long Jump</td>
			        <td></td>
			        <td></td>
			        <td>
			        	<span class="edit_state">Edit</span>
		        		<span class="delete_state">Delete</span>
			        </td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>02</td>
			        <td>High Jump</td>
			        <td></td>
			        <td></td>
			        <td>
			        	<span class="edit_state">Edit</span>
		        		<span class="delete_state">Delete</span>
			        </td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>03</td>
			        <td>Running</td>
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
						<label>Enter the name of the Test Battery</label><br>
						<input type="text" class="adjust_width" name="test_battery">
					</div>
					<div class="form-group">
						  <label for="sel1">Select Sport</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Sport">
						  <option></option>
						  </select>
					</div>
					<div class="align_height">					
						<label>Select Categories</label><br>
						<div class="area_scroll_popup">
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox">Under 14 Boys</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox">Under 14 Girls</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox">Under 16 Boys</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox">Under 19 Boys</label>
					    	</div>
						</div>
					</div> 
					<div class="align_height align_margin">					
						<label>Select Test</label><br>
						<div class="area_scroll_popup">
						</div>
					</div>
					
					<div class="col-md-11 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
					</div>			
				</form>
			</div>		
					</div><!--state-content-->
			</div><!--test_battery_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>