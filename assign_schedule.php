<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">ASSIGN SCHEDULE</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form>
					<div class="form-group">
						  <label for="sel1">Select Schedule Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Schedule">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Category Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="category">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
				      	<label for="athlete" class="email_txt">Add Athletes</label><br>
				      	<input type="text" class="form-control name_align fl" id="name" placeholder="Name" name="name" required>
				      	<input type="text" class="form-control date_assign fl" id="name" placeholder="Date" name="date" required>
				    </div>
				    <div class="form-group">
				      	<input type="text" class="form-control name_align fl" id="name" placeholder="Mobile no" name="Mobile" required>
				      	<input type="text" class="form-control date_assign fl" id="name" placeholder="BIB NO" name="bib" required>
				    </div>
					<input type="submit" class="btn btn-primary align_right adds_btn" value="Add"><i class="fa fa-plus add_align"></i>
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
			        <th class="align_center">Category Name</th>
			        <th class="align_center">Athletes Name</th>
			        <th class="align_center">BIB NO</th>
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
			        <td>
			        	<span class="edit_state">Edit</span>
		        		<span class="delete_state">Delete</span>
			        </td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>01</td>
			        <td>Suresh</td>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td>
			        	<span class="edit_state">Edit</span>
		        		<span class="delete_state">Delete</span>
			        </td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>01</td>
			        <td>Suresh</td>
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
						  <label for="sel1">Select Schedule Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="Schedule">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Category Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="category">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
				      	<label for="athlete" class="email_txt">Add Athletes</label><br>
				      	<input type="text" class="form-control schedule-name fl" id="name" placeholder="Name" name="name" required>
				      	<input type="text" class="form-control bib_popup fl" id="name" placeholder="Date" name="date" required>
				    </div>
				    <div class="form-group">
				      	<input type="text" class="form-control schedule-name fl" id="name" placeholder="Mobile no" name="Mobile" required>
				      	<input type="text" class="form-control bib_popup fl" id="name" placeholder="BIB NO" name="bib" required>
				    </div>
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="submit" class="btn btn-primary align_right clear" value="Clear">
					</div>				
				</form>
			</div>		
					</div><!--state-content-->
			</div><!--range_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>

