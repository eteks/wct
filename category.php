<?php require_once "header.php" ?>
	<div class="container">		
		<div class="container align_center align_height">
			<span class="sports">CATEGORY</span>
		</div><!--end container-->
		<div class="container align_margin">
			<div class="col-md-8">
				<div class="col-md-6"></div>
				<div class="col-md-6 align_margin">
					<form>
						<div class="align_margin">					
							<label>Enter the Category Name</label><br>
							<input type="text" class="sportsname">
						</div>
						<input type="submit" class="btn btn-primary align_right clear" name="category" value="Submit">		
					</form>
				</div>
				<div class="container">           
				  <table class="table state_table">
				    <thead>
				      <tr class="row_color">
				        <th class="align_center">SLNO</th>
				        <th class="align_center">Category Name</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr class="align_center delete_color">
				        <td>01</td>
				        <td>Under 14 Boys</td>
				        <td>
				        	<span class="edit_state">Edit</span>
		        			<span class="delete_state">Delete</span>
				        </td>
				      </tr>
				      <tr class="align_center delete_color">
				        <td>02</td>
				        <td>Under 14 Girls</td>
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
	</div>		
	<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="state_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">		
	          			<form>
							<div class="align_margin">	
								<form>
						<div class="align_margin">					
							<label>Enter the Category Name</label><br>
							<input type="text" class="sportsname">
						</div><!--align_margin-->
							<input type="submit" class="btn btn-primary align_right clear" name="category" value="Submit">		
						</form>
					</div><!--tate-content-->
			</div><!--state_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>