<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">RESULT</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form>
					<div class="form-group">
						  <label for="sel1">Select Schedule Name</label>
						  <select class="form-control adjust_width classic" id="sel1" name="test_battery">
						  <option></option>
						  </select>
					</div>
					<div class="form-group">
				      	<label for="athlete" class="email_txt">Select Athletes</label><br>
				      	<input type="text" class="form-control name_align fl" id="name" placeholder="Name" name="name" required>
				      	<input type="text" class="form-control date_assign fl" id="name" placeholder="Date" name="date" required>
				    </div>
				    <div class="form-group">
				      	<input type="text" class="form-control name_align fl" id="name" placeholder="Mobile no" name="Mobile" required>
				      	<input type="text" class="form-control date_assign fl" id="name" placeholder="BIB NO" name="bib" required>
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
			        <th class="align_center">Test</th>
			        <th class="align_center">Parameter</th>
			        <th class="align_center">Result</th>
			        <th class="align_center">Points</th>
			      </tr>
			    </thead>
			    <tbody class="assign_content">
			      <tr class="align_center delete_color assign_table">
			        <td>Test1</td>
			        <td>Parameter1</td>
			        <td><span class="assign_border">5.15</span></td>
			        <td><span class="assign_border">3</span></td>
			      </tr>
			      <tr class="align_center delete_color assign_table">
			        <td>Test2</td>
			        <td>Parameter2</td>
			        <td><span class="assign_border">5.15</span></td>
			        <td><span class="assign_border">4</span></td>
			      </tr>
			      <tr class="align_center delete_color assign_table">
			        <td>Test3</td>
			        <td>Parameter1</td>
			        <td><span class="assign_border">5.15</span></td>
			        <td><span class="assign_border">2</span></td>
			      </tr>	
			      <tr class="align_center delete_color assign_table">
			        <td>Test4</td>
			        <td>Parameter1</td>
			        <td><span class="assign_border">5.15</span></td>
			        <td><span class="assign_border">3</span></td>
			      </tr>
			      <tr class="align_center delete_color assign_table total_div">
			      	<td></td>
			      	<td></td>
			      	<td>Total</td>
			      	<td><span class="assign_border">12</span></td>
			      </tr>					   
			    </tbody>
			  </table>
			  	<div class="col-md-11 btn_div">					
					<input type="submit" class="btn btn-primary align_right clear" value="Save">
					<input type="submit" class="btn btn-primary align_right clear" value="Clear">
				</div>	
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
<?php require_once "footer.php" ?>