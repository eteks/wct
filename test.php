<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">TEST</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form>
					<div class="form-group">					
						<label>Enter Test Name</label><br>
						<input type="text" class="adjust_width" name="test_name">
					</div>
					<div class="form-group">					
						<label>Enter Parameter Name</label><br>
						<input type="text" class="adjust_width" name="parameter_name">
					</div>
					<div class="form-group">
					  <select class="form-control classic type_align fl" id="type">
					  	<option>Type</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic type_align fl" id="unit">
					  	<option>Unit</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic type_align fl" id="format">
					  	<option>Format</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					</div>
					<input type="submit" class="btn btn-primary align_right parameter_btn" value="Add Parameter">
					<i class="fa fa-plus parameter_add"></i>
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
			        <th class="align_center">Parameter Name</th>
			        <th class="align_center">Test</th>
			        <th class="align_center">Unit</th>
			        <th class="align_center">Format</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="align_center delete_color">
			        <td>01</td>
			        <td></td>
			        <td>Long Jump</td>
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
			        <td></td>
			        <td>High Jump</td>
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
			        <td></td>
			        <td>Running</td>
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
            <div class="test_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">		
	          			<div class="col-xs-12 col-md-12 align_margin">
				<form>
					<div class="form-group">					
						<label>Enter Test Name</label><br>
						<input type="text" class="adjust_width" name="test_name">
					</div>
					<div class="form-group">					
						<label>Enter Parameter Name</label><br>
						<input type="text" class="adjust_width" name="parameter_name">
					</div>
					<div class="form-group">
					  <select class="form-control classic type_align_popup fl" id="type">
					  	<option>Type</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic type_align_popup fl" id="unit">
					  	<option>Unit</option>
					    <option>Name1</option>
					    <option>Name2</option>
					    <option>Name3</option>						   
					  </select>
					  <select class="form-control classic type_align_popup fl" id="format">
					  	<option>Format</option>
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
			</div><!--test_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>