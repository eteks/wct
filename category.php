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
						<button type="button" class="btn btn-primary align_right submit">Submit</button>			
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
				        <td>Edit <span class="align_left1">Delete</span></td>
				      </tr>
				      <tr class="align_center delete_color">
				        <td>02</td>
				        <td>Under 14 Girls</td>
				       <td>Edit <span class="align_left1">Delete</span></td>
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
<?php require_once "footer.php" ?>