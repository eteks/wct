<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">RANGE</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form id="range_form">
					<div class="form-group">
						  <label for="sel1">Select Test Battery Names</label>
						  <select class="form-control adjust_width classic" id="sel1" name="test_battery" data-validation-error-msg="please Select the Name of Test Battery " data-validation="required">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Category</label>
						  <select class="form-control adjust_width classic" id="sel1" name="category" data-validation-error-msg="please Select the Category of Test Battery" data-validation="required">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Test Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="test_name" data-validation-error-msg="please Enter the name of the Test" data-validation="required">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
					  <label for="range" class="fl">Ranges</label><br>
					  <select class="form-control classic range_align fl" id="strt" data-validation-error-msg="please Select the start range of Test" data-validation="required">
					  	<option value="">Start</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic range_align fl" id="end" data-validation-error-msg="please Select the End Range  of Test" data-validation="required">
					  	<option value="">End</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic range_align fl" id="point" data-validation-error-msg="please Enter the Points of the Test" data-validation="required">
					  	<option value="">Points</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					<input type="submit" class="btn btn-primary align_right ranges_btn" value="Add Ranges"><i class="fa fa-plus plus_align"></i>
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
			        <th class="align_center">Test Name</th>
			        <th class="align_center">Range1</th>
			        <th class="align_center">Range2</th>
			        <th class="align_center">Range3</th>
			        <th class="align_center">Range4</th>
			        <th class="align_center">Range5</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="align_center delete_color">
			        <td>01</td>
			        <td>Long Jump</td>
			        <td></td>
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
			        <td>High Jump</td>
			        <td></td>
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
			        <td>Running</td>
			        <td></td>
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
            <div class="range_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">		
	          			<div class="col-xs-12 col-md-12 align_margin">
				<form>
					<div class="form-group">
						  <label for="sel1">Select Test Battery Names</label>
						  <select class="form-control adjust_width classic" id="sel1" name="test_battery">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Category</label>
						  <select class="form-control adjust_width classic" id="sel1" name="category">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Test Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="test_name">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
					  <label for="range" class="fl">Ranges</label><br>
					  <select class="form-control classic range_align_popup fl" id="strt">
					  	<option>Start</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic range_align_popup fl" id="end">
					  	<option>End</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic range_align_popup fl" id="point">
					  	<option>Points</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
					</div>			
				</form>
			</div>		
					</div><!--state-content-->
			</div><!--range_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>

